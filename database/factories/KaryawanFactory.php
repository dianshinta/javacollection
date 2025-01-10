<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Toko;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake()->unique()->numerify('KRY###'), // NIP unik dengan format KRY123
            'nama' => fake()->name(),
            'jabatan' => fake()->randomElement(['Manager', 'Supervisor', 'Staff', 'Karyawan']),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' => fake()->date('Y-m-d', '2000-01-01'), // Tanggal lahir sebelum tahun 2000
            'gender' => fake()->randomElement(['L', 'P']),
            'toko_id' => Toko::inRandomOrder()->value('id') ?: Toko::factory()->create()->id, // Mengambil atau membuat toko
            'alamat' => fake()->address(),
            'no_telp' => fake()->unique()->numerify('08##########'), // Nomor telepon unik
            'bank' => fake()->randomElement(['BCA', 'Mandiri', 'BNI', 'BRI']),
            'no_rek' => fake()->unique()->numerify('##########'), // Nomor rekening unik
            'kasbon' => fake()->randomFloat(2, 0, 5000000), // Kasbon antara 0 hingga 5 juta
            'gaji_pokok' => fake()->numberBetween(3000000, 7000000), // Gaji pokok antara 3 juta hingga 7 juta
        ];
    }
}
