<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToUserTable extends Migration
{
    /**
     * Command php artisan make:migration add_role_to_user_table --table=users
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Config::get('auth.table'), function (Blueprint $table) {
            //
            $table->integer('status')->after('email')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(Config::get('auth.table'), function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
}
