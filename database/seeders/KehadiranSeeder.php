<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KehadiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['status' => 'Hadir', 'tanggal' => '2025-01-01', 'waktu' => '08:00:00', 'toko_id' => 1, 'nip' => '1002'],
            ['status' => 'Terlambat', 'tanggal' => '2025-01-02', 'waktu' => '08:15:00', 'toko_id' => 1, 'nip' => '1002'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-01', 'waktu' => '07:55:00', 'toko_id' => 2, 'nip' => '1006'],
            ['status' => 'Tidak Hadir', 'tanggal' => '2025-01-02', 'waktu' => '00:00:00', 'toko_id' => 2, 'nip' => '1006'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-03', 'waktu' => '08:05:00', 'toko_id' => 3, 'nip' => '1008'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-04', 'waktu' => '07:50:00', 'toko_id' => 3, 'nip' => '1008'],
            ['status' => 'Terlambat', 'tanggal' => '2025-01-05', 'waktu' => '08:10:00', 'toko_id' => 4, 'nip' => '1012'],
            ['status' => 'Tidak Hadir', 'tanggal' => '2025-01-06', 'waktu' => '00:00:00', 'toko_id' => 4, 'nip' => '1012'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-01', 'waktu' => '08:00:00', 'toko_id' => 5, 'nip' => '1020'],
            ['status' => 'Terlambat', 'tanggal' => '2025-01-02', 'waktu' => '08:20:00', 'toko_id' => 5, 'nip' => '1020'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-03', 'waktu' => '08:00:00', 'toko_id' => 6, 'nip' => '1002'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-04', 'waktu' => '07:55:00', 'toko_id' => 6, 'nip' => '1002'],
            ['status' => 'Tidak Hadir', 'tanggal' => '2025-01-05', 'waktu' => '00:00:00', 'toko_id' => 7, 'nip' => '1006'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-06', 'waktu' => '08:10:00', 'toko_id' => 7, 'nip' => '1006'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-07', 'waktu' => '08:00:00', 'toko_id' => 8, 'nip' => '1008'],
            ['status' => 'Terlambat', 'tanggal' => '2025-01-08', 'waktu' => '08:25:00', 'toko_id' => 8, 'nip' => '1008'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-09', 'waktu' => '07:50:00', 'toko_id' => 9, 'nip' => '1012'],
            ['status' => 'Tidak Hadir', 'tanggal' => '2025-01-10', 'waktu' => '00:00:00', 'toko_id' => 9, 'nip' => '1012'],
            ['status' => 'Hadir', 'tanggal' => '2025-01-11', 'waktu' => '08:10:00', 'toko_id' => 10, 'nip' => '1020'],
            ['status' => 'Terlambat', 'tanggal' => '2025-01-12', 'waktu' => '08:30:00', 'toko_id' => 10, 'nip' => '1020'],
            ['status' => 'Terlambat', 'tanggal' => '2024-12-31', 'waktu' => '08:30:00', 'toko_id' => 10, 'nip' => '1020'],
        ];

        DB::table('kehadiran')->insert($data);
    }
}
