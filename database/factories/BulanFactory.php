<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Bulan>
 */
class BulanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $monthYear = $this->faker->dateTimeBetween('-6 months', 'now');
        return [
            'bulan' => $monthYear->format('m'),
            'tahun' => $monthYear->format('Y'),
            'bulan_tahun' => $monthYear->format('F Y'),
        ];
    }
}
