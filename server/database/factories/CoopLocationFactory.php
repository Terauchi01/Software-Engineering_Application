<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coop_location>
 */
class CoopLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'postal_code' => $this->faker->numerify('#######'),
            'prefecture_id' => $this->faker->numberBetween(1, 47), // 適切なランダムな値に置き換える
            'city_id' => $this->faker->numberBetween(1, 47), // 適切なランダムな値に置き換える
            'town' => $this->faker->numberBetween(1, 47), // 適切なランダムな値に置き換える
            'block' => $this->faker->numberBetween(1, 47), // 適切なランダムな値に置き換える
            'representative_last_name' => $this->faker->lastName,
            'representative_first_name' => $this->faker->firstName,
            'representative_last_name_kana' => $this->faker->lastName,
            'representative_first_name_kana' => $this->faker->firstName,
            'license_holder_last_name' => $this->faker->lastName,
            'license_holder_first_name' => $this->faker->firstName,
            'license_holder_last_name_kana' => $this->faker->lastName,
            'license_holder_first_name_kana' => $this->faker->firstName,
            'license_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            // 他の属性に基づいて必要な項目を追加
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
