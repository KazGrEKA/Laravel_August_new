<?php declare(strict_types = 1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserService implements Parser
{
    public function getParsedList(string $url) : array
    {
        $xml = XmlParser::load($url);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        return $data;

    }

    public function storeParsedNews(int $categoryId) : bool
    {
        $url = Category::where('id', '=', $categoryId)->first()->news_source;

        $parsedData = $this->getParsedList($url);

        $newsList = $parsedData['news'];

        $uniqueTitles = true;

        foreach ($newsList as $news) {
            $data = [
                'category_id' => $categoryId,
                'title' => $news['title'],
                'description' => $news['description']
            ];
            $data['slug'] = Str::slug($data['title']);

            if (!News::where('title', $data['title'])->first()) {
                
                News::create($data);
                
            } else {

                $uniqueTitles = false;

            }
        }

        if ($uniqueTitles) {

            return true;

        } else {

            return false;
            
        }

    }

}