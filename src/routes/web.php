<?php

use App\Http\Controllers\AuthController;
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

Route::namespace('App\Http\Controllers')->group(function () {

        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('signin');
//        Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
//        Route::post('/register', [AuthController::class, 'register'])->name('signup');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    });


Route::prefix('admin')->namespace('App\Http\Controllers\Admin')
    ->name('admin.')->middleware(['auth', 'admin'])->group(function () {

        Route::namespace('Main')->group(function () {
            Route::get('/', 'IndexController')->name('main.index');
        });

        Route::prefix('posts')->namespace('Post')->group(function () {
            Route::get('/', 'IndexController')->name('post.index');
            Route::get('/create', 'CreateController')->name('post.create');
            Route::post('/', 'StoreController')->name('post.store');
            Route::get('/{post}', 'ShowController')->name('post.show');
            Route::get('/{post}/edit', 'EditController')->name('post.edit');
            Route::patch('/{post}', 'UpdateController')->name('post.update');
            Route::delete('/{post}', 'DeleteController')->name('post.delete');
        });

        Route::prefix('users')->namespace('User')->group(function () {
            Route::get('/', 'IndexController')->name('user.index');
            Route::post('/', 'StoreController')->name('user.store');


        });

    });

Route::get('/rules', function(){
   return view('pages.rules');
})->name('rules');

Route::get('/news', function(){
    return view('pages.news', [
        'posts' => \App\Models\Post::all()
    ]);
})->name('news');

Route::get('/news/{post}', function(\App\Models\Post $post){
   return view('pages.post', [
       'post' => $post
   ]);
});

Route::get('/', function () {
    return view('welcome', [
        'data' => \App\Services\MinecraftStatisticsService::getStats(),
        'posts' => \App\Models\Post::all()->take(3)
    ]);
})->name('main');
