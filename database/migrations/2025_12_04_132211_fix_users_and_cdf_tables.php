<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // ------------------- Users table -------------------
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'is_admin')) {
                $table->boolean('is_admin')->default(0)->after('password');
            }
        });

        // ------------------- CDF Scholarships table -------------------
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            $columnsToDrop = [
                'national_id', 'student_phone', 'institution_name',
                'level_of_study', 'mode_of_study', 'year_of_study',
                'semester', 'course_duration'
            ];

            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('cdf_scholarships', $column)) {
                    $table->dropColumn($column);
                }
            }

            if (!Schema::hasColumn('cdf_scholarships', 'created_at')) {
                $table->timestamps();
            }
        });

        // ------------------- Scholarship Applications table -------------------
        Schema::table('scholarship_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('scholarship_applications', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down()
    {
        // Users table rollback
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_admin')) {
                $table->dropColumn('is_admin');
            }
        });

        // CDF Scholarships rollback (timestamps will be dropped if added)
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            if (Schema::hasColumn('cdf_scholarships', 'created_at') &&
                Schema::hasColumn('cdf_scholarships', 'updated_at')) {
                $table->dropTimestamps();
            }
        });

        // Scholarship Applications rollback (timestamps will be dropped if added)
        Schema::table('scholarship_applications', function (Blueprint $table) {
            if (Schema::hasColumn('scholarship_applications', 'created_at') &&
                Schema::hasColumn('scholarship_applications', 'updated_at')) {
                $table->dropTimestamps();
            }
        });
    }
};
