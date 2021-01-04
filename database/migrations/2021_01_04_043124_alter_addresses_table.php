<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('addresses', function (Blueprint $table) {
          $table->string('area')->after('country_id')->default("country_id");
          $table->string('district')->after('country_id')->default("country_id");
          $table->string('zone')->after('country_id')->default("country_id");
          $table->string('lat')->after('country_id')->default("country_id");
          $table->string('lon')->after('country_id')->default("country_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('addresses', function (Blueprint $table) {
          $table->string('area');
          $table->string('district');
          $table->string('zone');
          $table->string('lat');
          $table->string('lon');
        });
    }
}
