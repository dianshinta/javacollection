<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Cabang A', 'latitude' => '-6.200000', 'longitude' => '106.816666'],
            ['name' => 'Cabang B', 'latitude' => '-7.250445', 'longitude' => '112.768845'],
            ['name' => 'Cabang C', 'latitude' => '-6.914744', 'longitude' => '107.609810'],
            ['name' => 'Cabang D', 'latitude' => '-8.409518', 'longitude' => '115.188919'],
            ['name' => 'Cabang E', 'latitude' => '-0.789275', 'longitude' => '113.921327'],
            ['name' => 'Cabang F', 'latitude' => '-7.797068', 'longitude' => '110.370529'],
            ['name' => 'Cabang G', 'latitude' => '-5.147665', 'longitude' => '119.432732'],
            ['name' => 'Cabang H', 'latitude' => '-3.334656', 'longitude' => '135.480026'],
            ['name' => 'Cabang I', 'latitude' => '1.482180', 'longitude' => '124.848965'],
            ['name' => 'Cabang J', 'latitude' => '-2.548926', 'longitude' => '118.014863'],
        ];

        DB::table('toko')->insert($data);
    }
}
