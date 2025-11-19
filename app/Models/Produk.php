<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // (opsional, Laravel otomatis tahu kalau nama tabelnya "produks")
    protected $table = 'produks';
    

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama',
        'jenis_buket',
        'tema',
        'deskripsi',
        'harga',
        'foto',
    ];
    


    public function pesanan()
    {
        return $this->belongsToMany(Pesanan::class, 'detail_pesanans')
                    ->withPivot(['jumlah', 'subtotal'])
                    ->withTimestamps();
        
    }
    public function item_keranjang()
    {
        return $this->hasMany(item_keranjang::class);
    }

    public function detailPesanans()
{
    return $this->hasMany(Detail_pesanan::class);
}

    



}
