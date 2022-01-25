<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;

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
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+') // указываем что id должно быть только числом (регулярка), чтобы при указании не числа была ошибка 404, а не полное описание проблемы с кодом
    ->name('news.show'); // указываем нейминг, чтобы можно было здесь менять url при необходимости (и тогда не надо будет менять в других файлах)

//categories routes
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

//admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::view('/', 'admin.index')->name('index');
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/categories', AdminCategoryController::class);
});

//other routes
Route::resource('/feedback', FeedbackController::class);
Route::resource('/subscription', SubscriptionController::class);