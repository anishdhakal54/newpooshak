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
          $table->string('area')->after('country_id')->nullable();
          $table->string('district')->after('country_id')->nullable();
          $table->string('zone')->after('country_id')->nullable();
          $table->string('lat')->after('country_id')->nullable();
          $table->string('lon')->after('country_id')->nullable();
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
          $table->dropColumn('area');
          $table->dropColumn('district');
          $table->dropColumn('zone');
          $table->dropColumn('lat');
          $table->dropColumn('lon');
        });
    }
}
