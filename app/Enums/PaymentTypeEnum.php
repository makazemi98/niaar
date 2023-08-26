<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum PaymentTypeEnum : string
{
    use EnumToArrayTrait;

    case DEBIT = 'debit'; // Company paid to supplier. So this is client debt.
    case CREDIT = 'credit'; // Paid to company
}
