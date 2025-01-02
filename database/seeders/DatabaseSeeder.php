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
        \App\Models\User::factory(5)->create()->each(function ($user) {
            \App\Models\EmployerSalary::factory()->create([
                'user_nip' => $user->nip,
            ]);
        });
        

        // \App\Models\EmployerSalary::factory(5)->recycle(User::factory(5)->create())->create();//menjalankan employer dan user factory sekaligus

    }
}
