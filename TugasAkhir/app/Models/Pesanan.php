<?php

namespace App\Models;

use App\Models\User;
use App\Models\Layanan;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PesananFactory> */
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable = ['kode_pesanan', 'sewa_jam', 'layanan_id', 'user_id'];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
}
