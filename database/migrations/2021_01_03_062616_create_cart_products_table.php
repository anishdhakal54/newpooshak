<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('xs')->default(0);
            $table->integer('s')->default(0);
            $table->integer('m')->default(0);
            $table->integer('xl')->default(0);
            $table->integer('xxl')->default(0);
            $table->integer('xxxl')->default(0);
            $table->boolean('hasframe');
            $table->integer('color_no')->default(0);
            $table->integer('front')->default(0);
            $table->integer('back')->default(0);
            $table->integer('pocket')->default(0);
            $table->string('imagename')->nullable();
            $table->decimal('price',10,2)->nullable();
            $table->integer('product_id');
            $table->integer('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_products');
    }
}
