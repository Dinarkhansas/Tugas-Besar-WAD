<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    /** @use HasFactory<\Database\Factories\PemesananFactory> */
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'id',
        'jenis_layanan',
        'harga',
        'id_penyedia_layanan'
    ];


    public function penyedia_layanan()
    {
        return $this->belongsTo(penyediaLayanan::class);
    }
}

