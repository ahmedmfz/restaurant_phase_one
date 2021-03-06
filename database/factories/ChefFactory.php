<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChefFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(2),
            'phone'=> rand(1,11),
            'adderss' => $this->faker->paragraph(3),
            'description' => $this->faker->paragraph(4),
        ];
    }
}
