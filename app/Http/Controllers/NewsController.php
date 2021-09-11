<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index', [
            'newsList' => $this->getNews(),
            'categoriesList' => $this->getCategories()
        ]);
    }

    public function show(int $id)
    {

        $news = $this->getNews(); // все новости

        $categories = $this->getCategories(); // все категории

        $thisNews = $news[$id - 1]; // данная новость

        $categoryId = $thisNews['category_id']; // id категории данной новости

        $category = $categories[$categoryId]; // название категории, согласно её индексу (id)

        return view('news.show', [
            'news' => $thisNews,
            'category' => $category,
            'categoryId' => $categoryId
        ]);

    }
}
