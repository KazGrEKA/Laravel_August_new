<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    public function getData() : array
    {
        $faker = Factory::create();

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'category_id' => mt_rand(1, 10),
                'title' => $faker->sentence(2),
                'url' => $faker->url,
                'description' => $faker->text(250),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        return $data;

    }
}
