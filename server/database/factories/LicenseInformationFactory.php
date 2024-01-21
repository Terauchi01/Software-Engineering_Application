<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
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
        $date_of_issue = $this->faker->dateTimeBetween('2022-12-05', today());
        return [
            'date_of_issue' => $date_of_issue,
            'date_of_registration' => $this->faker->dateTimeBetween($date_of_issue, today()),
            'name' => $this->faker->name,
            'birth' => $this->faker->dateTimeBetween('1900-01-01', Carbon::parse($date_of_issue)->subYears(16)),
            'conditions' => $this->faker->randomElement(['眼鏡等']),
            'classification' => $this->faker->randomElement(['一等','二等']),
            'ratings_and_limitations1' => $this->faker->randomElement(['飛行機','マルチ','ヘリ','昼間']),
            'ratings_and_limitations2' => $this->faker->randomElement(['昼間','夜間']),
            'ratings_and_limitations3' => $this->faker->randomElement(['目視内','25kg以下','無制限']),
            'number' => $this->faker->numberBetween(1000, 9999),
        ];
    }
}
