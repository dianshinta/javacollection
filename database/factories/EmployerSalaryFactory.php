<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EmployerSalary;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmployerSalary>
 */
class EmployerSalaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake()->numberBetween(0, 1000),
            'nama' => fake()->name(),
            'jabatan' => fake()->sentence(1),
            'gaji_pokok' => fake()->numberBetween(1700000, 2500000),
            'kasbon' => fake()->numberBetween(0, 1700000),
            'kehadiran' => fake()->numberBetween(0, 31)



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
