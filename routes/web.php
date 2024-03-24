<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => App\Http\Middleware\AdminMiddleware::class], function () {
    Route::get('/dashboard', [App\Http\Controllers\ItemController::class, 'index'])->name('dashboard');
});

#dashboard
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
Route::post('/items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::get('/items/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
Route::get('/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'filter'])->name('items.filter');


#comment
Route::get('/items/{item}/comments', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');

// Menyimpan komentar baru
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{comment}/edit', [App\Http\Controllers\CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/home');
})->name('logout');