<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\FeedBackController as AdminFeedBackController;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
   Route::resource('categories', AdminCategoryController::class);
   Route::resource('news', AdminNewsController::class);
   Route::resource('feedback', AdminFeedBackController::class);
});

//news
Route::get('/', [CategoryController::class, 'index'])
	->name('/');
Route::get('/category_{idCategory}/news', [NewsController::class, 'index'])
    ->where('idCategory', '\d+')
	->name('news');
Route::get('/category_{idCategory}/news/{id}', [NewsController::class, 'show'])
    ->where('idCategory', '\d+')
	->where('id', '\d+')
	->name('news.show');
Route::get('/welcome/{name}', function (string $name) {
    return "Hello {$name}";
});

Route::get('/welcome', function () {
    return "Hello NONAME";
});

Route::get('/about', function () {
    return "Внимание, это тестовый проект. И да, тут могла быть куча информации о нем...";
});

Route::get('/collections', function() {
	$collect = collect([1,3,6,7,2,8,9,3,23,68,11,6]);

	dump($collect->shuffle()->map(fn($item) => $item + 2)->toJson());
});
