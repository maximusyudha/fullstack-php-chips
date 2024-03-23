<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => App\Http\Middleware\AdminMiddleware::class], function () {
    Route::get('/dashboard', [App\Http\Controllers\ItemController::class, 'index'])->name('dashboard');
});

#dashboard
Route::get('/items/create', [App\Http\Controllers\ItemController::class, 'create'])->name('items.create');
Route::post('/items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::get('/items/{id}', [App\Http\Controllers\ItemController::class, 'show'])->name('items.show');
Route::get('/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items.index');
Route::get('/items', [App\Http\Controllers\ItemController::class, 'filter'])->name('items.filter');




Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/home');
})->name('logout');