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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('default.jpg');
            $table->string('user_type')->default('Staff');
            $table->string('FirstName')->unique()->nullable();
            $table->string('LastName')->unique()->nullable();
            $table->string('Gender')->nullable();
            $table->string('Department')->nullable();
            $table->string('Address')->nullable();
            $table->integer('Av_leave')->default('30');
            $table->integer('Phonenumber')->nullable();
            $table->string('Dob')->nullable();
            $table->string('Status')->default('1');
            $table->rememberToken();
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
