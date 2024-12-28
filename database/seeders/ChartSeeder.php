<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample data into the `chart` table
        DB::table('chart')->insert([
            [
                'day' => Carbon::now()->format('Y-m-d'),
                'idtoko' => 'Cabang A',
                'hadir' => 10,
                'izin' => 2,
                'terlambat' => 1,
                'tanpaketerangan' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'day' => Carbon::now()->subDay()->format('Y-m-d'),
                'idtoko' => 'Cabang B',
                'hadir' => 8,
                'izin' => 1,
                'terlambat' => 0,
                'tanpaketerangan' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'day' => Carbon::now()->subDays(2)->format('Y-m-d'),
                'idtoko' => 'Cabang C',
                'hadir' => 12,
                'izin' => 0,
                'terlambat' => 2,
                'tanpaketerangan' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
