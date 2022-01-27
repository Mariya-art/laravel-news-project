<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(int $id)
    {
        $model = new News();
        $news = $model->getNewsByCategoryId($id);

        $modelCategory = new Category();
        $categories = $modelCategory->getCategories();
        $oneCategory = $modelCategory->getCategoryById($id);

        return view('categories.show', [
            'categories' => $categories,
            'newsList' => $news,
            'oneCategory' => $oneCategory,
        ]);
    }
}