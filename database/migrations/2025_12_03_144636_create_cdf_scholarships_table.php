<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cdf_scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->string('application_year');
            $table->string('birth_cert');
            $table->string('full_name');
            $table->string('gender');
            $table->string('pwd')->nullable();

            $table->string('school_name');
            $table->string('admission_no');
            $table->string('address');

            $table->string('father_name');
            $table->string('father_id');
            $table->string('father_phone');

            $table->string('mother_name');
            $table->string('mother_id');
            $table->string('mother_phone');

            $table->string('birth_ward');
            $table->string('birth_location');
            $table->string('birth_sublocation');
            $table->string('birth_village')->nullable();

            $table->string('principal_name');
            $table->string('principal_letter');

            $table->string('status')->default('pending');
            $table->string('serial_number')->unique();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cdf_scholarships');
    }
};
