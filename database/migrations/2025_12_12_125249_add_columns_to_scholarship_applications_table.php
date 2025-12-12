<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {
            // Student info
            $table->string('full_name')->nullable();
            $table->string('national_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('pwd')->nullable();
            $table->string('student_phone')->nullable();

            // Father info
            $table->string('father_name')->nullable();
            $table->string('father_id')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_email')->nullable();

            // Mother info
            $table->string('mother_name')->nullable();
            $table->string('mother_id')->nullable();
            $table->string('mother_phone')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_email')->nullable();

            // Birth info
            $table->string('birth_ward')->nullable();
            $table->string('birth_location')->nullable();
            $table->string('birth_sublocation')->nullable();
            $table->string('birth_village')->nullable();

            // Education info
            $table->string('institution_name')->nullable();
            $table->string('admission_no')->nullable();
            $table->string('level_of_study')->nullable();
            $table->string('mode_of_study')->nullable();
            $table->integer('year_of_study')->nullable();
            $table->integer('semester')->nullable();
            $table->string('course_duration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {
            // Drop the columns
            $table->dropColumn([
                'full_name', 'national_id', 'gender', 'pwd', 'student_phone',
                'father_name', 'father_id', 'father_phone', 'father_occupation', 'father_email',
                'mother_name', 'mother_id', 'mother_phone', 'mother_occupation', 'mother_email',
                'birth_ward', 'birth_location', 'birth_sublocation', 'birth_village',
                'institution_name', 'admission_no', 'level_of_study', 'mode_of_study',
                'year_of_study', 'semester', 'course_duration'
            ]);
        });
    }
};
