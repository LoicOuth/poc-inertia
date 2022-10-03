<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['created', 'production', 'transit', 'finish']),
            'user_id' => $this->faker->numberBetween(2, User::count()),
            'created_at' => $this->faker->dateTimeThisYear()
        ];
    }
}
