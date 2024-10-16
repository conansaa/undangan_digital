<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('event_id'); 
            $table->unsignedBigInteger('section_id'); 
            $table->string('photo'); 
            $table->text('description')->nullable(); // Description (optional)
            $table->timestamps(); 

            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('section_ref')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery');
    }
}


