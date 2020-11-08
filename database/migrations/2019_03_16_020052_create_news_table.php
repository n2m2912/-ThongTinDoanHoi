<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('news');
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->text('new_title');
            $table->text('content');
            $table->unsignedInteger('author');
            $table->integer('viewed');
            $table->unsignedInteger('type');
            $table->integer('censored');
            $table->timestamps();
            $table->foreign('author')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('type')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
