<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteriesTable extends Migration
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







        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('LotteryTitle');
            $table->text('LotteryContent');
            $table->text('LotteryFirstPrize')->nullable();
            $table->text('LotteryPrizes')->nullable();
            $table->string('LotteryImage');
            $table->unsignedBigInteger('LotteryOwner')->nullable();
            $table->foreign('LotteryOwner')->references('id')->on('users')->onDelete('cascade');
             $table->unsignedBigInteger('Category')->nullable();
            $table->foreign('Category')->references('id')->on('lottery_categories')->onDelete('cascade');
            $table->enum('LotteryType' , ['Digital' , 'Traditional'])->nullable();
            $table->enum('Status' , ['InProgress' , 'Finished'])->nullable();
            $table->unsignedBigInteger('LotteryWorker');
            $table->foreign('LotteryWorker')->references('id')->on('users')->onDelete('cascade');
            $table->date('LotteryDate');
            $table->enum('LotteryMode',['Public','Private']);
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
        Schema::dropIfExists('lotteries');
        Schema::dropIfExists('lottery_categories');
        Schema::dropIfExists('Lottery_Cat');
    }
}
