<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum PaymentTabsEnum : string
{
    use EnumToArrayTrait;

    case BALANCE_SHEET = 'balance_sheet';
    case PAYMENTS = 'payments';
    case FUTURE_DUES = 'future_dues';
    case PETTY = 'petty';
    case PROFIT = 'profit';
}
