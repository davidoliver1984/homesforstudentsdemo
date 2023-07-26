<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::post('/search', [PostController::class, 'index'])->name('search');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/store', [PostController::class, 'store'])->name('store');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('update');
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/delete', [PostController::class, 'destroy']);

Route::get('/comments/{comment}/delete', [CommentController::class, 'destroy']);


// just for testing
Route::get('testmail', function () {
    dispatch(new App\Jobs\NewBlogPosts());
    dd('Mail send successfully.');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// comments
Route::post('/comments/{post}/', [CommentController::class, 'store'])->name('comment');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
