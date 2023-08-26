<?php

namespace App\Interfaces\Repositories;

use App\Models\FutureDue;
use App\Models\Inquiry;

interface FutureDueRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Store new future due
     *
     * @param Inquiry $inquiry
     * @param array $futureDueData
     * @return Inquiry|\Exception
     */
    public function storeFutureDue(Inquiry $inquiry, array $futureDueData): Inquiry|\Exception;

    /**
     * Update a specified future due
     *
     * @param Inquiry $inquiry
     * @param FutureDue $futureDue
     * @param array $futureDueData
     * @return Inquiry|\Exception
     */
    public function updateFutureDues(Inquiry $inquiry, FutureDue $futureDue, array $futureDueData): Inquiry|\Exception;
}
