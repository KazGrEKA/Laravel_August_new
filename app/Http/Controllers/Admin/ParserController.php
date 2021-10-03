<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;
use App\Jobs\NewsJob;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser)
    {
        $urls = [
            /* 'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
            'https://news.yandex.ru/martial_arts.rss',
            'https://news.yandex.ru/communal.rss',
            'https://news.yandex.ru/health.rss',
            'https://news.yandex.ru/games.rss',
            'https://news.yandex.ru/internet.rss',
            'https://news.yandex.ru/cyber_sport.rss',
            'https://news.yandex.ru/movies.rss' */

            'https://news.yandex.ru/cosmos.rss',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/fire.rss',
            'https://news.yandex.ru/championsleague.rss',
            'https://news.yandex.ru/music.rss',
            'https://news.yandex.ru/nhl.rss'
        ];

        foreach ($urls as $url) {
            dispatch(new NewsJob($url));
        }

        return "Данные успешно скачаны";
    }
    

    public function store(Request $request, Parser $parser, int $categoryId)
    {
        dispatch(new NewsJob($categoryId));

        return redirect()->route('admin.categories.filter', ['id' => $categoryId])
                ->with('success', __('message.admin.parse.success'));    
    }
}
