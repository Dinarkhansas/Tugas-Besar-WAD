<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePesananRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Pastikan untuk mengizinkan semua pengguna
    }

    public function rules()
    {
        return [
            'sewa_jam' => 'required|integer|min:1', // Validasi untuk durasi sewa
            'layanan_id' => 'required|exists:layanan,id', // Validasi untuk ID layanan
        ];
    }
}
