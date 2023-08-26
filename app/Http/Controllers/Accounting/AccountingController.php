<?php

namespace App\Http\Controllers\Accounting;

use App\Enums\AccountingPagesEnum;
use App\Enums\PaymentTabsEnum;
use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentBalanceSheetRequest;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Http\Resources\Inquiry\InquiryCollection;
use App\Http\Resources\Payment\BalanceSheetResource;
use App\Http\Resources\Payment\PaymentCollection;
use App\Http\Resources\Payment\PaymentResource;
use App\Models\Inquiry;
use App\Models\Payment;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class AccountingController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse|PaymentCollection|InquiryCollection
     */
    public function index(Request $request)
    {
        $tab = $request->input('tab', 'balance-sheet');
        $sss = [];

        if ($tab === 'payments') {
            $inquiries = Inquiry::all();
            $clients =  User::whereHas('roles', function ($query) {
                return $query->whereIn('name', [RolesEnum::CLIENT->value]);
            })->get();

            return view('pages.accountant.accounting', compact('clients', 'inquiries'));
        } else if ($tab === 'future-dues') {
            $inquiries = Inquiry::all();

            return view('pages.accountant.accounting', compact('inquiries'));
        } else if ($tab === 'petty') {
            return view('pages.accountant.accounting', compact('sss'));
        } else if ($tab === 'profit') {
            return view('pages.accountant.accounting', compact('sss'));
        } else if ($tab === 'users-with-credit-hand') {
            return view('pages.accountant.accounting', compact('sss'));
        } else {
            $suppliers = Supplier::all();
            $inquiries = Inquiry::all();
            $clients =  User::whereHas('roles', function ($query) {
                return $query->whereIn('name', [RolesEnum::CLIENT->value]);
            })->get();

            return view('pages.accountant.accounting', compact('clients', 'inquiries', 'suppliers'));
        }
        /*
        if ($tab_name == 'meta') {
            return $this->paymentRepository->setFilters($request->all())->getMeta();
        } elseif (
            in_array($tab_name, PaymentTabsEnum::values()) &&
            $tab_name !== PaymentTabsEnum::PROFIT->value
        ) {
            $result = $this->paymentRepository
                ->setTabName($tab_name)
                ->setFilters($request->all())
                ->getTabData();

            if ($result->isNotEmpty()) {
                if ($tab_name == PaymentTabsEnum::BALANCE_SHEET->value) {
                    $collection = BalanceSheetResource::collection($result);
                } else {
                    $collection = ( new PaymentCollection($result) );
                }

                return $collection
                    ->additional([
                        'totals' => [
                            'debit' => $result->sum('debit'),
                            'credit' => $result->sum('credit'),
                            'balance' => $result->sum('balance')
                        ]
                    ]);
            } else {
                return response()->json([
                    'data' => null,
                    'totals' => [
                        'debit' => 0,
                        'credit' => 0,
                        'balance' => 0
                    ]
                ]);
            }
        } elseif ($tab_name == PaymentTabsEnum::PROFIT->value) {
            $result = $this->inquiryRepository->list($request->all());

            if ($result->isNotEmpty()) {
                return ( new InquiryCollection($result) )
                    ->additional([
                        'totals' => [
                            'debit' => $result->sum('debit'),
                            'credit' => $result->sum('credit'),
                            'balance' => $result->sum('balance')
                        ]
                    ]);
            } else {
                return response()->json(['data' => null]);
            }
        } else {
            abort(Response::HTTP_NOT_FOUND, "Invalid tab name: {$request->segment(5)}");
        }
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Payment $payment
     * @return \Illuminate\Http\JsonResponse
     */
    public function changePaidStatus(Request $request, Payment $payment)
    {
        // abort_if(
        //     $payment->tab !== PaymentTabsEnum::FUTURE_DUES->value,
        //     Response::HTTP_BAD_REQUEST,
        //     'Invalid future due id'
        // );

        // $request->validate([
        //     'is_paid' => ['required', 'boolean']
        // ]);

        // $payment->update([
        //     'is_paid' => $request->input('is_paid')
        // ]);

        // $payment->load('inquiry');

        // return ( new PaymentResource($payment) )
        //     ->response()
        //     ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePaymentRequest $request
     * @return BalanceSheetResource|PaymentResource
     */
    public function storePayment(StorePaymentRequest $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function storeFutureDues(StorePaymentRequest $request)
    {
        $data = $request->all();
        dd($data);
    }
    public function storeBalanceSheet(StorePaymentBalanceSheetRequest $request)
    {
        $data = $request->all();
        dd($data);
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
        // $tab = $request->segment(5);

        // $request->merge([
        //     'created_by' => Auth::id(),
        //     'tab' => $tab
        // ]);

        // $resource = $this->paymentRepository->store($request->all());

        // if ($tab == PaymentTabsEnum::BALANCE_SHEET->value) {
        //     return BalanceSheetResource::make($resource);
        // }

        // return PaymentResource::make($resource);
    }

    /**
     * Display the specified resource.
     *
     * @param $meta
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByMeta($meta, Request $request)
    {
        // abort_if(!in_array($meta, AccountingPagesEnum::values()), 404);

        // return response()->json([
        //     'data' => $this->paymentRepository->setFilters($request->all())->getUserByMeta($meta)
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
