<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable =[
        'kode_pembayaran',
        'nama_layanan',
        'jenis_pembayaran',
        'pesanan_id'

    ];

    public function relation ()
    {return
        $this->hasMany(Feedback::class, 'pembayaran_id');
}
}
