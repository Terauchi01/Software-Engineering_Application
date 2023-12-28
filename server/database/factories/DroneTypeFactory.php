<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\drone_type>
 */
class DroneTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $number_of_drones = $this->faker->numberBetween(10,100);
        return [
            'name' => $this->faker->word, // 適切なランダムな値に置き換える
            'range' => $this->faker->numberBetween(10,100), // 適切なランダムな値に置き換える
            'loading_weight' => $this->faker->numberBetween(10,100), // 適切なランダムな値に置き換える
            'max_time' => $this->faker->numberBetween(10,100),
            'number_of_drones' => $number_of_drones,
            'lend_drones_sum'=> $this->faker->numberBetween(10,$number_of_drones),
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
