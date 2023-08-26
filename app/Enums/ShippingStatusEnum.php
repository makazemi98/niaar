<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum ShippingStatusEnum : string
{
    use EnumToArrayTrait;

    case PREPARING = 'preparing';

    case HANDED_TO_CAPT = 'handed_to_capt';

    case LEFT_DUBAI = 'left_dubai';

    case DOCUMENT_COLLECTED = 'document_collected';

    case REACHED_TO_DESTINATION = 'reached_to_destination';

    case PAID = 'paid';

    case DELIVERED = 'delivered';
}
