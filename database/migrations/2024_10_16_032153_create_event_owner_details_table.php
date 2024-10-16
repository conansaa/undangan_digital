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
        Schema::create('event_owner_details', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->text('parents_name')->nullable(); // Menggunakan TEXT untuk textarea
            $table->string('owner_photo')->nullable();
            $table->string('social_media')->nullable();
            $table->unsignedTinyInteger('gender_id');
            $table->timestamps();

            // Foreign key relation to gender table
            $table->foreign('gender_id')->references('id')->on('gender_ref')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_owner_details');
    }
};
