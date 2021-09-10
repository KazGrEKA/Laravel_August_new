<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getNews(): array
    {
        $faker = Factory::create('ru_RU');
        $data  = [];
        $countNumber = mt_rand(5,15);
        for($i=0; $i<$countNumber; $i++) {
            $data[] = [
                'id' => $i+1,
                'title' => $faker->jobTitle(),
                'description' => $faker->sentence(3),
                'author' => $faker->name(),
                'creation_date' => now()
            ];
        }
        return $data;
    }
}
