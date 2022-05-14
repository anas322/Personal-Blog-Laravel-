<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController ;
use App\Http\Controllers\PostController ;
use App\Http\Controllers\Admin\PostController as AdminPostController ;
use App\Http\Controllers\Admin\CategoryController  ;
use App\Http\Controllers\Admin\TagController  ;


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

Route::redirect('/','/posts');

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function(){

    Route::resource('/posts',AdminPostController::class);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/tags',TagController::class);
});

Auth::routes(['register' => false]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
