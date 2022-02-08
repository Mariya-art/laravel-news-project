<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\SubscriptionController as AdminSubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//news routes
Route::get('/', [NewsController::class, 'index'])->name('news.index');
//Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+') // указываем что news должно быть только числом (регулярка), чтобы при указании не числа была ошибка 404, а не полное описание проблемы с кодом
    ->name('news.show'); // указываем нейминг, чтобы можно было здесь менять url при необходимости (и тогда не надо будет менять в других файлах)

//categories routes
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

//admin routes

Route::group(['middleware' => 'auth'], function() {

    Route::get('/account', AccountController::class)->name('account');

    Route::get('/account/logout', function() {
        Auth::logout();
        return redirect()->route('login');
    })->name('account.logout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('/news', AdminNewsController::class);
        Route::resource('/users', AdminUserController::class);
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/sources', AdminSourceController::class);
        Route::resource('/feedbacks', AdminFeedbackController::class);
        Route::resource('/subscriptions', AdminSubscriptionController::class);
    });
});

//other routes
Route::resource('/feedback', FeedbackController::class);
Route::resource('/subscription', SubscriptionController::class);

Route::get('/collection', function() {
    $array = ['Anna', 'Victor', 'Alex', 'dima', 'ira', 'Vasya', 'olya'];
    $collection = collect($array);
    dd($collection->map(function ($item) {
        return mb_strtoupper($item);
    })->sort());
});

Route::get('/session', function() {
    if(session()->has('title')) {
        //dd(session()->all(), session()->get('title')); // посмотреть созданную сессию
        session()->forget('title');
    }
    session(['title' => 'name']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
