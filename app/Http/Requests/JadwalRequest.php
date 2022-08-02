<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class JadwalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'image' =>'image|file|max:1024',
            'deskripsi' => 'required',
        ];
    }
}
