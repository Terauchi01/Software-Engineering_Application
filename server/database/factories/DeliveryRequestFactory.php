<?php

namespace Database\Factories;
use App\Models\DeliveryRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\delivery_request>
 */
class DeliveryRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'delivery_destination_id' => $this->faker->numberBetween(1, 100),// 適切なランダムな値に置き換える
            'collection_company_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'intermediate_delivery_company_id' => $this->faker->numberBetween(1, 100),// 適切なランダムな値に置き換える
            'delivery_company_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'collection_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'intermediate_delivery_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'delivery_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'delivery_status' => $this->faker->randomElement([1, 2, 3]), // 適切なランダムな値に置き換える
            'request_date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'delivery_date' => $this->faker->dateTimeBetween('+1 days', '+60 days'),
            // 他の属性に基づいて必要な項目を追加
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
