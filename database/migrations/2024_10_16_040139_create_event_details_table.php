<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key untuk user
            $table->string('event_name'); // Nama acara
            $table->unsignedBigInteger('event_type_id'); // Foreign key untuk jenis acara (event_type_ref)
            $table->date('event_date'); // Tanggal acara
            $table->time('event_time'); // Waktu acara
            $table->string('location'); // Tempat acara
            $table->string('full_location');
            $table->integer('quota'); // Kuota tamu
            $table->timestamps();

            // Relasi ke tabel user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Relasi ke tabel event_type_ref
            $table->foreign('event_type_id')->references('id')->on('event_type_ref')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_details');
    }
};
