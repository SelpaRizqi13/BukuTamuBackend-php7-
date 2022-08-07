<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'name' => 'Admin',
                'email' => '626037112871065237621121279928337',
                'roles' => 'admin',
                'password' => '$2y$10$b6SKHqec4a7Sp3Lrw.kGguxMwW6lQQ.0EbnzHpctqKkavz/Gf1feC',
            ],
            [
                'name' => 'SAdmin',
                'email' => '8994626037112871065237621121279928337',
                'roles' => 'super admin',
                'password' => '$2y$10$R/nJ.x9kqt68LoaP9YiY4eavLSjllaHccMRI2eiFO3AyzdDwJcWjW',
            ],
           
    ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
