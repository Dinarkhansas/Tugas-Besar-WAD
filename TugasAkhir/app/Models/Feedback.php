<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable =[
        'nama_layanan',
        'jenis_pembayaran',
        'deskripsi',
        'pembayaran_id'

    ];
}
