<?php declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(int $id)
    {
        $categories = $this->getCategories();
        $news = $this->getNewsByCategoryId($id);
        $rus_name = $this->getCategoryName($id);

        return view('categories.show', [
            'categories' => $categories,
            'news' => $news,
            'rus_name' => $rus_name,
        ]);
    }
}