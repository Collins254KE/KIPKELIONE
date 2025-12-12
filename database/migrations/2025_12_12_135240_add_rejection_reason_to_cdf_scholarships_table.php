<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            $table->string('rejection_reason')->nullable()->after('award_amount');
        });
    }

    public function down()
    {
        Schema::table('cdf_scholarships', function (Blueprint $table) {
            $table->dropColumn('rejection_reason');
        });
    }
};
