<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('libraries');
        Schema::create('libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->text('library_title');
            $table->unsignedInteger('user_create_id');
            $table->timestamps();
            $table->foreign('user_create_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libraries');
    }
}
