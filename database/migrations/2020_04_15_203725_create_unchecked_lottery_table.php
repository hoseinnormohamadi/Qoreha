<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUncheckedLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uncheckedLottery', function (Blueprint $table) {
            $table->id();
            $table->text('LotteryContent');
            $table->text('LotteryImage');
            $table->text('LotteryImageLink')->unique();
            $table->enum('LotteryStatus',['Draft','Published','Waiting','Archive'])->default('Waiting');
            $table->unsignedBigInteger('Worker');
            $table->foreign('Worker')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('uncheckedLottery');
    }
}
