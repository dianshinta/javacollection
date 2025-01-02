<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            //
            // $table->id();
            // $table->enum('status', ['Hadir', 'Terlambat', 'Tidak Hadir']);
            // $table->date('tanggal');
            // $table->time('waktu');
            // $table->string('toko', 50);
            // $table->string('nip', 20); 
            // $table->foreign('nip')->references('nip')->on('users')->onDelete('cascade');//menghubungkan nip dari DB kehadiran ke users

            // 'kasbon' => fake()->numberBetween(0, 1700000),
            // 'kehadiran' => fake()->numberBetween(26, 31),
            // 'izin' => fake()->numberBetween(0,2)

            'nip' => User::factory(),
            'status'=> fake()->randomElement($statusKehadiran),
            'tanggal' => fake()->dateTimeBetween('2025-01-01', '2025-01-31')->format('Y-m-d'),
            'waktu' => fake()->dateTimeBetween('2025-01-01 07:00:00', '2025-01-01 10:00:00')->format('H:i:s'),
            'toko' => fake()->randomElement($toko),
        ];
    }
}
