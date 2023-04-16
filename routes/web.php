<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthorController;
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

Route::get('/', [IndexController::class, 'Index'])->name('index');
Route::get('/about', [AboutController::class, 'AboutIndex'])->name('about');
Route::get('/faq', [FAQController::class, 'FAQIndex'])->name('faq');
Route::get('/category/{id}', [CategoryController::class, 'CategoryIndex'])->name('category');
Route::get('/post/{id}', [PostController::class, 'PostIndex'])->name('post');
Route::get('/author/{id}', [AuthorController::class, 'AuthorIndex'])->name('author');
Route::post('/reply/{post_id}', [PostController::class, 'PostReply'])->name('reply');
Route::get('/post/create/{id}', [PostController::class, 'PostCreateIndex'])->name('post.create.index');
Route::post('/post/created', [PostController::class, 'PostCreatePost'])->name('post.create.post');
Route::get('/category/create/{id}', [CategoryController::class, 'CategoryCreateIndex'])->name('category.create.index');
Route::post('/category/created', [CategoryController::class, 'CategoryCreatePost'])->name('category.create.post');
Route::get('/search', [IndexController::class, 'Search'])->name('search');
Route::get('/post/delete/{id}', [PostController::class, 'PostDelete'])->name('post.delete');
Route::get('/reply/delete/{id}', [PostController::class, 'ReplyDelete'])->name('reply.delete');
Route::get('/author/{id}/resetpfp', [ProfileController::class, 'ResetPFP'])->name('author.resetpfp');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/pfp', [ProfileController::class, 'newPFP'])->name('profile.pfp');
});

require __DIR__.'/auth.php';
