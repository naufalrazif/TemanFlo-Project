<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs'; // penting, karena tabel bukan 'keranjangs'

    protected $fillable = [
        'user_id',
    ];

    /**
     * Relasi: 1 user memiliki 1 keranjang
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: 1 keranjang memiliki banyak item (nanti kalau ada tabel item_keranjang)
     */
    public function itemKeranjang()
    {
        return $this->hasMany(item_keranjang::class);
    }
}
