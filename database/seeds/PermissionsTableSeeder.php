<?php

use Illuminate\Database\Seeder;
use \App\Entities\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name' => "Permissions Create Action",
            'slug' => "admin.permissions.create",
        ]);

        Permission::create([
            'name' => "Permissions Delete Action",
            'slug' => "admin.permissions.destroy",
        ]);

        Permission::create([
            'name' => "Permissions Update Action",
            'slug' => "admin.permissions.update",
        ]);

        Permission::create([
            'name' => "Permissions Edit Action",
            'slug' => "admin.permissions.edit",
        ]);

    }
}
