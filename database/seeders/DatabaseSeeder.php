<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Presensi;
use App\Models\EmployerSalary;

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

        // Membuat 10 data User
        $users = User::factory(10)->create();

        // Membuat 500 data Presensi dengan nip dari data User
        $users->each(function ($user) {
            Presensi::factory(200)->create([
                'nip' => function () {
                    return User::inRandomOrder()->first()->nip; // Nip diambil dari User
                },
            ]);
        });

        // Membuat data EmployerSalary dengan nip dari semua User
        $users->each(function ($user) {
            EmployerSalary::factory()->create([
                'user_nip' => $user->nip
            ]);
        });
    }
}
