<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
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
Route::post('/category_{idCategory}/news/{id}', [NewsController::class, 'show'])
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
