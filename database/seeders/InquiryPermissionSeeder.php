<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InquiryPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user:controller_manager',
            'user:controller_team_leader',
            'user:controller_accountant',
            'user:controller_procurement',
            'user:controller_client',

            'user:access_confidential_profile',
            'user:access_inquiry_comment_show_confidential',

            'tab:inquiry_docs',
            'tab:inquiry_confidential',
            'tab:inquiry_calculation',

            'action:inquiry_start',
            'action:inquiry_supplier',
            'action:inquiry_assign',
            'action:inquiry_approve',
            'action:inquiry_reminder',
            'action:inquiry_reject',
            'action:inquiry_cancel',
            'action:inquiry_re_assign',
            'action:inquiry_comment_add',
            'action:inquiry_comment_add_question',
            'action:inquiry_comment_add_confidential',

            'action:inquiry_docs_upload',
            'action:inquiry_docs_download',
            'action:inquiry_docs_delete',

            'action:inquiry_confidential_upload',
            'action:inquiry_confidential_download',
            'action:inquiry_confidential_delete',

        ];


        DB::beginTransaction();

        try {
            foreach ($permissions as $per) {

                $permission = Permission::create(['name' => $per]);
                // $managerRole = Role::findByName('manager');
                // $teamLeaderRole = Role::findByName('team-leader');

                // $managerRole->givePermissionTo($permission);
                // $teamLeaderRole->givePermissionTo($permission);

                // $permission->assignRole($managerRole);
                // $permission->assignRole($teamLeaderRole);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        DB::commit();
    }
}
