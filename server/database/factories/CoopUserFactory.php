<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\coop_user>
 */
class CoopUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email_address' => $this->faker->email,
            'password' => Hash::make('password'), // ハッシュ化したデフォルトのパスワード
            'coop_name' => $this->faker->company,
            'representative_last_name' => $this->faker->lastName,
            'representative_first_name' => $this->faker->firstName,
            'representative_last_name_kana' => $this->faker->Name,
            'representative_first_name_kana' => $this->faker->Name,
            'license_information_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'account_information_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'bank_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'branch_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'account_type' => $this->faker->randomElement(['Savings', 'Checking']),
            'account_number' => $this->faker->bankAccountNumber,
            'account_name' => $this->faker->name,
            'coop_locations_list_id' => $this->faker->numberBetween(1, 47), // 適切なランダムな値に置き換える
            'employees' => $this->faker->numberBetween(1, 100),
            'phone_number' => $this->faker->numerify('###########'),
            'land_or_air' => $this->faker->randomElement([1, 2]), // 適切なランダムな値に置き換える
            'application_status' => $this->faker->randomElement([1, 2, 3]), // 適切なランダムな値に置き換える
            'drone_list_id' => $this->faker->numberBetween(1, 100), // 適切なランダムな値に置き換える
            'amount_of_compensation' => $this->faker->numberBetween(10000, 1000000),
            // 他の属性に基づいて必要な項目を追加
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
