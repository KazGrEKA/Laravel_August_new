<?php declare(strict_types = 1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\Category;
use App\Models\News;
use App\Models\Source;
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

    public function storeParsedNews(int $categoryId)
    {
        $url = Source::where('category_id', '=', $categoryId)->first()->url;

        $sourceId = Source::where('category_id', '=', $categoryId)->first()->id;

        $parsedData = $this->getParsedList($url);

        $newsList = $parsedData['news'];

        foreach ($newsList as $news) {
            
            $data = [
                'category_id' => $categoryId,
                'source_id' => $sourceId,
                'title' => $news['title'],
                'description' => $news['description']
            ];
            $data['slug'] = Str::slug($data['title']);

            if (!News::where('title', $data['title'])->first()) {
                
                News::create($data);
                
            }
            
        }

    }


    public function storeNewsInFile(string $url)
    {
        $parsedData = $this->getParsedList($url);
        $serialize = json_encode($parsedData);
        $explode = explode('/', $url);
        $fileName = end($explode);

        \Storage::append('/news/' . $fileName, $serialize);
    }

}