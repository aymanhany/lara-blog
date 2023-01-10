<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.all');
Route::get('/posts/mine', [PostController::class, 'indexByUser'])->name('posts.mine');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('post');
Route::get('/posts/create/post', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/create/post', [PostController::class, 'store'])->name('post.store');
Route::post('/posts/{id}', [CommentController::class, 'store'])->name('comments.store');

Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('auth/callback-url', [GoogleController::class, 'GoogleCallback'])->name('google.callbak');


require __DIR__ . '/auth.php';
