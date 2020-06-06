<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessLevelManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_level_managers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Userid');
            $table->foreign('Userid')->on('users')->references('id')->onDelete('CASCADE');
            $table->text('Address');
            $table->string('CodeMeli');
            $table->text('identityCartPic');
            $table->text('About');
            $table->enum('Type',['Supervisor','Manager','LotteryOwner']);
            $table->enum('Status',['Waiting','Accepted','Rejected'])->default('Waiting');
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
        Schema::dropIfExists('access_level_managers');
    }
}
