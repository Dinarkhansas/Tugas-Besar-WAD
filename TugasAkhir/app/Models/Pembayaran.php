<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    /** @use HasFactory<\Database\Factories\PembayaranFactory> */
    use HasFactory;
    protected $table = 'pembayaran';
    protected $fillable = ['kode_pembayaran', 'bukti_transfer', 'status', 'pesanan_id'];

    public function relation()
    {
        return $this->hasMany(Feedback::class, 'pembayaran_id');
    }
    
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
