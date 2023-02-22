<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('register')->unique();
            $table->string('usertype')->nullable()->default('Student');
            $table->string('lastname')->nullable();
            $table->string('firstname')->nullable();
            $table->string('civility')->nullable();
            $table->string('email')->unique();
            $table->string('birthday')->nullable();
            $table->string('nationality')->nullable();
            $table->string('section')->nullable();
            $table->float('writing')->nullable()->default(0.0);
            $table->float('reading')->nullable()->default(0.0);
            $table->float('listening')->nullable()->default(0.0);
            $table->float('speaking')->nullable()->default(0.0);
            $table->float('ielts')->nullable();
            $table->float('average')->nullable()->default(0.0);
            $table->integer('rank')->unique()->nullable();
            $table->string('status')->nullable()->default('0');
            $table->string('management')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
};
