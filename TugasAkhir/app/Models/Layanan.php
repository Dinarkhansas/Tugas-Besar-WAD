<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable = ['kode_layanan', 'user_id', 'kontak', 'nama_layanan', 'deskripsi', 'harga_per_jam'];

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'layanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
