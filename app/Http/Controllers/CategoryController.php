<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategories();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(int $id)
    {
        $news = $this->getNewsByCategoryId($id);
        $rus_name = $this->getCategoryName($id);

        return view('categories.show', [
            'news' => $news,
            'rus_name' => $rus_name,
        ]);
    }
}