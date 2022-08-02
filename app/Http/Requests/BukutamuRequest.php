<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BukutamuRequest extends FormRequest
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
            'no_token' => 'required',
            'jumlah_tamu' => 'required',
            'nama_tamu' => 'required',
            'alamat' => 'required',
            'nama_instansi' => 'required',
            'tanggal_kunjungan' => 'required',
            'sunrise' => 'required',
            'tujuan_instansi' => 'required',
            'tujuan_pegawai' => 'required',
            'tujuan_kunjungan' => 'required',
        ];
    }
}
