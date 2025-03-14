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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('max_images');
            $table->string('tag')->nullable(); 
            $table->unsignedBigInteger('theme_category_id');
            $table->string('color')->nullable(); 
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
            $table->foreign('theme_category_id')->references('id')->on('theme_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};
