<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
 */
class TokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tokos = [
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

        static $index = 0;

        return $tokos[$index++ % count($tokos)];
    }
}
