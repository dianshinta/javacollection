<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Toko;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\presensi>
 */
class presensiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusKehadiran = ['hadir', 'terlambat', 'tidak hadir'];
        $toko = ['A', 'B', 'C', 'D'];
        return [
            //'nip' => User::inRandomOrder()->value('nip'),
            'status' => fake()->randomElement($statusKehadiran),
            'tanggal' => fake()->dateTimeBetween('2024-05-01', '2025-01-31')->format('Y-m-d'),
            'waktu' => fake()->time('H:i:s', '10:00:00'),
            'toko_id' => Toko::inRandomOrder()->value('id') ?: Toko::factory()->create()->id, // Ambil atau buat data toko
        ];
    }
}
