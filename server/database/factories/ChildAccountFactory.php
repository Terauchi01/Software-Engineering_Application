<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\child_account>
 */
class ChildAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'authority' => $this->faker->numberBetween(1, 5), // ユーザーの権限に適したランダムな値
            'user_name' => $this->faker->userName,
            'email_address' => $this->faker->email,
            'password' => Hash::make('password'), // ハッシュ化したデフォルトのパスワード
            // 他の属性に基づいて必要な項目を追加
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
