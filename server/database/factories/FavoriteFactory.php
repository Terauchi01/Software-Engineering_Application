<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\favorite>
 */
class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sender_id' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'destination_user_id' => $this->faker->randomNumber(), // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => $this->faker->optional(0.1, null)->dateTime, // 10% の確率で null
        ];
    }
}
