<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToInstructorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Update the existing 'instructor' table
        Schema::table('instructor', function (Blueprint $table) {
            if (!Schema::hasColumn('instructor', 'role_id')) {
                $table->unsignedBigInteger('role_id')->nullable()->index();
            }

            if (!Schema::hasColumn('instructor', 'fullname')) {
                $table->string('fullname', 200)->nullable();
            }

            if (!Schema::hasColumn('instructor', 'designation')) {
                $table->string('designation', 200)->nullable();
            }

            if (!Schema::hasColumn('instructor', 'course_handled')) {
                $table->string('course_handled', 200);
            }

            if (!Schema::hasColumn('instructor', 'pass')) {
                $table->string('pass', 200);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instructor', function (Blueprint $table) {
            $table->dropColumn(['role_id', 'fullname', 'designation', 'course_handled', 'pass']);
        });
    }
}
