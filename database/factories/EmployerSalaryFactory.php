<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployerSalary>
 */
class EmployerSalaryFactory extends Factory
{
    //cara buat model factory, ketikkan di terminal : php artisan make:factory
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_nip' => User::factory(),
            'kasbon' => fake()->numberBetween(0, 1700000),
            'kehadiran' => fake()->numberBetween(0, 31),
            'izin' => fake()->numberBetween(0,2)



            // $table->id(); // Primary key
            // $table->integer('nip')->unique();
            // $table->string('nama');
            // $table->string('jabatan');
            // $table->integer('gaji_pokok');
            // $table->integer('kasbon');  
            // $table->integer('denda')->default(0); // Denda
            // $table->integer('kehadiran'); // count kehadiran
            // $table->integer('total_gaji')->nullable(); // Gaji akhir setelah perhitungan
            // $table->timestamps();
        ];
    }
}
