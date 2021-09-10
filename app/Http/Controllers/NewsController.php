<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index() {
        $categories = (new News())->getNewsCategories();
        return view('news.news', ['categories' => $categories]);
    }

    public function showList($category) {
        $list = (new News())->getNewsList($category);
        return view('news.newsByCategory', ['category' => $category,'list' => $list]);
    }

    public function showCard($id) {
        $news = (new News())->getCard($id);
        return view('news.newsCard', ['news' => $news]);
    }
}
