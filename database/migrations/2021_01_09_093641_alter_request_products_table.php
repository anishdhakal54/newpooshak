<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRequestProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_products', function (Blueprint $table) {
            $table->integer('user_id')->after('id')->nullable();
            $table->string('company_name')->after('attachment1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_products', function (Blueprint $table) {
            $table->dropColumn('company_name');
        });
    }
}
