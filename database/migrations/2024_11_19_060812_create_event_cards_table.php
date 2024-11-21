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
        Schema::create('event_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('event_name'); // Nama acara
            $table->date('event_date'); // Tanggal acara
            $table->time('event_time'); // Waktu acara
            $table->string('location'); // Tempat acara
            $table->string('full_location');
            $table->integer('quota'); // Kuota tamu
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_cards');
    }
};
