<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;

class PegawaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawais =
        [
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Riki Rikardo,SE',
                'jabatan' => 'Pengadministrasi Umum',
                
            ],
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Dra.Ratna Ningrum',
                'jabatan' => 'Pengelola Program dan Kegiatan',
                
            ],
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Entih Siti Masitoh,SE.MAk',
                'jabatan' => 'Penyusun Program Anggaran dan Pelaporan',
                
            ],
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Drs.Edi Ubaidillah',
                'jabatan' => 'Kepala Sub Bagian Program',
                
            ],
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Dra.Ratna Ningrum',
                'jabatan' => 'Pengelola Program dan Kegiatan',
                
            ],
            [
                'instansi_id' => '1',
                'nama_pegawai' => 'Rohati',
                'jabatan' => 'Analis SDM Aparatur',
                
            ],
            
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Mulyana,S.E.',
                'jabatan' => 'Kepala Bidang Perencanaan, Evaluasi dan Pengembangan Sumber Daya Teknologi Informasi dan Komunikasi',
                
            ],
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Arief Mujahidillah,S.Si, MT',
                'jabatan' => 'Kepala Seksi Perencanaan Kebijakan Teknologi Informasi dan Komunikasi',
                
            ],
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Ganjar Setya Pribadi,SE',
                'jabatan' => 'Kepala Seksi Evaluasi Teknologi Informasi dan Komunikasi',
                
            ],
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Yully Yuliana,S.Sos, M.Si',
                'jabatan' => 'Pengelola Teknologi Informasi',
                
            ],
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Yadi Setiadi',
                'jabatan' => 'Penyusun Data dan Informasi',
                
            ],
            [
                'instansi_id' => '2',
                'nama_pegawai' => 'Agus Nurwahid,S.Kom',
                'jabatan' => 'Analis Pemanfaatan teknologi',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Indra Arief Budyana,Sm.Hk.',
                'jabatan' => 'Kepala Seksi Infrastruktur Teknologi Informasi dan Komunikasi untuk Publik',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Amiril Mu`minin,ST.',
                'jabatan' => 'Kepala Seksi Interkoneksi dan Jaringan',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Farid Muhri Prawira,S.Sos',
                'jabatan' => 'Pengelola Sistem dan Jaringan',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Septian Dwijayanto,S.Kom',
                'jabatan' => 'Pranata Komputer Muda',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Furqon Hanafi,S.Si., MM.',
                'jabatan' => 'Kepala Seksi Manajemen Perangkat Keras Teknologi Informasi dan Komunikasi',
                
            ],
            [
                'instansi_id' => '3',
                'nama_pegawai' => 'Zoraya Pahlevi,S.Ikom',
                'jabatan' => 'Penyusun Data dan Informasi',
                
            ],
            
            [
                'instansi_id' => '4',
                'nama_pegawai' => 'Rina Karlina,S.Si',
                'jabatan' => 'Kepala Bidang Data dan Statistiik',
                
            ],
            [
                'instansi_id' => '4',
                'nama_pegawai' => 'Budhy Aditya Hadie,SE., MT',
                'jabatan' => 'Kepala Seksi Survey dan Akuisisi Data',
                
            ],
            [
                'instansi_id' => '4',
                'nama_pegawai' => 'Eka Tita Cahyati,S.Si',
                'jabatan' => 'Kepala Seksi Pengolahan dan Analisa Data',
                
            ],
            [
                'instansi_id' => '4',
                'nama_pegawai' => 'Ine Agustina,S.Si., M. AP',
                'jabatan' => 'Kepala Seksi Publikasi dan Data Terbuka',
                
            ],
            [
                'instansi_id' => '4',
                'nama_pegawai' => 'Musliman Somantri,S.Si.',
                'jabatan' => 'Calon Statistisi',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Ayi Mamat Rochmat,S.IP, MM.',
                'jabatan' => 'Kepala Bidang Persandian dan Aplikasi Informatika',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Yatna Mulyana,S.Kom',
                'jabatan' => 'Pranata Komputer Muda',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Lilis Yuanti',
                'jabatan' => 'Penyusun Data dan Informasi',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Sukirman',
                'jabatan' => 'Pengelola Jaringan',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Riza Riswanto,A.Md.',
                'jabatan' => 'Analis Pemanfaatan teknologi',
                
            ],
            [
                'instansi_id' => '5',
                'nama_pegawai' => 'Firman Nugraha S.Ip',
                'jabatan' => 'Kepala Seksi Persandian dan Keamanan Sistem Informasi',
                
            ],

        ];
        foreach ($pegawais as $pegawai){
            Pegawai::create($pegawai);
        }
    }
}
