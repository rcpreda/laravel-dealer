<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;
use \App\Entities\Permission;


class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);

        $permission1 = Permission::find(1);
        $permission2 = Permission::find(2);
        $permission3 = Permission::find(3);
        $permission4 = Permission::find(4);
        $permission5 = Permission::find(5);
        $permission6 = Permission::find(6);
        $admin->assign($permission1);
        $admin->assign($permission2);
        $admin->assign($permission3);
        $admin->assign($permission4);
        $admin->assign($permission5);
        $admin->assign($permission6);

    }
}