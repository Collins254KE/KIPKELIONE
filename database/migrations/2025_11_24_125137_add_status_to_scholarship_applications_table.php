<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Ensure the table exists before altering
        if (Schema::hasTable('scholarship_applications')) {
            Schema::table('scholarship_applications', function (Blueprint $table) {
                $table->string('status')->default('Pending'); // Add status column
            });
        } else {
            // Table doesn't exist, create it with the status column
            Schema::create('scholarship_applications', function (Blueprint $table) {
                $table->id();
                $table->string('status')->default('Pending');
                $table->timestamps();
                // Add other necessary fields here
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('scholarship_applications')) {
            Schema::table('scholarship_applications', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
