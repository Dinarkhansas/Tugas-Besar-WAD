<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyediaLayanan extends Model
{
    
    use HasFactory;

    protected $table = 'penyedia_layanans';

    protected $fillable = [
        'username',
        'password',
        'id',
        'nama',
        'jenis_kelamin',
        'umur',
        'alamat',
        'kontak',
        'deskripsi',
        'jenis_layanan'
    ];
}
