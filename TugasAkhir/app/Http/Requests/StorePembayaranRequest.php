<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'pesanan_id' => 'required|exists:pesanan,id',
            'kode_pembayaran' => 'required|string|max:12',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'bukti_transfer.required' => 'Bukti transfer harus diunggah.',
            'bukti_transfer.image' => 'File yang diunggah harus berupa gambar.',
            'bukti_transfer.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
            'bukti_transfer.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
