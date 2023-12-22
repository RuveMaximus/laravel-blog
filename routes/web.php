<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/feed', [PostController::class, 'index'])->name('feed');
Route::get('/feed/post/create', [PostController::class, 'create'])->name('feed.post.create');
Route::post('/feed/post/store', [PostController::class, 'store'])->name('feed.post.store');

Route::get('/about', function() {
    return view('about');
})->name('about');