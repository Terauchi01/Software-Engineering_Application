<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coop_drones>
 */
class CoopDronesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'drone_type_id' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'coop_user_id' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'operating_time' => $this->faker->dateTimeThisYear, // 適切なランダムな値に置き換える
            'purchase_date' => $this->faker->dateTimeThisDecade, // 適切なランダムな値に置き換える
            'drone_status' => $this->faker->randomElement([1, 2, 3]), // 適切なランダムな値に置き換える
            'possession_or_loan' => $this->faker->randomElement([1, 2]), // 適切なランダムな値に置き換える
            'lending_period' => $this->faker->dateTimeThisYear, // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => $this->faker->optional(0.1, null)->dateTime, // 10% の確率で null
        ];
    }
}
