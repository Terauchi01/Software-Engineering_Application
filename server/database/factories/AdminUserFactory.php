<?php

namespace Database\Factories;
use App\Models\AdminUser;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdminUser>
 */
class AdminUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name' => $this->faker->userName,
            'password' => Hash::make($this->faker->password(8)), // ハッシュ化したランダムなパスワード
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
