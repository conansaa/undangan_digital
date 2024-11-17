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
        Schema::table('event_owner_details', function (Blueprint $table) {
            $table->smallInteger('ordinal_child_number')->after('mothers_name')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_owner_details', function (Blueprint $table) {
            $table->dropColumn('ordinal_child_number');
        });
    }
};
