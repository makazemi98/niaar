<?php

namespace App\Interfaces\Repositories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Model;

interface InquiryRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Store a new inquiry resource in storage
     *
     * @param array $inquiryData
     * @return Inquiry | \Exception
     */
    public function storeInquiry(array $inquiryData): Inquiry | \Exception;

    /**
     * Assign an inquiry to a user
     *
     * @param Inquiry $inquiry
     * @param int $assignTo
     * @return Inquiry | \Exception
     */
    public function assignTo(Inquiry $inquiry, int $assignTo): Inquiry | \Exception;

    /**
     * Store a comment for specified inquiry
     *
     * @param Inquiry $inquiry
     * @param array $comment
     * @return \Exception | Model
     */
    public function storeComment(Inquiry $inquiry, array $comment): \Exception | Model;

    /**
     * change specified inquiry status
     *
     * @param Inquiry $inquiry
     * @param array $statusData
     * @return Inquiry|\Exception
     */
    public function changeStatus(Inquiry $inquiry, array $statusData): Inquiry|\Exception;

    /**
     * Perform an action on specified inquiry
     *
     * @param Inquiry $inquiry
     * @param array $actionData
     * @return Inquiry|\Exception
     */
    public function performAction(Inquiry $inquiry, array $actionData): Inquiry|\Exception;

    /**
     * Upload inquiry document
     *
     * @param Inquiry $inquiry
     * @param array $data
     * @return Inquiry|\Exception
     */
    public function uploadDoc(Inquiry $inquiry, array $data);

    /**
     * Calculate inquiry profit by user
     *
     * @param $userId
     * @return mixed
     */
    public function calcProfitByUser($userId);
}
