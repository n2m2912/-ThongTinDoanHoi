<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name',100);
            $table->string('username',100);
            $table->string('password');
            $table->string('email',100)->unique();
            $table->string('phone',10);
            $table->unsignedInteger('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
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
