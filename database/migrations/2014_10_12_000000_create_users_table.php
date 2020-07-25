<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Username');
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ProfileImage')->nullable();
            $table->text('Bio')->nullable();
            $table->string('PhoneNumber')->unique();
            $table->string('FaceBook')->nullable();
            $table->string('Twitter')->nullable();
            $table->integer('PhoneActivationCode')->nullable();
            $table->string('EmailActivationCode')->nullable();
            $table->text('identityCartPic')->nullable();
            $table->string('CodeMeli')->nullable();
            $table->text('Address')->nullable();
            $table->enum('Rule', ['Admin', 'Manager', 'LotteryOwner', 'Supervisor', 'User', 'Robot'])->default('User');
            $table->enum('AccountStatus', ['Active', 'Deactive'])->default('Deactive');
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

        Schema::dropIfExists('users');

    }
}
