<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'user_id' => User::inRandomOrder()->first()->id,
            'image_url' => $this->faker->imageUrl(200, 200), // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
