<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Menambahkan 'buket_custom' ke ENUM jenis_buket
        DB::statement("
            ALTER TABLE produks 
            MODIFY COLUMN jenis_buket 
            ENUM('buket_bunga', 'buket_snack', 'buket_boneka', 'buket_uang', 'buket_custom') NOT NULL
        ");
    }

    public function down(): void
    {
        // Mengembalikan ke enum lama jika rollback
        DB::statement("
            ALTER TABLE produks 
            MODIFY COLUMN jenis_buket 
            ENUM('buket_bunga', 'buket_snack', 'buket_boneka', 'buket_uang') NOT NULL
        ");
    }
};
