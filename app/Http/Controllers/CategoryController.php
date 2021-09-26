<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() // вывод всех категорий списком
    {
        $categories = Category::paginate(10);
        
        return view('categories.index', [
            'categoryList' => $categories
        ]);
    }

    public function filter(int $id) // вывод всех новостей в конкретной категории
    {
        $category = Category::with('news')
            ->find($id);

        $news = $category->news()->paginate(10);

        return view('categories.filter', [
            'category' => $category,
            'newsList' => $news
        ]);
    }
}
