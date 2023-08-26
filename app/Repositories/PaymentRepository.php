<?php

namespace App\Repositories;

use App\Enums\AccountingPagesEnum;
use App\Enums\PaymentTabsEnum;
use App\Enums\PaymentTypeEnum;
use App\Filters\AccountingFilters\CategoryFilter;
use App\Filters\AccountingFilters\ClientFilter;
use App\Filters\AccountingFilters\CustomerFilter;
use App\Filters\AccountingFilters\InquiryFilter;
use App\Filters\AccountingFilters\SearchTextFilter;
use App\Filters\AccountingFilters\TextFilter;
use App\Filters\CreatedAtFilter;
use App\Filters\CreatorFilter;
use App\Filters\OrderByIdFilter;
use App\Filters\PaginateFilter;
use App\Interfaces\Repositories\PaymentRepositoryInterface;
use App\Models\Calculation;
use App\Models\Payment;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{
    protected array $filters;

    protected string $tabName;

    public function __construct()
    {
        parent::__construct(Payment::class);
    }

    public function setFilters(array $filters)
    {
        $this->filters = $filters;

        return $this;
    }

    public function setTabName(string $name)
    {
        $this->tabName = $name;

        return $this;
    }

    protected function calcMeta($tab)
    {
        $result = $this->model->ofTab($tab);

        if ($tab === PaymentTabsEnum::FUTURE_DUES->value) {
            $result->where('is_paid', 0);
        }

        return $result->selectRaw("SUM(credit) as total_credit, SUM(debit) as total_debit")
            ->when(isset($this->filters['client_id']), function ($query) {
                $query->whereRelation('inquiry', 'client_id', $this->filters['client_id']);
            })
            ->first();
    }

    public function getMeta()
    {
        $res = $this->calcMeta(PaymentTabsEnum::PAYMENTS->value);

        $total = $res->total_credit - $res->total_debit;

        if ($total <= 0) {
            $totalCreditInHand = 0;
            $totalNegativeBalance = $total;
            $balance = $totalCreditInHand - $totalNegativeBalance;
        } else {
            $totalCreditInHand = $total;
            $totalNegativeBalance = 0;
            $balance = $totalNegativeBalance - $totalCreditInHand;
        }

        $res2 = $this->calcMeta(PaymentTabsEnum::FUTURE_DUES->value);

        $totalFutureReceivable = $res2->total_debit;
        $totalFuturePayable = $res2->total_credit;
        $futureBalance = $totalFutureReceivable - $totalFuturePayable;

        return [
            'total_credit_in_hand' => $totalCreditInHand,
            'total_negative_balance' => $totalNegativeBalance,
            'balance' => $balance,
            'total_future_payable' => $totalFuturePayable,
            'total_future_receivable' => $totalFutureReceivable,
            'future_balance' => $futureBalance
        ];
    }

    public function getTabData()
    {
        $query = $this->model
            ->ofTab($this->tabName)
            ->with([
                'creator',
                'remark',
                'customer',
                'supplier',
                'inquiry' => function ($query) {
                    $query->with([
                        'creator' => function ($query) {
                            $query->select(['id', 'first_name', 'last_name', 'abbreviation']);
                        },
                        'assignedTo' => function ($query) {
                            $query->select(['id', 'first_name', 'last_name', 'abbreviation']);
                        }
                    ]);
                }
            ]);

        $passable = (object)[
            'filters' => $this->filters,
            'query' => $query
        ];

        $pipelines = [
            ClientFilter::class,
            InquiryFilter::class,
            CreatedAtFilter::class,
            OrderByIdFilter::class,
            CreatorFilter::class,
            TextFilter::class,
            CategoryFilter::class,
            CustomerFilter::class
        ];

        $result = app(Pipeline::class)
            ->send($passable)
            ->through($pipelines)
            ->thenReturn();

        return $result->query->paginate($this->filters['per_page'] ?? 15);
    }

    public function getUserByMeta(string $meta)
    {
        $toBeSelect = [
            'u.id AS user_id', DB::raw('CONCAT(u.first_name, " ", u.last_name) AS client_full_name'),
            'u.first_name',
            'inq.id as inq_id',
            'inq.client_id',
            'p.id as pay_id',
            'p.inquiry_id',
        ];

        if (in_array($meta, [AccountingPagesEnum::CREDIT_IN_HAND->value, AccountingPagesEnum::NEGATIVE_BALANCE->value])) {
            $tab = PaymentTabsEnum::PAYMENTS->value;

            $toBeSelect[] = DB::raw('MAX(p.created_at) as last_payment');
            $toBeSelect[] = DB::raw('SUM(p.credit) - SUM(p.debit) AS total');
        } else {

            $tab = PaymentTabsEnum::FUTURE_DUES->value;

            $col = $meta == AccountingPagesEnum::TO_BE_PAID->value
                ? 'credit'
                : 'debit';

            $toBeSelect[] = DB::raw('SUM(p.' . $col . ') AS payment_amount');
        }

        return DB::connection('non_strict_mysql')
            ->table('inquiries as inq')
            ->select($toBeSelect)
            ->join('users as u', 'inq.client_id', '=', 'u.id')
            ->join('payments as p', 'inq.id', '=', 'p.inquiry_id')
            ->where('p.tab', $tab)
            ->groupByRaw(DB::raw('u.id'))
            ->when(
                in_array($meta, [
                        AccountingPagesEnum::TO_BE_PAID->value,
                        AccountingPagesEnum::WILL_PAY->value
                    ]
                ),
                function ($query) {
                    $query->where('is_paid', '0');
                }
            )
            ->when($meta == AccountingPagesEnum::CREDIT_IN_HAND->value, function ($query) {
                $query->havingRaw('total > ?', [0]);
            })
            ->when($meta == AccountingPagesEnum::NEGATIVE_BALANCE->value, function ($query) {
                $query->havingRaw('total <= ?', [0]);
            })
            ->when(
                in_array($meta, [
                        AccountingPagesEnum::CREDIT_IN_HAND->value,
                        AccountingPagesEnum::NEGATIVE_BALANCE->value
                    ]
                ),
                function ($query) {
                    $query->orderBy('total', 'desc');
                }
            )
            ->paginate($this->filters['per_page'] ?? 15);
    }

    public function getProfit()
    {
        // TODO: Implement getProfit() method.
    }

    public function store(array $data)
    {
        $balance = 0;

        $where = [
            'tab' => $data['tab']
        ];

        if ($data['tab'] !== PaymentTabsEnum::BALANCE_SHEET->value) {
            $where['inquiry_id'] = $data['inquiry_id'] ?? null;
        }

        $latestBalance = $this->model->where($where)
            ->orderByDesc('id')
            ->first();

        if (!is_null($latestBalance)) {
            $balance = $latestBalance->balance;
        }

        if ($data['debit'] > 0) {
            $balance -= $data['debit'];
        }

        if ($data['credit'] > 0) {
            $balance += $data['credit'];
        }

        $data['balance'] = $balance;

        $remark = $data['remark'] ?? null;

        unset($data['remark']);

        $resource = parent::store($data);

        if (!is_null($remark)) {
            $resource->remark()->create([
                'body' => $remark,
                'created_by' => Auth::id()
            ]);
        }

        $resource->load(['remark', 'inquiry']);

        return $resource;
    }
}
