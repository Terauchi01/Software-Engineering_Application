<?php

namespace Database\Factories;

use App\Models\LentRequest;
use App\Models\User;
use App\Models\DroneType;
use Illuminate\Database\Eloquent\Factories\Factory;

class LentRequestFactory extends Factory
{
    protected $model = LentRequest::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // 適切な値に変更
            'drone_type_id' => DroneType::inRandomOrder()->first()->id, // 適切な値に変更
            'number' => $this->faker->randomNumber(100),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'deleted_date' => null,
        ];
    }
}
