<?php

namespace App\Repositories;

use App\Interfaces\Repositories\FutureDueRepositoryInterface;
use App\Models\FutureDue;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Auth;

class FutureDueRepository extends BaseRepository implements FutureDueRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(FutureDue::class);
    }

    /**
     * Store new future due
     *
     * @param Inquiry $inquiry
     * @param array $futureDueData
     * @return Inquiry|\Exception
     */
    public function storeFutureDue(Inquiry $inquiry, array $futureDueData): Inquiry|\Exception
    {
        try {
            $this->store([
                'inquiry_id' => $inquiry->id,
                'bill_to' => $futureDueData['bill_to'],
                'payee_name' => $futureDueData['payee_name'],
                'payable_amount' => $futureDueData['payable_amount'],
                'receivable_amount' => $futureDueData['receivable_amount'],
                'currency' => strtolower($futureDueData['currency']),
                'due_date' => $futureDueData['due_date'],
                'is_paid' => $futureDueData['is_paid'],
                'created_by' => Auth::id()
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

        $inquiry->load(['futureDues']);

        return $inquiry;
    }

    /**
     * Update a specified future due
     *
     * @param Inquiry $inquiry
     * @param FutureDue $futureDue
     * @param array $sutureDuesData
     * @return Inquiry|\Exception
     */
    public function updateFutureDues(Inquiry $inquiry, FutureDue $futureDue, array $futureDueData): Inquiry|\Exception
    {
        try {
            $futureDue->update([
                'bill_to' => $futureDueData['bill_to'],
                'payee_name' => $futureDueData['payee_name'],
                'payable_amount' => $futureDueData['payable_amount'],
                'receivable_amount' => $futureDueData['receivable_amount'],
                'currency' => strtolower($futureDueData['currency']),
                'due_date' => $futureDueData['due_date'],
                'is_paid' => $futureDueData['is_paid'],
            ]);
        } catch (\Exception $exception) {
            return $exception;
        }

        $inquiry->load(['futureDues']);

        return $inquiry;
    }
}
