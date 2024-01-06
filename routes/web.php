<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

use Illuminate\Http\Request;
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
    $posts = $request->user()->posts;
    return view('feed', compact('posts'));
})->name('feed');
Route::view('/about', 'about')->name('about');

Route::middleware('auth')->group(function() {

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('me', [UserController::class, 'me'])->name('me');
        Route::get('me/edit', [UserController::class, 'edit'])->name('edit');
    });

    Route::resource('post', PostController::class);
});

Route::middleware('guest')->group(function() {
    Route::prefix('auth')->name('auth.')->group(function() {
        Route::get('signin', [AuthController::class, 'signin'])->name('signin');
        Route::post('signin', [AuthController::class, 'login'])->name('login');

        Route::get('signup', [AuthController::class, 'signup'])->name('signup');
        Route::post('signup', [AuthController::class, 'register'])->name('register');
    });
});
