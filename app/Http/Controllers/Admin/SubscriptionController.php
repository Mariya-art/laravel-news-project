<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Log;
use App\Models\Subscription;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Subscriptions\CreateRequest;
use App\Http\Requests\Subscriptions\EditRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::query()->paginate(10);

        return view('admin.subscriptions.index', [
            'subscriptions' => $subscriptions
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        $categories = Category::all();

        return view('admin.subscriptions.edit', [
            'subscription' => $subscription,
            'categories' => $categories,
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EditRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Subscription $subscription)
    {
        $updated = $subscription->fill($request->validated())->save();

        if($updated) {
            return redirect()->route('admin.subscriptions.index')
                ->with('success', 'Запись успешно обновлена');
        }
        return back()->with('error', 'Не удалось обновить запись')
            ->withInput(); // чтобы сохранились данные, которые вводил пользователь
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        try{
            $subscription->delete();
            return response()->json('ok');
        }catch(\Exception $e) {
            Log::error("Error delete subscription item");
        }
    }
}
