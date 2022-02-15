<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravie\Parser\Document as BaseDocument;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    protected BaseDocument $load;
    protected string $fileName;

    /**
     * @param string $link
     * @return Parser
     */
    public function load(string $link): Parser
    {
        $this->load = XmlParser::load($link);
        $this->fileName = $link;
        return $this;
    }

    /**
     * @return array
     */
    public function start(): void
    {
        $data = $this->load->parse([
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
                'uses' => 'channel.item[title,link,guid,description,pubDate,enclosure::url]'
            ],
        ]);

        $explode = explode("/", $this->fileName);
        $name = end($explode);
        Storage::append('parsing/' . $name, json_encode($data));

        $news = $data['news'];
        foreach($news as $item) {
            News::create([
                'category_id' => 1,
                'source_id' => 1,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'image' => $item['enclosure::url'],
                'description' => 'Источник: РИА Новости',
                'fulltext' => $item['description'],
                'created_at' => $item['pubDate'],
            ]);
        }
    }
}