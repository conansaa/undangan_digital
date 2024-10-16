<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id'); // Foreign key untuk event_details
            $table->string('title'); // Judul timeline (varchar)
            $table->date('date'); // Tanggal peristiwa
            $table->text('description'); // Deskripsi peristiwa (textarea)
            $table->string('photo')->nullable(); // Foto terkait peristiwa (nullable)
            $table->timestamps();

            // Relasi ke tabel event_details
            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timelines');
    }
};
