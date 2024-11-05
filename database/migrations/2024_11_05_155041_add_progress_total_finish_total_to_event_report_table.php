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
        Schema::table('event_reports', function (Blueprint $table) {
            $table->smallInteger('progress_total')->after('counter')->default(0);
            $table->smallInteger('finish_total')->after('progress_total')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_reports', function (Blueprint $table) {
            $table->dropColumn('progress_total');
            $table->dropColumn('finish_total');
        });
    }
};
