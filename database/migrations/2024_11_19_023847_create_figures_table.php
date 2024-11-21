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
        Schema::create('figures', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('name');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('photo')->nullable();
            $table->string('social_media')->nullable();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('event_id');
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('gender_ref')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('figures');
    }
};
