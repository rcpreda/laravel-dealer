<?php

use Illuminate\Database\Seeder;
use \App\Entities\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Razvan Preda",
            'email' => "test@test.com",
            'password' => bcrypt('testtest'),
            'remember_token' => str_random(10),
            'role_id' => 1
        ]);

    }
}
