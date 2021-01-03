<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('galleries', function (Blueprint $table) {
      $table->increments('id');
      $table->string('gallery_name')->nullable();
      $table->string('gallery_description')->nullable();
      $table->integer('user_id')->unsigned();
      $table->string('link')->nullable();
      $table->string('priority')->nullable();
      $table->boolean('active')->default(true);
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
    Schema::dropIfExists('galleries');
  }
}
