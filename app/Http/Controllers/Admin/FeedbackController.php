<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Feedbacks\CreateRequest;
use App\Http\Requests\Feedbacks\EditRequest;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::query()->paginate(10);

        return view('admin.feedbacks.index', [
            'feedbacks' => $feedbacks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        return view('admin.feedbacks.edit', [
            'feedback' => $feedback,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Feedback $feedback)
    {
        $updated = $feedback->fill($request->validated())->save();

        if($updated) {
            return redirect()->route('admin.feedbacks.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Feedback $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        try{
            $feedback->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            Log::error("Error delete feedback item");
        }
    }
}
