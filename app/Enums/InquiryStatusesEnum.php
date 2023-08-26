<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum InquiryStatusesEnum: string
{
    use EnumToArrayTrait;

    /*
    |--------------------------------------------------------------------------
    | OPEN
    |--------------------------------------------------------------------------
    |
    | When an inquiry submitted by a client or team leads to a new inquiry.
    |
    | Change status: N/A
    |
    */
    case BY_CLIENT_OPEN = 'client_open';

        /*
    |--------------------------------------------------------------------------
    | OPEN
    |--------------------------------------------------------------------------
    |
    | When an inquiry submitted by a client or team leads to a new inquiry.
    |
    | Change status: N/A
    |
    */
    case OPEN = 'open';

        /*
    |--------------------------------------------------------------------------
    | ASSIGNED
    |--------------------------------------------------------------------------
    |
    | When Team lead or Manager assign a ticket to a Procurement / Team lead
    | ( Team lead can assign inquiries for herself ( as Procurement member )  as well)
    |
    | Change status: N/A
    |
    */
    case ASSIGNED = 'assigned';

        /*
    |--------------------------------------------------------------------------
    | ON_PROGRESS
    |--------------------------------------------------------------------------
    |
    | When Procurement / Team lead (for self assigned inquiries) open an inquiry and start working on it ,
    | she can click on “start” and the status will turn Submitted.
    | Start button will disappear after clicking on it.
    | The start button will appear again when inquiry is being reassigned to another procurement.
    |
    | Change status: only can be changed to Quotation prepared. If re-assigned the status will be changed to assigned again
    |
    */
    case ON_PROGRESS = 'on_progress';

        /*
    |--------------------------------------------------------------------------
    | QUOTATION_PREPARED
    |--------------------------------------------------------------------------
    |
    | Procurement or Team lead as a Procurement submits and upload a quotation to the Accountant / Team lead.
    |
    | Change status: N/A
    | Only if accountant or team lead approve the prepared quotation, the status will turn to Quoted
    | If they declined, it will turned to On Progress
    |
    */
    case QUOTATION_PREPARED = 'quotation_prepared';

        /*
    |--------------------------------------------------------------------------
    | QUOTED
    |--------------------------------------------------------------------------
    |
    | Team Lead or Accountant, submits a quotation to the user.
    | The documents related to this inquiry that were added in the  “quotation prepared” step  will be
    | available for customers after the status becomes “QUOTED”.
    |
    | Change status: N/A
    |
    | Only if Customer rejects the offer, it will be Rejected.
    | If approved, it will be approved.
    | If team lead or procurement REJECT the inquiry , it will be REJECTED.
    |
    */
    case QUOTED = 'quoted';

        /*
    |--------------------------------------------------------------------------
    | REJECTED
    |--------------------------------------------------------------------------
    |
    | Quoted inquiry is rejected by Customer or Manager/ Team leader/ Procurement.
    |
    | Change status: N/A
    |
    */
    case REJECTED = 'rejected';

        /*
    |--------------------------------------------------------------------------
    | APPROVED
    |--------------------------------------------------------------------------
    |
    | Quoted inquiry is approved by Customer or Manager/ Team lead / Procurement.
    | After that, Procurement has to add PI to the confidential docs of inquiry page.
    |
    | Change status: From approved to Paid ( only by team lead or accountant )
    | From approved to rejected ( by procurement / team lead )
    |
    */
    case APPROVED = 'approved';

        /*
    |--------------------------------------------------------------------------
    | PAID
    |--------------------------------------------------------------------------
    |
    | The order is paid by client. This inquiry status is only to be changed
    | by the Team lead or Accountant.( ready to make an order on this step )
    |
    | Change status: Ordered or On Progress. (only by the Accountant or Team Lead)
    |
    */
    case PAID = 'paid';

        /*
    |--------------------------------------------------------------------------
    | ORDERED
    |--------------------------------------------------------------------------
    |
    | The order is paid by Niaar to the supplier and awaiting shipment or next payment date.
    | In this case the next payment date or shipment date has to be set as a reminder event to
    | the inquiry to remind the Employee and Client.
    |
    | Change status: Supplier paid (only by the Accountant or Team Lead) or
    | Paid (By Accountant or Team Lead or procurement)
    |
    */
    case ORDERED = 'ordered';

        /*
    |--------------------------------------------------------------------------
    | SUPPLIER_PAID
    |--------------------------------------------------------------------------
    |
    | This step should be hidden for customers.This inquiry status is only to be changed by the Accountant or Team lead.
    |
    | Change status: N/A
    |
    */
    case SUPPLIER_PAID = 'supplier_paid';

        /*
    |--------------------------------------------------------------------------
    | DELIVERED
    |--------------------------------------------------------------------------
    |
    | The order is DELIVERED to Client.
    | In this stage Tax invoice and delivery notes have to be created and added to the confidential folder.
    |
    | Change status: N/A
    |
    */
    case DELIVERED = 'delivered';

        /*
    |--------------------------------------------------------------------------
    | TAX_SUBMITTED
    |--------------------------------------------------------------------------
    |
    | Tax information and docs are submitted This inquiry status is only to be changed by the Accountant.
    | Accountant has to submit Exit BL and other invoices related to this Inquiry in this stage.
    |
    | Change status: N/A
    |
    */
    case TAX_SUBMITTED = 'tax_submitted';

    public static function profitable()
    {
        return [
            InquiryStatusesEnum::ORDERED->value,
            InquiryStatusesEnum::SUPPLIER_PAID->value,
            InquiryStatusesEnum::DELIVERED->value,
            InquiryStatusesEnum::TAX_SUBMITTED->value
        ];
    }

    public static function manualUpdateStatusByUser()
    {
        return [
            InquiryStatusesEnum::BY_CLIENT_OPEN->value,
            InquiryStatusesEnum::OPEN->value,
            InquiryStatusesEnum::ON_PROGRESS->value,
            InquiryStatusesEnum::QUOTATION_PREPARED->value,
            InquiryStatusesEnum::QUOTED->value,
            InquiryStatusesEnum::PAID->value,
            InquiryStatusesEnum::ORDERED->value,
            InquiryStatusesEnum::SUPPLIER_PAID->value,
            InquiryStatusesEnum::TAX_SUBMITTED->value,
        ];
    }
}
