<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_keranjang extends Model
{
    use HasFactory;

    protected $table = 'item_keranjangs';
    protected $fillable = ['keranjang_id', 'produk_id', 'jumlah'];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
