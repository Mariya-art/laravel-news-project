<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'feedback' => $this->faker->text(50),
            'phone' => $this->faker->phoneNumber(),
            'mail' => $this->faker->freeEmail(),
        ];
    }
}
