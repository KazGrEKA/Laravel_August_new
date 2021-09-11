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

    protected $news = [];

    protected function getNews() : array
    {
        $faker = Factory::create('ru_Ru');

        $categories = $this->getCategories();

        for ($i = 0; $i < 24; $i++) {

            $number = $i + 1;

            $this->news[] = [
                'title' => "Новость {$number}",
                'category_id' => array_rand($categories),
                'description' => $faker->text(200)
            ];

        }

        return $this->news;
    }


    protected function getCategories() : array
    {
        return [
            1 => 'Политика',
            2 => 'Общество',
            3 => 'Экономика',
            4 => 'Культура',
            5 => 'Технологии',
            6 => 'Спорт'
        ];
    }
}
