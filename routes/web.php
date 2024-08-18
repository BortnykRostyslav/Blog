<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\Post\DestroyController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', [IndexController::class, '__invoke'])->name('post.index');
    Route::get('/posts/create', [CreateController::class, '__invoke'])->name('post.create');

    Route::post('/posts', [StoreController::class, '__invoke'])->name('post.store');
    Route::get('/posts/{post}', [ShowController::class, '__invoke'])->name('post.show');
    Route::get('/posts/{post}/edit', [EditController::class, '__invoke'])->name('post.edit');
    Route::patch('/posts/{post}', [UpdateController::class, '__invoke'])->name('post.update');
    Route::delete('/posts/{post}', [DestroyController::class, '__invoke'])->name('post.delete');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', [Post\IndexController::class, '__invoke'])->name('admin.post.index');
    });
});


Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/first_or_create', [PostController::class, 'FirstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'UpdateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
