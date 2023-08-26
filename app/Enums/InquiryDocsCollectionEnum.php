<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum InquiryDocsCollectionEnum: string
{
    use EnumToArrayTrait;

    case CONFIDENTIAL = 'confidential';

    case DOCS = 'docs';
}
