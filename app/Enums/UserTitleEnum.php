<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum UserTitleEnum: string
{
    use EnumToArrayTrait;

    case MR = 'Mr';
    case Mrs = 'Mrs';
    // case Miss = 'Miss';
    // case MS = 'Ms';
}
