<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\kasbon>
 */
class KasbonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_pengajuan'=> fake()->dateTimeBetween('2025-01-01', now())->format('Y-m-d'),
            'status_kasbon' => fake()->randomElement(['Lunas', 'Belum Lunas']),
            'status_bayar' => fake()->randomElement(['Diproses', 'Disetujui', 'Ditolak']),
            'keterangan' => fake()->randomElement(['Pengajuan', 'Pembayaran']),
            'saldo_akhir' => fake()->numberBetween(0, 1000000),
        ];
    }
}
