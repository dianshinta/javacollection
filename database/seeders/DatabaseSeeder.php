<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ChartSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);



        //seeders gaji jalankan di terminal pakai : php artisan db:seed
        // \App\Models\EmployerSalary::factory(20)->create(); 

        // \App\Models\User::factory(5)->create(); 
        // \App\Models\EmployerSalary::factory(5)->create([
        //     'user_nip' => function () {
        //         return \App\Models\User::inRandomOrder()->first()->nip;
        //     },
        // ]);

        //membuat data fake di tabel user
        \App\Models\User::factory(5)->create();

        //membuat data fake dari tabel user sekaligus tabel Gaji karyawan yang nip nya saling berkaitan
        // \App\Models\User::factory(5)->create()->each(function ($user) {
        //     \App\Models\EmployerSalary::factory()->create([
        //         'user_nip' => $user->nip,
        //     ]);
        // });
        
        // \App\Models\EmployerSalary::factory(5)->recycle(User::factory(5)->create())->create();

        //membuat data fake dari tabel kehadiran sekaligus tabel Gaji karyawan yang nip nya saling berkaitan
         \App\Models\Presensi::factory(30)->create([
            'nip' => function () {
                return User::inRandomOrder()->first()->nip;
            },
        ]);

    }
}
