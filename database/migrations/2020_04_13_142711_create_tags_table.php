<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('Post_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('Post_id');
            $table->unsignedBigInteger('tags_id');
            $table->unique(['Post_id','tags_id']);
            $table->foreign('Post_id')->references('id')->on('Blog')->onDelete('cascade');
            $table->foreign('tags_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('Post_tag');
    }
}
