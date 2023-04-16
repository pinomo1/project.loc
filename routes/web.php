<?php

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
