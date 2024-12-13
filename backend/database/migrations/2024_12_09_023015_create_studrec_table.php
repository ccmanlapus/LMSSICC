<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudrecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studrec', function (Blueprint $table) {
            $table->string('studID', 200)->primary();
            $table->string('lname', 200)->nullable();
            $table->string('fname', 200)->nullable();
            $table->string('mname', 200)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('cnumber', 200)->nullable();
            $table->integer('courseID')->nullable();
            $table->string('yrStanding', 200)->nullable();
            $table->string('email', 200)->nullable()->default('-');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studrec');
    }
}
