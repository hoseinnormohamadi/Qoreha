<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeLotterriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_lotterries', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->text('Description');
            $table->text('Image');
            $table->text('Members');
            $table->text('Wins')->nullable();
            $table->integer('Amount');
            $table->integer('Payment');
            $table->enum('Type',['Online','Offline']);
            $table->enum('Period',['Weekly','twoweeks','monthly','twomonths','threemonths']);
            $table->date('StartDate');
            $table->unsignedBigInteger('Owner');
            $table->foreign('Owner')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('home_lotterries');
    }
}
