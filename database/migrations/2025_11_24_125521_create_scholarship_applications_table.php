<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('scholarship_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_year');
            $table->string('national_id');
            $table->string('full_name');
            $table->string('gender');
            $table->string('pwd')->nullable();
            $table->string('student_phone');
            $table->string('father_name');
            $table->string('father_id');
            $table->string('father_phone');
            $table->string('father_occupation')->nullable();
            $table->string('father_email')->nullable();
            $table->string('mother_name');
            $table->string('mother_id');
            $table->string('mother_phone');
            $table->string('mother_occupation')->nullable();
            $table->string('mother_email')->nullable();
            $table->string('birth_ward');
            $table->string('birth_location');
            $table->string('birth_sublocation');
            $table->string('birth_village')->nullable();
            $table->string('institution_name')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('level_of_study')->nullable();
            $table->string('mode_of_study')->nullable();
            $table->string('year_of_study')->nullable();
            $table->string('semester')->nullable();
            $table->string('course_duration')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('scholarship_applications');
    }
};
