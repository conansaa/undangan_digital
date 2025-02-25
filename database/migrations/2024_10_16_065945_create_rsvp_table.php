<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('name');
            $table->string('phone_number')->nullable(); //pakai string in case tamunya ada orang luar
            $table->string('confirmation', 11)->nullable();
            $table->integer('total_guest')->nullable();
            $table->integer('sending_track')->nullable();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('event_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rsvp');
    }
}
