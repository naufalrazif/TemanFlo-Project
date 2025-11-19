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
        Schema::create('pesanans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        
        $table->dateTime('tanggal_pesanan')->useCurrent();
        $table->string('alamat');
        $table->string('nama');
        $table->string('no_telp',15);
        $table->text('custom')->nullable();
        $table->string('metode_pembayaran');
        $table->string('status_pembayaran')->default('pending'); // status midtrans
        $table->string('midtrans_transaction_id')->nullable(); // transaction_id dari midtrans
        $table->enum('status', ['dalam proses', 'selesai','batal'])->default('dalam proses');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};