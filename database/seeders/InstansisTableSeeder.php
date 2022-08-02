<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Instansi;

class InstansisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $instansis = [
            [
                'nama_instansi' => 'Sekretariat',
                'lantai' => 'lantai 1',
            ],
            [
                'nama_instansi' => 'Bidang Perencanaan, Evaluasi dan Pengembangan Sumberdaya Teknologi Informasi dan Komunikasi',
                'lantai' => 'lantai 2',
            ],
            [
                'nama_instansi' => 'Bidang Infrastruktur Teknologi Informasi dan Komunikasi',
                'lantai' => 'lantai 1',
            
            ],
            [
                'nama_instansi' => 'Bidang Data dan Statistik',
                'lantai' => 'lantai 2',
            ],
            [
                'nama_instansi' => 'Bidang Persandian dan Aplikasi Informatika',
                'lantai' => 'lantai 3',
            ],
            [
                'nama_instansi' => 'Bidang Diseminasi Informasi',
                'lantai' => 'lantai 1',
            ],
            [
                'nama_instansi' => 'Unit Pelaksana Teknis Pusat Manajemen Informasi Pemerintahan',
                'lantai' => 'lantai 2',
            ],
            [
                'nama_instansi' => 'Unit Pelaksana Teknis Radio Sonata',
                'lantai' => 'lantai 3',
            ],
        ];
        foreach ($instansis as $instansi) {
            Instansi::create($instansi);
        }
    }
}
