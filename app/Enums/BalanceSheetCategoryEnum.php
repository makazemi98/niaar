<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum BalanceSheetCategoryEnum : string
{
    use EnumToArrayTrait;

    case INTERNAL_CHARGERS = 'internal_charges';

    case ORDER_RELATED = 'order_related';

    case SALARY = 'salary';

    case VAT = 'vat';

    case TAX = 'tax';

    case PETTY = 'petty';

    case CUSTOM_DUTY_REFUND = 'custom_duty_refund';
}
