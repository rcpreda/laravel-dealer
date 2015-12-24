<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDealerUserIdToStoresTable extends Migration
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
        Schema::table('core_stores', function (Blueprint $table) {
            $table->integer('dealer_user_id')->after('id')->unsigned();
        });

        Schema::table('core_stores', function (Blueprint $table) {
            $table->foreign('dealer_user_id')
                ->references('id')
                ->on(Config::get('auth.table'))
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
        Schema::table('core_stores', function (Blueprint $table) {
            $table->dropForeign('core_stores_dealer_user_id_foreign');
            $table->dropColumn('dealer_user_id');
        });
    }
}
