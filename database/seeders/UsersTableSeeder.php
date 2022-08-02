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
                'email' => 'admin@gmail.com',
                'roles' => 'admin',
                'password' => 'password',
            ],
            [
                'name' => 'SAdmin',
                'email' => 'sadmin@gmail.com',
                'roles' => 'super admin',
                'password' => 'password',
            ],
            [
            'name' => 'Selpa',
            'email' => 'sela@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'Rizqi',
            'email' => 'sel@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'senja',
            'email' => 'se@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'arsila',
            'email' => 'elpa@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'zahra',
            'email' => 'lpa@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'farkhana',
            'email' => 's@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ],
        [
            'name' => 'arsi',
            'email' => 'e@gmail.com',
            'roles' => 'user',
            'password' => 'password',
        ]
    ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
