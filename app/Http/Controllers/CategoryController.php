<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // вывод всех категорий списком
    {
        $categories = Category::all();
        
        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }

    public function filter(int $id) // вывод всех новостей в конкретной категории
    {
        $category = Category::with('news')
            ->find($id);

        return view('categories.filter', [
            'category' => $category
        ]);
    }
}
