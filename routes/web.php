<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::group(['middleware' => 'auth'], function () {
        Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

        Route::resource('posts', App\Http\Controllers\PostsController::class);
    });
});

Route::get('/posts', [App\Http\Controllers\PostsController::class, 'frontIndex'])->name('posts.front.index');
Route::get('/posts/{slug}', [App\Http\Controllers\PostsController::class, 'frontShow'])->name('posts.front.show');



