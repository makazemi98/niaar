<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum BillToEnum : string
{
    use EnumToArrayTrait;

    case NIAAR = 'Niaar';

    case CLIENT = 'Client';

    case SUPPLIER = 'Supplier';


}
