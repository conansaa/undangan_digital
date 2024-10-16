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
        Schema::create('event_report_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Foreign key untuk event_details
            $table->unsignedBigInteger('event_report_id'); // Foreign key untuk event_report
            $table->timestamps();

            // Relasi ke tabel event_details
            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
            // Relasi ke tabel event_report
            $table->foreign('event_report_id')->references('id')->on('event_reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_report_details');
    }
};
