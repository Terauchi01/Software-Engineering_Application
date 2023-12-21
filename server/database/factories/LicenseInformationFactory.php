<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\license_information>
 */
class LicenseInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_of_issue' => $this->faker->dateTimeThisDecade,
            'date_of_registration' => $this->faker->dateTimeThisDecade,
            'name' => $this->faker->name,
            'birth' => $this->faker->dateTimeThisCentury,
            'condtions' => $this->faker->word,
            'classification' => $this->faker->word,
            'ratings_and_limitations1' => $this->faker->word,
            'ratings_and_limitations2' => $this->faker->word,
            'ratings_and_limitations3' => $this->faker->word,
            'number' => $this->faker->numberBetween(1000, 9999),
            // 他の属性に基づいて必要な項目を追加
        ];
    }
}
