<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            $table->integer('award_amount')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            $table->dropColumn('award_amount');
        });
    }
};
