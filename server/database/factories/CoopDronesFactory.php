<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DroneType;
use App\Models\CoopUser;


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
            'drone_type_id' => DroneType::inRandomOrder()->first()->id, // 適切なランダムな値に置き換える
            'coop_user_id' => CoopUser::inRandomOrder()->first()->id, // 適切なランダムな値に置き換える
            'operating_time' => $this->faker->numberBetween(1, 3600), // 適切なランダムな値に置き換える
            'purchase_date' => $this->faker->dateTimeBetween('-1 year', 'now',), // 適切なランダムな値に置き換える
            'drone_status' => $this->faker->randomElement([0, 1]), // 適切なランダムな値に置き換える
            'possession_or_loan' => $this->faker->randomElement([0, 1]), // 適切なランダムな値に置き換える
            'lending_period' => $this->faker->dateTimeBetween('now', '+1 year'), // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
