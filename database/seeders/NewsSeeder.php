<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i<20; $i++) {
            $title = $faker->sentence(mt_rand(3,8));
            $data[] = [
                'category_id' => $faker->numberBetween(1,5),
                'source_id' => $faker->numberBetween(1,10),
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->sentence(mt_rand(6,12)),
                'fulltext' => $faker->text(mt_rand(100,300)),
            ];
        }
        
        return $data;
    }
}
