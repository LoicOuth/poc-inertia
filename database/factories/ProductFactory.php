<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numerify('Product ##'),
            'description' => $this->faker->paragraph(3),
            'price' => $this->faker->randomFloat(2, 0, 10000)
        ];
    }
}
