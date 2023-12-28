<?php

namespace Database\Factories;

use App\Models\CoopUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        $user0 = User::inRandomOrder()->first()->id;
        $user1 = User::inRandomOrder()->where('id', '!=', $user0)->first()->id;
        $coopuser0 = CoopUser::inRandomOrder()->first()->id;
        $coopuser1 = CoopUser::inRandomOrder()->where('id', '!=', $user0)->first()->id;
        $coopuser2 = CoopUser::inRandomOrder()->where('id', '!=', $user0)->where('id', '!=', $user1)->first()->id;
        return [
            'delivery_destination_id' => $user0,// 適切なランダムな値に置き換える
            'collection_company_id' => $user1, // 適切なランダムな値に置き換える
            'collection_company_id'=> $coopuser0,
            'intermediate_delivery_company_id' => $coopuser1,// 適切なランダムな値に置き換える
            'delivery_company_id' => $coopuser2, // 適切なランダムな値に置き換える
            'collection_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'intermediate_delivery_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'delivery_company_remuneration' => $this->faker->numberBetween(100, 1000),
            'delivery_status' => $this->faker->randomElement([1, 2, 3]), // 適切なランダムな値に置き換える
            'request_date' => $this->faker->dateTimeBetween('-30 days', '+30 days'),
            'delivery_date' => $this->faker->dateTimeBetween('+1 days', '+60 days'),
            // 他の属性に基づいて必要な項目を追加
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
