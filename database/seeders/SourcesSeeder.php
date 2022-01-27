<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        for($i=0; $i<10; $i++) {
            $data[] = [
                'name' => $faker->text(mt_rand(5,10)),
                'real_name' => $faker->text(mt_rand(5,10)),
                'site' => $faker->url(),
            ];
        }

        return $data;
    }
}
