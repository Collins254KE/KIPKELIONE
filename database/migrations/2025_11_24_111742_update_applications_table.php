<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            if (!Schema::hasColumn('applications', 'full_name')) {
                $table->string('full_name')->after('id');
            }
            if (!Schema::hasColumn('applications', 'national_id')) {
                $table->string('national_id')->after('full_name');
            }
            if (!Schema::hasColumn('applications', 'gender')) {
                $table->string('gender')->after('national_id');
            }
            if (!Schema::hasColumn('applications', 'pwd')) {
                $table->string('pwd')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('applications', 'student_phone')) {
                $table->string('student_phone')->after('pwd');
            }

            if (!Schema::hasColumn('applications', 'father_name')) {
                $table->string('father_name')->after('student_phone');
            }
            if (!Schema::hasColumn('applications', 'father_id')) {
                $table->string('father_id')->after('father_name');
            }
            if (!Schema::hasColumn('applications', 'father_phone')) {
                $table->string('father_phone')->after('father_id');
            }
            if (!Schema::hasColumn('applications', 'father_occupation')) {
                $table->string('father_occupation')->nullable()->after('father_phone');
            }
            if (!Schema::hasColumn('applications', 'father_email')) {
                $table->string('father_email')->nullable()->after('father_occupation');
            }

            if (!Schema::hasColumn('applications', 'mother_name')) {
                $table->string('mother_name')->after('father_email');
            }
            if (!Schema::hasColumn('applications', 'mother_id')) {
                $table->string('mother_id')->after('mother_name');
            }
            if (!Schema::hasColumn('applications', 'mother_phone')) {
                $table->string('mother_phone')->after('mother_id');
            }
            if (!Schema::hasColumn('applications', 'mother_occupation')) {
                $table->string('mother_occupation')->nullable()->after('mother_phone');
            }
            if (!Schema::hasColumn('applications', 'mother_email')) {
                $table->string('mother_email')->nullable()->after('mother_occupation');
            }

            if (!Schema::hasColumn('applications', 'birth_ward')) {
                $table->string('birth_ward')->after('mother_email');
            }
            if (!Schema::hasColumn('applications', 'birth_location')) {
                $table->string('birth_location')->after('birth_ward');
            }
            if (!Schema::hasColumn('applications', 'birth_sublocation')) {
                $table->string('birth_sublocation')->after('birth_location');
            }
            if (!Schema::hasColumn('applications', 'birth_village')) {
                $table->string('birth_village')->nullable()->after('birth_sublocation');
            }

            if (!Schema::hasColumn('applications', 'institution_name')) {
                $table->string('institution_name')->after('birth_village');
            }
            if (!Schema::hasColumn('applications', 'admission_no')) {
                $table->string('admission_no')->after('institution_name');
            }
            if (!Schema::hasColumn('applications', 'level_of_study')) {
                $table->string('level_of_study')->after('admission_no');
            }
            if (!Schema::hasColumn('applications', 'mode_of_study')) {
                $table->string('mode_of_study')->after('level_of_study');
            }
            if (!Schema::hasColumn('applications', 'year_of_study')) {
                $table->integer('year_of_study')->after('mode_of_study');
            }
            if (!Schema::hasColumn('applications', 'semester')) {
                $table->integer('semester')->after('year_of_study');
            }
            if (!Schema::hasColumn('applications', 'course_duration')) {
                $table->string('course_duration')->after('semester');
            }
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'full_name', 'national_id', 'gender', 'pwd', 'student_phone',
                'father_name', 'father_id', 'father_phone', 'father_occupation', 'father_email',
                'mother_name', 'mother_id', 'mother_phone', 'mother_occupation', 'mother_email',
                'birth_ward', 'birth_location', 'birth_sublocation', 'birth_village',
                'institution_name', 'admission_no', 'level_of_study', 'mode_of_study', 'year_of_study',
                'semester', 'course_duration'
            ]);
        });
    }
};
