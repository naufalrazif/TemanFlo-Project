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
        $table->foreignId('produk_id')->constrained('produks')->nullable()->onDelete('cascade');
        $table->dateTime('tanggal_pesanan')->useCurrent();
        $table->string('alamat');
        $table->string('delivery')->nullable();
        $table->text('custom');
        $table->enum('metode_pembayaran', ['COD', 'Transfer', 'E-Wallet']); // ?????
        $table->enum('status', ['dalam proses', 'selesai'])->default('dalam proses');
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
