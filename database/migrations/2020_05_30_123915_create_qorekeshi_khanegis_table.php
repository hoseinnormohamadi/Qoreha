<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQorekeshiKhanegisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qorekeshi_khanegis', function (Blueprint $table) {
            $table->id();
            $table->text('Aza');
            $table->text('Qavanin');
            $table->enum('Jarime' , ['Active','Deactive']);
            $table->enum('Status' , ['finished','inWay']);
            $table->string('MeqdarJarime');
            $table->integer('Afrad');
            $table->string('KollPoll');
            $table->integer('Modat');
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
        Schema::dropIfExists('qorekeshi_khanegis');
    }
}
