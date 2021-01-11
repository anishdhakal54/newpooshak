<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('quantity_l')->after("quantity_m")->default(0);
            $table->string('stock_quantity_xs')->after("v1")->default(0);
            $table->string('stock_quantity_s')->after("stock_quantity_xs")->default(0);
            $table->string('stock_quantity_m')->after("stock_quantity_s")->default(0);
            $table->string('stock_quantity_l')->after("stock_quantity_m")->default(0);
            $table->string('stock_quantity_xl')->after("stock_quantity_l")->default(0);
            $table->string('stock_quantity_xxl')->after("stock_quantity_xl")->default(0);
            $table->string('stock_quantity_xxxl')->after("stock_quantity_xxl")->default(0);

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
            $table->dropColumn('quantity_l');
            $table->dropColumn('stock_quantity_xs');
            $table->dropColumn('stock_quantity_s');
            $table->dropColumn('stock_quantity_m');
            $table->dropColumn('stock_quantity_l');
            $table->dropColumn('stock_quantity_xl');
            $table->dropColumn('stock_quantity_xxl');
            $table->dropColumn('stock_quantity_xxxl');

        });
    }
}
