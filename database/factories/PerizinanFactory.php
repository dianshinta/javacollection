<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Perizinan>
 */
class PerizinanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'tanggal' => fake()->dateTimeBetween('2025-01-01', '2025-05-31')->format('Y-m-d'),
            'jenis' => fake()->randomElement(['Sakit', 'Cuti', 'Lainnya']),
            'keterangan' => fake()->sentence(),
            'status' => fake()->randomElement(['Diproses', 'Disetujui', 'Ditolak']), 
        ];
    }
}