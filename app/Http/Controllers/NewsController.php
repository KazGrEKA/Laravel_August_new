<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id', 'desc')
            ->with('category')
            ->paginate(10);

        return view('news.index', [
            'newsList' => $news
        ]);
    }

    public function show(int $id)
    {
        $news = News::with('category')
            ->find($id);

        return view('news.show', [
            'news' => $news
        ]);

    }
}
