<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\favorite>
 */
class FavoriteFactory extends Factory
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
        return [
            'sender_id' => $user0, // 適切なランダムな値に置き換える
            'destination_user_id' => $user1, // 適切なランダムな値に置き換える
            'created_at' => now(),
            'updated_at' => now(),
            'deletion_date' => null,
        ];
    }
}
