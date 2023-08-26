<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum AccountingPagesEnum :string
{
    use EnumToArrayTrait;

    case CREDIT_IN_HAND = 'credit-in-hand';
    case NEGATIVE_BALANCE = 'negative-balance';
    case TO_BE_PAID = 'to-be-paid';
    case WILL_PAY = 'will-pay';
}
