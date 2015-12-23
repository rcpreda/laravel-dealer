<?php

use Illuminate\Database\Seeder;
use App\Entities\Role;
use \App\Entities\Permission;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => "dealer",
            'label' => "Dealer Administrator Group",
        ]);

        Role::create([
            'name' => "staff",
            'label' => "Dealer Staff User Group",
        ]);
    }
}
