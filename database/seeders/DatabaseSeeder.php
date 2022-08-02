<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		
		 $this->call([
            InstansisTableSeeder::class,
            PegawaisTableSeeder::class,
            UsersTableSeeder::class,
            BukuTamusTableSeeder::class,
            SurveisTableSeeder::class,
            JadwalsTableSeeder::class,

        ]);
    }
}
