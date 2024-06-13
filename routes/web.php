<?php

use Modules\Blog\App\Models\Blog;
use Illuminate\Support\Facades\Route;
use Modules\Blog\App\Http\Controllers\BlogController;

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
    $blogs = Blog::where('status', 1)
        ->orderBy('publication_date', 'DESC')
        ->get();
    return view('welcome', compact('blogs'));
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth:web'], function () {
    Route::resource('posts', BlogController::class);
});