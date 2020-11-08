<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('files');
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->text('file_name');
            $table->string('file_type',50);
            $table->text('file_path');
            $table->unsignedInteger('user_upload_id');
            $table->unsignedInteger('library')->nullable();
            $table->unsignedInteger('new')->nullable();
            $table->timestamps();
            $table->foreign('user_upload_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('library')->references('id')->on('libraries')->onDelete('cascade');
            $table->foreign('new')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
}
