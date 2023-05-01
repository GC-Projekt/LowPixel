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


Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin.')->group(function() {

    Route::namespace('Main')->group(function() {
        Route::get('/', 'IndexController')->name('main.index');
    });

    Route::prefix('posts')->namespace('Post')->group(function() {
        Route::get('/', 'IndexController')->name('post.index');
    });
    /*Route::get('/post', 'IndexController')->name('post.index');*/
});

Route::get('/', function () {
    return view('welcome');
});
