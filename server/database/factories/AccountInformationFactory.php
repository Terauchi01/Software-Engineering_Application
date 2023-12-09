<?php

namespace Database\Factories;

use App\Models\AccountInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\admin_information>
 */
class AccountInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_id' => $this->faker->numberBetween(1, 10), // 適切な範囲を設定
            'branch_id' => $this->faker->numberBetween(1, 20), // 適切な範囲を設定
            'account_type' => $this->faker->randomElement(['Savings', 'Checking']), // 任意の値を設定
            'account_number' => $this->faker->bankAccountNumber,
            'account_name' => $this->faker->name, // 修正: name フォーマットを使用
            'account_name_kana' => $this->faker->name, // 修正: 代わりに別のフォーマットを使用
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
