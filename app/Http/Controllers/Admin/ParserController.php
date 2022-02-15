<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // Парсинг с очередями
    public function __invoke(Request $request)
    {
        $links = [
            'https://ria.ru/export/rss2/index.xml',
            'https://news.yandex.ru/culture.rss',
            'https://news.yandex.ru/sport.rss',
        ];

        foreach($links as $link) {
            dispatch(new NewsParsing($link));
        }

        return view('admin.index');
    }

    // Парсинг без очередей (в контракте Parser.php и в сервисе ParserService метод start() возвращает array)
    /*public function __invoke(Request $request, Parser $service)
    {
        $politicsNews = $service->load('https://ria.ru/export/rss2/index.xml')->start()['news'];
        foreach($politicsNews as $item) {
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

        $cultureNews = $service->load('https://news.yandex.ru/culture.rss')->start()['news'];
        foreach($cultureNews as $item) {
            News::create([
                'category_id' => 3,
                'source_id' => 2,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'description' => 'Источник: Яндекс Новости',
                'fulltext' => $item['description'],
                'created_at' => $item['pubDate'],
            ]);
        }

        $sportNews = $service->load('https://rsport.ria.ru/export/rss2/index.xml')->start()['news'];
        foreach($sportNews as $item) {
            News::create([
                'category_id' => 5,
                'source_id' => 1,
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'image' => $item['enclosure::url'],
                'description' => 'Источник: РИА Новости',
                'fulltext' => $item['description'],
                'created_at' => $item['pubDate'],
            ]);
        }
        return view('admin.index');
    }*/
}
