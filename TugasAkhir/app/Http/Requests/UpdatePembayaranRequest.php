<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'bukti_transfer' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ];
    }

    public function messages()
    {
        return [
            'bukti_transfer.image' => 'File yang diunggah harus berupa gambar.',
            'bukti_transfer.mimes' => 'Gambar harus dalam format jpeg, png, jpg, atau gif.',
            'bukti_transfer.max' => 'Ukuran gambar maksimal 2MB.',
        ];
    }
}
