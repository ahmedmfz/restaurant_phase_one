<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

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
            'name'=> $this->faker->sentence(2),
            'price'=> rand(1,1000),
            'qty' => rand(1,50),
            'menu_id' => rand(1,10),
            'active' => false,
            'description' => $this->faker->paragraph(4),
        ];
    }
}
