<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel (opsional kalau nama jamak sesuai konvensi Laravel)
    protected $table = 'pesanans';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'user_id',
        'produk_id',
        'tanggal_pesanan',
        'alamat',
        'delivery',
        'custom',
        'metode_pembayaran',
        'status',
    ];

    /**
     * Relasi ke model User
     * Setiap pesanan dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke model Produk
     * Pesanan bisa memiliki satu produk (bisa null jika custom)
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
