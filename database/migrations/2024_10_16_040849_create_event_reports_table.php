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
        Schema::create('event_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_type_id'); // Foreign key untuk jenis acara
            $table->tinyInteger('month'); // Bulan (tiny integer)
            $table->year('year'); // Tahun
            $table->bigInteger('counter'); // Counter untuk laporan
            $table->timestamps();

            // Relasi ke tabel jenis acara
            $table->foreign('event_type_id')->references('id')->on('event_type_ref')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_reports');
    }
};
