<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGetquotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('getquotes', function (Blueprint $table) {


//                $table->string('company_name')->nullable()->after('email');
////                $table->integer('user_id')->after('company_name')->unsigned();
////                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
////                $table->string('attachment1')->nullable()->after('user_id');
////                $table->string('attachment2')->nullable()->after('attachment1');
//                $table->string('subcategory')->nullable()->after('attachment2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('getquotes', function (Blueprint $table) {
            $table->dropIfExists('getquotes');
        });
    }
}
