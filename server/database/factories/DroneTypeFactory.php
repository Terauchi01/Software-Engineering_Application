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
        return [
            'name' => $this->faker->word, // 適切なランダムな値に置き換える
            'drone_spec' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'number_of_drones' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => $this->faker->optional(0.1, null)->dateTime, // 10% の確率で null
        ];
    }
}
