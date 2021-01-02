<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterOrderProductTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('order_product', function (Blueprint $table) {
      $table->string('image_name')->after('discount')->nullable();
      $table->tinyInteger('interest_logo')->after('discount')->nullable();
      $table->integer('color_no')->after('discount')->default(1)->nullable();
      $table->integer('total_color_price')->after('discount')->default(1)->nullable();
      $table->integer('total_frame_price')->after('discount')->default(1)->nullable();
      $table->integer('quantity_xs')->after('discount')->default(0)->nullable();
      $table->integer('quantity_s')->after('discount')->default(0)->nullable();
      $table->integer('quantity_m')->after('discount')->default(0)->nullable();
      $table->integer('quantity_xl')->after('discount')->default(0)->nullable();
      $table->integer('quantity_2xl')->after('discount')->default(0)->nullable();
      $table->integer('quantity_3xl')->after('discount')->default(0)->nullable();
      $table->tinyInteger('front')->after('discount')->default(0)->nullable();
      $table->tinyInteger('back')->after('discount')->default(0)->nullable();
      $table->tinyInteger('pocket')->after('discount')->default(0)->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('order_product', function (Blueprint $table) {
      $table->dropColumn('image_name');
      $table->dropColumn('total_frame_price');
      $table->dropColumn('total_color_price');
      $table->dropColumn('front');
      $table->dropColumn('back');
      $table->dropColumn('pocket');
      $table->dropColumn('color_no');
      $table->dropColumn('quantity_xs');
      $table->dropColumn('quantity_s');
      $table->dropColumn('quantity_m');
      $table->dropColumn('quantity_xl');
      $table->dropColumn('quantity_2xl');
      $table->dropColumn('quantity_3xl');
      $table->dropColumn('interest_logo');
    });
  }
}
