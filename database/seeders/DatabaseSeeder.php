<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\Toko;
use App\Models\Karyawan;
use App\Models\kasbon;
use App\Models\perizinan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(ChartSeeder::class);
        // $this->call(TokoSeeder::class);
        // $this->call(kar$karyawanSeeder::class);
        // $this->call(CabangSupervisorSeeder::class);
        // $this->call(KehadiranSeeder::class);

        // Buat data Toko
        Toko::factory(10)->create();

        // Buat 10 data pengguna
        $karyawans = Karyawan::factory(10)->create();

        // Tentukan rentang tanggal untuk presensi
        $startDate = '2025-01-01';
        $endDate = '2025-05-31';

        // Loop setiap pengguna
        $karyawans->each(function ($karyawan) use ($startDate, $endDate) {
            // Loop setiap hari dalam rentang tanggal
            $currentDate = $startDate;
            perizinan::factory(10)->create([
                'nip' => $karyawan->nip,
            ]);
            kasbon::factory(10)->create([
                'nip' => $karyawan->nip,
            ]);
            while ($currentDate <= $endDate) {
                // Buat presensi untuk setiap hari
                Presensi::factory()->create([
                    'nip' => $karyawan->nip, // Sesuaikan nip dengan pengguna
                    'tanggal' => $currentDate, // Tanggal presensi
                ]);
                // Pindah ke hari berikutnya
                $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
            }
        });
    }
}
