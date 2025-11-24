<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produk::create([
            'nama' => 'Buket Mawar Merah',
            'jenis_buket' => 'buket_bunga',
            'tema' => 'birthday',
            'deskripsi' => 'Buket mawar merah untuk hadiah spesial.',
            'harga' => 150000,
            'foto' => 'foto/mawar merah.png',

        ]);
    }
}
