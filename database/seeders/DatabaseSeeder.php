<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\Toko;
use App\Models\Karyawan;
use App\Models\kasbon;
use App\Models\perizinan;
use App\Models\User;

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
        User::factory()->create([
            'nip' => '1',
            'name' => 'Rafli',
            'email' => '1@stis.ac.id',
            'password' => 111111, // Password harus di-hash
            'jabatan' => 'manajer',
        ]);

        User::factory()->create([
            'nip' => '2',
            'name' => 'Rafli',
            'email' => '2@stis.ac.id',
            'password' => 222222,
            'jabatan' => 'supervisor',
        ]);

        User::factory()->create([
            'nip' => '3',
            'name' => 'Rafli',
            'email' => '3@stis.ac.id',
            'password' => 333333,
            'jabatan' => 'karyawan',
        ]);
        Toko::factory(10)->create();


        // Buat 10 data pengguna
        $karyawans = Karyawan::factory(50)->create();

        // Tentukan rentang tanggal untuk presensi
        $startDate = '2024-05-01';
        $endDate =now();

        // Loop setiap pengguna
        $karyawans->each(function ($karyawan) use ($startDate, $endDate) {
            // Loop setiap hari dalam rentang tanggal
            $currentDate = $startDate;
            perizinan::factory(100)->create([
                'nip' => $karyawan->nip,
            ]);
            kasbon::factory(100)->create([
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
