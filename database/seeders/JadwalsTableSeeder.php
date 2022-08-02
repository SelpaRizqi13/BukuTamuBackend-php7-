<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JadwalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jadwals = [
            [
                'nama_kegiatan' => 'Seminar Cyber Security & Risk Management',
                'tanggal_kegiatan' => '2022-05-25',
                'image' => 'assets/upload/ja4AWKrW4gi7ipq5WQLwbC9DxinrLsicTTzuk6e1.jpg',
                'deskripsi' => 'Dalam rangka meningkatkan Awareness masyarakat terhadap Keamanan Data Digital. Indonesia Network Security Association (idNSA) bekerja sama dengan Cloudtech, Amiya dan NRI-Secure berinisiatif mengadakan sebuah seminar dengan tema “CYBER SECURITY AND RISK MANAGEMENT – MEASURES FOR PROTECTING YOUR DIGITAL ASSETS”',
            ],
        ];
        foreach ($jadwals as $jadwal) {
            Jadwal::create($jadwal);
        }
    }
}
