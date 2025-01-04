<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CabangSupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nip' => '1002', 'toko_id' => 1], // Supervisor 1 membawahi toko 1
            ['nip' => '1002', 'toko_id' => 2], // Supervisor 1 membawahi toko 2
            ['nip' => '1006', 'toko_id' => 3], // Supervisor 2 membawahi toko 3
            ['nip' => '1006', 'toko_id' => 4], // Supervisor 2 membawahi toko 4
            ['nip' => '1008', 'toko_id' => 5], // Supervisor 3 membawahi toko 5
            ['nip' => '1008', 'toko_id' => 6], // Supervisor 3 membawahi toko 6
            ['nip' => '1012', 'toko_id' => 7], // Supervisor 4 membawahi toko 7
            ['nip' => '1012', 'toko_id' => 8], // Supervisor 4 membawahi toko 8
            ['nip' => '1020', 'toko_id' => 9], // Supervisor 5 membawahi toko 9
            ['nip' => '1020', 'toko_id' => 10], // Supervisor 5 membawahi toko 10
        ];

        DB::table('cabang_supervisor')->insert($data);
    }
}
