<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PesananFactory> */
    use HasFactory;
    protected $table = 'pesanan';
    protected $fillable =[
        'kode_pesanan',
        'harga',
        'nama_layanan',
        'layanan_id'

    ];

    public function relation ()
    {return
        $this->hasMany(Pembayaran::class, 'pesanan_id');
}
}
