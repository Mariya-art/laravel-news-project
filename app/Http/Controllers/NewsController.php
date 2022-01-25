<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();
        $news = $this->getNews();

        return view('news.index', [
            'categories' => $categories,
            'news' => $news,
        ]);
    }

    public function show(int $id)
    {
        $newsItem = $this->getNewsById($id);

        return view('news.show', [
            'newsItem' => $newsItem
        ]);
    }
}