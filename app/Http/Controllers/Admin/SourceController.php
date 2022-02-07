<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Models\Source;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Sources\CreateRequest;
use App\Http\Requests\Sources\EditRequest;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::query()->with('news')->get();

        return view('admin.sources.index', [
            'sources' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        /*$request->validate([
            'name' => ['required', 'string', 'min:3'],
            'real_name' => ['required', 'string', 'min:3'],
            'site' => ['required', 'string', 'min:3'],
        ]);*/

        $created = Source::create($request->validated());

        if($created) {
            return redirect()->route('admin.sources.index')
                ->with('success', 'Запись успешно добавлена');
        }
        return back()->with('error', 'Не удалось добавить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Display the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        return view('admin.sources.edit', [
            'source' => $source,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Source $source)
    {
        $updated = $source->fill($request->validated())->save();

        if($updated) {
            return redirect()->route('admin.sources.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        try{
            $source->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            Log::error("Error delete source item");
        }
    }
}
