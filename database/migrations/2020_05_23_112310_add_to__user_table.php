<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('users', function ($table) {
            $table->text('identityCartPic')->nullable();
            $table->string('CodeMeli')->nullable();
            $table->text('Address')->nullable();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::table('users', function($table) {
            $table->dropColumn('Address');
            $table->dropColumn('CodeMeli');
            $table->dropColumn('identityCartPic');
        });*/
    }
}
