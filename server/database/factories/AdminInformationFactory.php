<?php

namespace Database\Factories;
use App\Models\AdminInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminInformation>
 */
class AdminInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->company,
            'representative_name' => $this->faker->firstName,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'prefecture_id' => $this->faker->numberBetween(1, 47), // 1から47の間でランダムに選択
            'coop_scale' => $this->faker->sentence,
            'capital_stock' => $this->faker->numberBetween(100000, 10000000), // 100,000から10,000,000の間でランダムに選択
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null, // nullまたは適切なデフォルト値に置き換える
        ];
    }
}
