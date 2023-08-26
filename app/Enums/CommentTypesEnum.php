<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum CommentTypesEnum : string
{
    use EnumToArrayTrait;

    case COMMENT = 'comment';
    case QUESTION = 'question';
    case REPLY = 'reply';
    case CONFIDENTIAL = 'confidential';
}
