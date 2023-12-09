<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\delivery_location_image>
 */
class DeliveryLocationImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image_url' => $this->faker->imageUrl(200, 200), // 適切なランダムな値に置き換える
            'deletion_date' => $this->faker->optional(0.1, null)->dateTime, // 10% の確率で null
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
