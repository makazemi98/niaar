<?php

namespace Database\Seeders;

use App\Enums\InquiryStatusesEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ManagerRolePermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
            // 'update-status:' . InquiryStatusesEnum::OPEN->value,
            // 'update-status:' . InquiryStatusesEnum::ON_PROGRESS->value,
            // 'update-status:' . InquiryStatusesEnum::QUOTATION_PREPARED->value,
            // 'update-status:' . InquiryStatusesEnum::QUOTED->value,
            // 'update-status:' . InquiryStatusesEnum::PAID->value,
            // 'update-status:' . InquiryStatusesEnum::ORDERED->value,
            // 'update-status:' . InquiryStatusesEnum::SUPPLIER_PAID->value,
            // 'update-status:' . InquiryStatusesEnum::TAX_SUBMITTED->value,
            // 'tab:inquiry_reminder'
            // 'action:inquiry_open'

        ];


        DB::beginTransaction();


        try {
            // $permission = Permission::create(['name' => 'action:inquiry_open', 'guard_name' => 'web']);

            // $permission1 = Permission::findByName('action:inquiry_re_assign', 'web');
            // $role = Role::findByName(RolesEnum::PROCUREMENT->value);

            // $role->givePermissionTo($permission1);
            // $role->revokePermissionTo('tab:inquiry_calculation');
            foreach ($permissions as $per) {

                // $permission = Permission::create(['name' => $per, 'guard_name' => 'web']);
                // $queries = DB::getQueryLog();

                // $permission = Permission::findByName($per, 'web');

                // $role = Role::findByName(RolesEnum::ACCOUNTANT->value);

                // $role->givePermissionTo($permission);

                // $permission->assignRole($role);
            }
        } catch (\Exception $exception) {
            dd($exception);
            DB::rollBack();
        }

        DB::commit();
    }
}
