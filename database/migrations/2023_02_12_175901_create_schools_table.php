<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('Sigle')->unique();
            $table->string('Pays');
            $table->string('Universite');
            $table->float('IELTSMin')->nullable();
            $table->float('IELTSMax')->nullable();
            $table->float('Writing')->nullable();
            $table->float('Reading')->nullable();
            $table->float('Listening')->nullable();
            $table->float('Speaking')->nullable();
            $table->float('Moyenne')->nullable();
            $table->integer('Places')->nullable();
            $table->string('Management')->nullable();
            $table->string('Stage')->nullable();
            $table->string('Espagnol')->nullable();
            $table->string('Flag')->nullable();
            $table->integer('NombreEtudiants')->nullable()->default(0);
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
        Schema::dropIfExists('schools');
    }
}
