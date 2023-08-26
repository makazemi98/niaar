<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum InquiryActionsEnum: string
{
    use EnumToArrayTrait;

    /*
    |--------------------------------------------------------------------------
    | CANCEL
    |--------------------------------------------------------------------------
    |
    | When an open, assigned or on progress inquiry is being canceled by Clients or Manager/Team leader/Procurement.
    | Cancel button will disappear after inquiry being quoted.
    |
    */
    case CANCEL = 'cancel';

    /*
    |--------------------------------------------------------------------------
    | RE_ASSIGN
    |--------------------------------------------------------------------------
    |
    | When a procurement/Team Lead/Manager reassign the inq to another procurement
    | It can be done in any Status .
    | After re-assign inquiry to another procurement,
    | the previous procurements don't have access to the inquiry anymore.
    |
    */
    case RE_ASSIGN = 're_assign';
}
