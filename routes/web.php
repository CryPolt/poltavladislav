<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
})->name('home');

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');

    return "Cache is clear.";
});


Route::get('/post', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('post/search', [\App\Http\Controllers\PostController::class, 'search'])->name('post.search');
Route::get('post/create', [\App\Http\Controllers\PostController::class, 'create'])->middleware('auth')->name('post.create');
Route::post('post/store', [\App\Http\Controllers\PostController::class, 'store'])->middleware('auth')->name('post.store');
Route::get('post/show/{id}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('post/edit/{id}', [\App\Http\Controllers\PostController::class, 'edit'])->middleware('auth')->name('post.edit');
Route::get('post/update/{id}', [\App\Http\Controllers\PostController::class, 'update'])->middleware('auth')->name('post.update');
Route::get('post/destroy/{id}', [\App\Http\Controllers\PostController::class, 'destroy'])->middleware('auth')->name('post.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/contact', [ContactUsFormController::class, 'createForm']);
Route::patch('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

require __DIR__.'/auth.php';
