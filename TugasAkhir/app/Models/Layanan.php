<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    /** @use HasFactory<\Database\Factories\LayananFactory> */
    use HasFactory;
    protected $table = 'layanan';
    protected $fillable =[
        'kode_layanan',
        'nama_pelayan',
        'kontak',
        'nama_layanan',
        'deskripsi'

    ];

    public function relation ()
    {return
        $this->hasMany(Pesanan::class, 'layanan_id');
}
}
