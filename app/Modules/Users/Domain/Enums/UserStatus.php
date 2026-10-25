<?php

namespace App\Modules\Users\Domain\Enums;

enum UserStatus : string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case SUSPENDED = 'suspended';
}
