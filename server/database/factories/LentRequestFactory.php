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
        $Dronetype = DroneType::whereRaw('number_of_drones - lend_drones_sum > 0')->inRandomOrder()->first();
        return [
            'user_id' => User::inRandomOrder()->first()->id, // 適切な値に変更
            'drone_type_id' => $Dronetype->id, // 適切な値に変更
            'number' => $this->faker->randomNumber(1,$Dronetype->number_of_drones - $Dronetype->lend_drones_sum),
            'state' => random_int(0, 1),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'deletion_date' => null,
        ];
    }
}
