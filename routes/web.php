<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
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

Route::get('/feed', function(Request $request){
    $posts = Post::all();
    return view('feed', compact('posts', 'request'));
})->name('feed');
Route::view('/about', 'about')->name('about');

Route::middleware('auth')->group(function() {
    Route::controller(UserController::class)->prefix('user')->name('user.')->group(function() {
        Route::get('me', 'me')->name('me');
        Route::put('me', 'update')->name('update');
        Route::get('me/edit', 'edit')->name('edit');
    });
    Route::resource('post', PostController::class);
    Route::resource('admin', AdminController::class);
    Route::prefix('/admin/comment/{comment}')->name('comment.')->controller(CommentController::class)->group(function() {
        Route::get('accept', 'accept')->name('accept');
        Route::get('block', 'block')->name('block');
    });
});

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function() {
    Route::middleware('auth')->get('logout', 'logout')->name('logout');
    Route::middleware('guest')->group(function() {
        Route::get('signin', 'signin')->name('signin');
        Route::post('signin', 'login')->name('login');

        Route::get('signup', 'signup')->name('signup');
        Route::post('signup', 'register')->name('register');
    });
});
