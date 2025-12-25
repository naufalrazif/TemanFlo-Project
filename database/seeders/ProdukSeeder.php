<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::create([
            'nama' => 'Buket Bunga Mawar',
            'jenis_buket' => 'buket_bunga',
            'tema' => 'birthday',
            'deskripsi' => 'Buket bunga mawar merah untuk ulang tahun.',
            'harga' => 150000,
            'foto' => 'foto/bunga.jpg'
        ]);

        Produk::create([
            'nama' => 'Buket Snack Coklat',
            'jenis_buket' => 'buket_snack',
            'tema' => 'graduation',
            'deskripsi' => 'Buket snack berisi coklat dan permen.',
            'harga' => 75000,
            'foto' => 'foto/snack.jpg'
        ]);

        Produk::create([
            'nama' => 'Buket Boneka Beruang',
            'jenis_buket' => 'buket_boneka',
            'tema' => 'birthday',
            'deskripsi' => 'Buket boneka beruang lucu untuk hadiah special.',
            'harga' => 120000,
            'foto' => 'foto/boneka3.jpg'
        ]);

        Produk::create([
            'nama' => 'Buket Uang 100k',
            'jenis_buket' => 'buket_uang',
            'tema' => 'wedding',
            'deskripsi' => 'Buket uang elegan untuk momen pernikahan.',
            'harga' => 500000,
            'foto' => 'foto/uang.jpg'
        ]);
    }
}
