<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';
    protected $fillable = ['pesanan_id', 'review', 'rating'];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
