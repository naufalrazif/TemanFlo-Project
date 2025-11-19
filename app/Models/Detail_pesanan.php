<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail_pesanan extends Model
{
     protected $table = 'detail_pesanans';

    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'jumlah',
        'subtotal',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
