<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteryCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lottery_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('Lottery_Cat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Lottery_id');
            $table->unsignedBigInteger('Cat_id');
            $table->unique(['Cat_id','Lottery_id']);
            $table->foreign('Lottery_id')->references('id')->on('lotteries')->onDelete('cascade');
            $table->foreign('Cat_id')->references('id')->on('lottery_categories')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lottery_categories');
        Schema::dropIfExists('Lottery_Cat');
    }
}
