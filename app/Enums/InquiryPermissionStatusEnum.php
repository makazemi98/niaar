<?php

namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum InquiryStatusesEnum :string
{
    use EnumToArrayTrait;

    case OPEN = 'update-status:open';

    case ON_PROGRESS = 'update-status:on_progress';

    case QUOTATION_PREPARED = 'quotation_prepared';

    case QUOTED = 'quoted';

    case REJECTED = 'rejected';

    case APPROVED = 'approved';

    case PAID = 'paid';

    case ORDERED = 'ordered';

    case SUPPLIER_PAID = 'supplier_paid';

    case DELIVERED = 'delivered';

    case TAX_SUBMITTED = 'tax_submitted';


    
}
