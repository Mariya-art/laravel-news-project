<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SourceFactory extends Factory
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
            'real_name' => $this->faker->text(mt_rand(5,10)),
            'site' => $this->faker->url(),
        ];
    }
}
