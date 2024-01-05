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
    Route::get('/auth/{id}/profile', 'profile')->name('auth.profile');
    Route::get('/auth/signin', 'signin')->name('auth.signin');
    Route::get('/auth/signup', 'signup')->name('auth.signup');
    Route::post('/auth/create_user', 'create_user')->name('auth.create_user');
});

Route::resource('posts', PostController::class);