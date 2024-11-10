<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogRsvpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_rsvp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rsvp_id');
            $table->unsignedBigInteger('event_id')->nullable();
            $table->string('name', 255)->nullable();
            $table->string('phone_number', 255)->nullable();
            $table->string('confirmation', 11)->nullable();
            $table->integer('total_guest')->nullable();
            $table->string('action', 50);

            $table->timestamps();

            $table->foreign('rsvp_id')->references('id')->on('rsvp')->onDelete('cascade');
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
        Schema::dropIfExists('log_rsvp');
    }
}

