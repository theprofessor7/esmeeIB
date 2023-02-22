<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserchoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userchoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('school', 32)->nullable();
            $table->string('order', 512)->nullable();
            $table->string('last_school', 32)->nullable();
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
        Schema::dropIfExists('userchoices');
    }
}
