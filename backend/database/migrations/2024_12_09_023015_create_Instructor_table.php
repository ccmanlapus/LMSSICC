<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Instructor', function (Blueprint $table) {
            $table->integer('InstID', true);
            $table->unsignedBigInteger('role_id')->nullable()->index('users_role_id_foreign');
            $table->string('fullname', 200)->nullable();
            $table->string('designation', 200)->nullable();
            $table->string('course_handled', 200);
            $table->string('pass', 200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Instructor');
    }
}
