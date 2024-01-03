<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Cities;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email_address' => $this->faker->email,
            'password' => Hash::make('user'), 
            'postal_code' => $this->faker->numerify('#######'),
            'prefecture_id' => $this->faker->numberBetween(1, 47),
            'city_id' => function (array $attributes) {
                // 指定された prefecture_id に対応するランダムな city_id を取得
                $randomCity = Cities::where('prefecture_id', $attributes['prefecture_id'])
                    ->inRandomOrder()
                    ->first();
                return $randomCity ? $randomCity->id : null;
            },
            'town' => $this->faker->numberBetween(1, 47),
            'block' => $this->faker->numberBetween(1, 47),
            'phone_number' => $this->faker->numerify('###########'),
            'user_last_name' => $this->faker->lastName,
            'user_first_name' => $this->faker->firstName,
            'user_last_name_kana' => $this->faker->lastName,
            'user_first_name_kana' => $this->faker->firstName,
            'unpaid_charge' => $this->faker->numberBetween(1000, 100000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        // return [
        //     'name' => fake()->name(),
        //     'email' => fake()->unique()->safeEmail(),
        //     'email_verified_at' => now(),
        //     'password' => static::$password ??= Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
