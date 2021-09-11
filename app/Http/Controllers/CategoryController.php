<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // вывод всех категорий списком
    {
        return view('categories.index', [
            'categoriesList' => $this->getCategories()
        ]);
    }

    public function filter(int $id) // вывод всех новостей в конкретной категории
    {
        return view('categories.filter', [
            'id' => $id,
            'categoriesList' => $this->getCategories(),
            'newsList' => $this->getNews()
        ]);
    }
}
