<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum GenderEnum: string
{
    use EnumToArrayTrait;

    case MALE = "male";
    case FEMALE = "female";
    case NONE = "none";
}
