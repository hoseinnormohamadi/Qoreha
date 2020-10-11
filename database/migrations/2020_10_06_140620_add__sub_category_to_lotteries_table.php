<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubCategoryToLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lotteries', function (Blueprint $table) {
            $table->unsignedBigInteger('SubCategory');
            $table->foreign('SubCategory')->references('id')->on('sub_categories')->onDelete('cascade');
        });
        Schema::table('wwals', function (Blueprint $table) {
            $table->unsignedBigInteger('SubCategory');
            $table->foreign('SubCategory')->references('id')->on('sub_categories')->onDelete('cascade');
            $table->unsignedBigInteger('Category');
            $table->foreign('Category')->references('id')->on('lottery_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('lotteries', function (Blueprint $table) {
            $table->dropForeign(['SubCategory']);
        });
        Schema::table('wwals', function (Blueprint $table) {
            $table->dropForeign(['SubCategory']);
            $table->dropForeign(['Category']);

        });


        Schema::table('lotteries', function (Blueprint $table) {
            $table->dropColumn('SubCategory');
        });
        Schema::table('wwals', function (Blueprint $table) {
            $table->dropColumn('SubCategory');
            $table->dropColumn('Category');
        });
    }
}
