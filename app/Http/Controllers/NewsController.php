<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->select(
            News::$availableFields
        )->latest()->paginate(15);

        $categories = Category::query()->get();

        return view('news.index', [
            'categories' => $categories,
            'newsList' => $news,
        ]);
    }

    public function show(News $news)
    {
        return view('news.show', [
            'news' => $news
        ]);
    }
}