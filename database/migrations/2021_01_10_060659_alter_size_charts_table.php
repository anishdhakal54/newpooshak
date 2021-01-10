<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSizechartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('size_charts', function (Blueprint $table) {
            $table->string('v7')->after('v6');
            $table->string('w7')->after('w6');
            $table->string('x7')->after('x6');
            $table->string('y7')->after('y6');
            $table->string('z7')->after('z6');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('size_charts', function (Blueprint $table) {
            $table->dropColumn('v7');
            $table->dropColumn('w7');
            $table->dropColumn('x7');
            $table->dropColumn('y7');
            $table->dropColumn('z7');
        });
    }
}
