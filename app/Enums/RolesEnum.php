<?php
namespace App\Enums;

use App\Traits\EnumToArrayTrait;

enum RolesEnum: string
{
    use EnumToArrayTrait;

    // case SUPER_ADMIN = "super-admin";
    case MANAGER = 'manager';
    case TEAM_LEADER = 'team-leader';
    case ACCOUNTANT = 'accountant';
    case PROCUREMENT = 'procurement';
    case CLIENT = 'client';

    public static function admins()
    {
        return [
            RolesEnum::MANAGER->value,
            RolesEnum::TEAM_LEADER->value,
            RolesEnum::ACCOUNTANT->value,
            RolesEnum::PROCUREMENT->value,
        ];
    }
}
