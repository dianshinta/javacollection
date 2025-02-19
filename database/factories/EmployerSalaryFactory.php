<?php

namespace Database\Factories;

use App\Models\Presensi;
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
            'kasbon' => fake()->numberBetween(0, 1700000),
            'izin' => fake()->numberBetween(0, 2)
        ];
    }
}
