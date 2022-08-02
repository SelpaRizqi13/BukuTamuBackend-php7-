<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BukuTamu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BukuTamusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku_tamus = [
            [
                'user_id' =>'1',
                'instansi_id' => '1',
                'no_token' => 'T-0001',
                'jumlah_tamu' => '6',
                'nama_tamu' => 'selpa',
                'alamat' => 'Kp. Sukasari RT.003 RW.014',
                'nama_instansi' => 'STTBandung',
                'tanggal_kunjungan' => '2022-05-25',
                'sunrise' => '13:51:00',
                'tujuan_pegawai' => 'rizqi',
                'tujuan_kunjungan' => 'Melakukan wawancara untuk kebutuhan tugas akhir',
                'status'=>'In progress'
            ],
            [
                'user_id' =>'2',
                'instansi_id' => '2',
                'no_token' => 'T-0002',
                'jumlah_tamu' => '6',
                'nama_tamu' => 'selpa',
                'alamat' => 'Kp. Sukasari RT.003 RW.014',
                'nama_instansi' => 'STTBandung',
                'tanggal_kunjungan' => '2022-05-25',
                'sunrise' => '13:51:00',
                'tujuan_pegawai' => 'rizqi',
                'tujuan_kunjungan' => 'Melakukan wawancara untuk kebutuhan tugas akhir',
                'status'=>'In progress'
            ],
            [
                'user_id' =>'3',
                'instansi_id' => '1',
                'no_token' => 'T-0003',
                'jumlah_tamu' => '6',
                'nama_tamu' => 'selpa',
                'alamat' => 'Kp. Sukasari RT.003 RW.014',
                'nama_instansi' => 'STTBandung',
                'tanggal_kunjungan' => '2022-05-25',
                'sunrise' => '13:51:00',
                'tujuan_pegawai' => 'rizqi',
                'tujuan_kunjungan' => 'Melakukan wawancara untuk kebutuhan tugas akhir',
                'status'=>'In progress'
            ],
            [
                'user_id' =>'1',
                'instansi_id' => '4',
                'no_token' => 'T-0004',
                'jumlah_tamu' => '6',
                'nama_tamu' => 'selpa',
                'alamat' => 'Kp. Sukasari RT.003 RW.014',
                'nama_instansi' => 'STTBandung',
                'tanggal_kunjungan' => '2022-05-25',
                'sunrise' => '13:51:00',
                'tujuan_pegawai' => 'rizqi',
                'tujuan_kunjungan' => 'Melakukan wawancara untuk kebutuhan tugas akhir',
                'status'=>'In progress'
            ],
            [
                'user_id' =>'2',
                'instansi_id' => '2',
                'no_token' => 'T-0005',
                'jumlah_tamu' => '6',
                'nama_tamu' => 'selpa',
                'alamat' => 'Kp. Sukasari RT.003 RW.014',
                'nama_instansi' => 'STTBandung',
                'tanggal_kunjungan' => '2022-05-25',
                'sunrise' => '13:51:00',
                'tujuan_pegawai' => 'rizqi',
                'tujuan_kunjungan' => 'Melakukan wawancara untuk kebutuhan tugas akhir',
                'status'=>'In progress'
            ],
        ];
        foreach ($buku_tamus as $buku_tamu) {
            BukuTamu::create($buku_tamu);
        }
    }
}
