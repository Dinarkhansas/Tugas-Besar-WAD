<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePesananRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'additional_sewa_jam' => 'required|integer|min:1', 
        ];
    }

    public function messages()
    {
        return [
            'additional_sewa_jam.required' => 'Tambahkan durasi sewa harus diisi.',
            'additional_sewa_jam.integer' => 'Tambahkan durasi sewa harus berupa angka.',
            'additional_sewa_jam.min' => 'Tambahkan durasi sewa minimal 1 jam.',
        ];
    }
}
