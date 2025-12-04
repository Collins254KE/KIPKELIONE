<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {
            
            if (!Schema::hasColumn('scholarship_applications', 'serial_number')) {
                $table->string('serial_number')->unique()->after('application_year');
            }

            if (!Schema::hasColumn('scholarship_applications', 'status')) {
                $table->string('status')->default('pending')->after('serial_number');
            }
        });
    }

    public function down()
    {
        Schema::table('scholarship_applications', function (Blueprint $table) {

            if (Schema::hasColumn('scholarship_applications', 'serial_number')) {
                $table->dropColumn('serial_number');
            }

            if (Schema::hasColumn('scholarship_applications', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
