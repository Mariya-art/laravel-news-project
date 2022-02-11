<?php declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Models\News;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
//use Illuminate\Validation\ValidationException;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::query()->with('category')
            ->with('source')
            //->select(News::$availableFields)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.news.index', [
            'newsList' => $news
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.news.create', [
            'categories' => $categories,
            'sources' => $sources,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        //$request->validate(); // оба способа валидации неверны, т.к. валидация в контроллере, вместо них используем класс CreateRequest 
        /*
        try {
            $this->validate($request, [
                'title' => ['required', 'string', 'min:5']
            ]);
        }catch (ValidationException $e) {
            dd($e->validator->getMessageBag());
        }
        */

        $created = News::create($request->validated() + [
                'slug' => Str::slug($request->input('title'))
            ]
        );

        if($created) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();
        $sources = Source::all();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories,
            'sources' => $sources,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news)
    {
        $updated = $news->fill($request->validated() + [
            'slug' => Str::slug($request->input('title'))
        ])->save();

        if($updated) {
            return redirect()->route('admin.news.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try{
            $news->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            Log::error("Error delete news item");
        }
    }
}