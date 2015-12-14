<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesAndPermissionsTables extends Migration
{
    /**
     * Command: php artisan make:migration create_roles_and_permissions_tables
     *
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Config::get('acl.roles_table'), function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('label');
            $table->timestamps();
        });

        Schema::create(Config::get('acl.permissions_table'), function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        Schema::create(Config::get('acl.permissions_roles_table'), function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop(Config::get('acl.permissions_roles_table'));
        Schema::drop(Config::get('acl.permissions_table'));
        Schema::drop(Config::get('acl.roles_table'));
    }
}
