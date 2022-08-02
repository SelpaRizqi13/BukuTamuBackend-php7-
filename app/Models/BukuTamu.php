<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','no_token', 'jumlah_tamu', 'nama_tamu', 'alamat', 'nama_instansi', 'tanggal_kunjungan', 'sunrise', 'instansi_id', 'tujuan_pegawai', 'tujuan_kunjungan'
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $hidden = [
        'instansi_id',
    ];
}
