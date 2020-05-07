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
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('LotteryTitle');
            $table->text('LotteryContent');
            $table->text('LotteryFirstPrize')->nullable();
            $table->text('LotteryPrizes')->nullable();
            $table->string('LotteryImage');
            $table->unsignedBigInteger('LotteryOwner')->nullable();
            $table->foreign('LotteryOwner')->references('id')->on('users')->onDelete('cascade');
            $table->enum('LotteryType' , ['Digital' , 'Traditional'])->nullable();
            $table->unsignedBigInteger('LotteryWorker');
            $table->foreign('LotteryWorker')->references('id')->on('users')->onDelete('cascade');
            $table->date('LotteryDate');
            $table->enum('LotteryMode',['Public','Private']);
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
        Schema::dropIfExists('lotteries');
    }
}
