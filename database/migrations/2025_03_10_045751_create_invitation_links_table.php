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
        Schema::create('invitation_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('figure_id'); // Relasi ke figures
            $table->string('link')->unique(); // Link undangan
            $table->decimal('total_payment', 10, 2); // Total tagihan
            $table->enum('payment_status', ['pending', 'paid'])->default('pending'); // Status pembayaran
            $table->timestamp('activated_at')->nullable(); // Waktu aktivasi link setelah pembayaran
            $table->timestamp('expires_at')->nullable(); // Waktu kedaluwarsa link
            $table->timestamps();

            $table->foreign('figure_id')->references('id')->on('figures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_links');
    }
};
