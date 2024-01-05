<?php

use App\Http\Controllers\PostController;
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

Route::redirect('/', '/feed');

    Route::view('/feed', 'feed')->name('feed');
    Route::view('/about', 'about')->name('about');

Route::controller(AuthController::class)->group(function () {
    Route::middleware('auth')->group(function() {
        Route::get('/me', 'profile')->name('auth.profile');
    });

    Route::middleware('guest')->group(function() {
        Route::get('/auth/signup', 'signup')->name('register');
        Route::post('/auth/signup', 'create_user');

        Route::get('/auth/signin', 'signin')->name('login');
        Route::post('/auth/signin', 'login');
    });
});

Route::resource('posts', PostController::class)->name('index', 'posts');