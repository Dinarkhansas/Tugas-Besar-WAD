<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLayananRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'kode_layanan' => 'required|string|max:255',
            'nama_pelayan' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga_per_jam' => 'required|numeric|min:0', // Validasi untuk harga_per_jam
        ];
    }

    public function messages()
    {
        return [
            'harga_per_jam.required' => 'Harga per jam harus diisi.',
            'harga_per_jam.numeric' => 'Harga per jam harus berupa angka.',
            'harga_per_jam.min' => 'Harga per jam tidak boleh kurang dari 0.',
        ];
    }
}
