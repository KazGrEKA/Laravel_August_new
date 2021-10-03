<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;

class ParserController extends Controller
{
    // public function __invoke(Request $request, Parser $parser)
    // {
    //     dd($parser->getParsedList('https://news.yandex.ru/sport.rss')['news']); //category->source
    // }
    public function store(Request $request, Parser $parser, int $categoryId)
    {
        $lastNews = $parser->storeParsedNews($categoryId);

        if ($lastNews) {
            return redirect()->route('admin.categories.filter', ['id' => $categoryId])
                ->with('success', __('message.admin.parse.success'));
        } else {
            return back()->with('error', __('message.admin.parse.error'));
        }

        
    }
}
