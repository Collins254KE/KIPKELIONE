<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->string('application_year');       // current year
            $table->string('serial_number')->unique(); // unique serial
            $table->string('status')->default('pending');

            // Student details
            $table->string('full_name');
            $table->string('national_id');
            $table->string('gender');
            $table->string('pwd')->nullable();
            $table->string('student_phone');

            // Father details
            $table->string('father_name');
            $table->string('father_id');
            $table->string('father_phone');
            $table->string('father_occupation')->nullable();
            $table->string('father_email')->nullable();

            // Mother details
            $table->string('mother_name');
            $table->string('mother_id');
            $table->string('mother_phone');
            $table->string('mother_occupation')->nullable();
            $table->string('mother_email')->nullable();

            // Place of birth
            $table->string('birth_ward');
            $table->string('birth_location');
            $table->string('birth_sublocation');
            $table->string('birth_village')->nullable();

            // Institution
            $table->string('institution_name');
            $table->string('admission_no');
            $table->string('level_of_study');
            $table->string('mode_of_study');
            $table->integer('year_of_study');
            $table->integer('semester');
            $table->string('course_duration');

            $table->timestamps();

            // Foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
