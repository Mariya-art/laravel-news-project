<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i<5; $i++) {
            $data[] = [
                'name' => $faker->text(mt_rand(5,10)),
                'rus_name' => $faker->text(mt_rand(5,10)),
            ];
        }

        return $data;
    }
}
