<?php

namespace App\Interfaces\Repositories;

use App\Models\Calculation;
use App\Models\Inquiry;

interface CalculationRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Store new calculation data
     *
     * @param Inquiry $inquiry
     * @param array $calcData
     * @return Inquiry|\Exception
     */
    public function storeCalculation(Inquiry $inquiry, array $calcData);

    /**
     * Update calculation data
     *
     * @param Inquiry $inquiry
     * @param Calculation $calculation
     * @param array $calcData
     * @return Inquiry|\Exception
     */
    public function updateCalculation(Inquiry $inquiry, Calculation $calculation, array $calcData);

}
