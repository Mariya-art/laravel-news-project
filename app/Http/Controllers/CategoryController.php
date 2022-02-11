<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(int $id)
    {
        $news = News::query()->select(
            News::$availableFields
        )->where('category_id', $id)->paginate();

        $categories = Category::query()->get();
        $oneCategory = Category::findOrFail($id);

        return view('categories.show', [
            'categories' => $categories,
            'newsList' => $news,
            'oneCategory' => $oneCategory,
        ]);
    }
}