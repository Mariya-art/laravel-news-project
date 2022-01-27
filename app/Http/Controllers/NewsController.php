<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $model = new News();
        $news = $model->getNews();

        $modelCategory = new Category();
        $categories = $modelCategory->getCategories();

        return view('news.index', [
            'categories' => $categories,
            'newsList' => $news,
        ]);
    }

    public function show(int $id)
    {
        $model = new News();
        $news = $model->getNewsById($id);

        return view('news.show', [
            'news' => $news
        ]);
    }
}