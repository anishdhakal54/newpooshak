<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::table('products', function (Blueprint $table) {
            $table->string('quantity_xs')->after("view_chart")->default(0);
            $table->string('quantity_s')->after("view_chart")->default(0);
            $table->string('quantity_m')->after("view_chart")->default(0);
            $table->string('quantity_xl')->after("view_chart")->default(0);
            $table->string('quantity_xxl')->after("view_chart")->default(0);
            $table->string('quantity_xxxl')->after("view_chart")->default(0);
            $table->string('v1')->after("quantity_xxxl")->default(0);
            $table->boolean('notify')->after("v1")->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('quantity_xs');
            $table->dropColumn('quantity_s');
            $table->dropColumn('quantity_m');
            $table->dropColumn('quantity_xl');
            $table->dropColumn('quantity_xxl');
            $table->dropColumn('quantity_xxxl');
            $table->dropColumn('notify');

        });
    }
}
