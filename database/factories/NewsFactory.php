<?php declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->jobTitle();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => 'Draft',
            'description' => $this->faker->sentence(mt_rand(6,10)),
            'fulltext' => $this->faker->text(200),
        ];
    }
}
