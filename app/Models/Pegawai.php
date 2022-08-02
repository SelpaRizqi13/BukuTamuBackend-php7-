<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pegawai', 'jabatan', 'instansi_id',
    ];
    public function instansi()
    {
        return $this->belongsTo(Instansi::class, 'instansi_id', 'id');
    }
    protected $hidden = [
        'instansi_id',
    ];
}
