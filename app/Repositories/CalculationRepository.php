<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CalculationRepositoryInterface;
use App\Models\Calculation;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CalculationRepository extends BaseRepository implements CalculationRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Calculation::class);
    }

    /**
     * Store inquiry calculations
     *
     * @param Inquiry $inquiry
     * @param array $calcData
     * @return Inquiry|\Exception
     */
    public function storeCalculation(Inquiry $inquiry, array $calcData)
    {
        DB::beginTransaction();
        try {
            $calculation = $this->store([
                'inquiry_id' => $inquiry->id,
                'supplier_id' => $calcData['supplier_id'],
                'buying_price' => $calcData['buying_price'],
                'buying_currency' => strtolower($calcData['buying_currency']),
                'buying_total_price_aed' => $calcData['buying_total_price_aed'],
                'quoted_price' => $calcData['quoted_price'],
                'quoted_currency' => strtolower($calcData['quoted_currency']),
                'quoted_price_aed' => $calcData['quoted_price_aed'],
                'qty' => $calcData['qty'],
                'actual_ordered_price_aed' => $calcData['actual_ordered_price_aed'],
                'created_by' => Auth::id()
            ]);

            $calculation->remark()->create([
                'title' => null,
                'body' => $calcData['remark'],
                'created_by' => Auth::id()
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        $inquiry->load(['calculations.remark', 'calculations.supplier']);

        return $inquiry;
    }

    /**
     * Update calculation data
     *
     * @param Inquiry $inquiry
     * @param Calculation $calculation
     * @param array $calcData
     * @return Inquiry|\Exception
     */
    public function updateCalculation(Inquiry $inquiry, Calculation $calculation, array $calcData)
    {
        DB::beginTransaction();
        try {
            $calculation->update([
                'actual_ordered_price_aed' => $calcData['actual_ordered_price_aed'],
            ]);

            $calculation->remark()->update([
                'body' => $calcData['remark'],
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception;
        }

        DB::commit();

        $inquiry->load(['calculations.remark', 'calculations.supplier']);

        return $inquiry;
    }
}
