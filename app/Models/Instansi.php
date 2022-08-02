<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'instansi_id', 'id');
    }

    public function bukutamu()
    {
        return $this->hasMany(BukuTamu::class, 'instansi_id', 'id');
    }
}
