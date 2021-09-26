<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\FuncCall;

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

// Route::get('/', function () {
//     return response()->json([
//         'title' => 'Example4661',
//         'status' => false,
//         'description' => 'ExampleDescription'
//     ]);
// });

//main page
Route::get('/', [MainController::class, 'index'])
    ->name('main');


//user
Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

Route::get('/categories/{id}', [CategoryController::class, 'filter'])
    ->where('id', '\d+')
    ->name('categories.filter');

Route::resource('feedback', FeedbackController::class);
Route::get('/review', [FeedbackController::class, 'index'])
    ->name('review');
Route::view('/feedback', 'feedback.create')
    ->name('feedback');

// Route::get('session', function() {
//     session(['newSession' => 'newValue']);

//     if(session()->has('newSession')) {
//         session()->remove('newSession');
//     }

//     return "Сессии нет";
// });

//backoffice
Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::get('/logout', function() {
        \Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    //admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function() {
        Route::view('/', 'admin.index')->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('users', AdminUserController::class);

        //Route::get('/parse', ParserController::class);
    });

    Route::get('/admin/news/{categoryId}/parse', [ParserController::class, 'store'])
        ->name('admin.news.parse');
    
    Route::get('/admin/categories/{id}/news', [AdminCategoryController::class, 'filter'])
        ->name('admin.categories.filter');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/init/{driver?}', [SocialController::class, 'init'])
        ->name('social.init');
    Route::get('/callback/{driver?}', [SocialController::class, 'callback'])
        ->name('social.callback');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');