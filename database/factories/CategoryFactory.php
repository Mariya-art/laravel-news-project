<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(mt_rand(5,10)),
            'rus_name' => $this->faker->text(mt_rand(5,10)),
        ];
    }
}
