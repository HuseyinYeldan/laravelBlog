<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
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

Route::get('/',[BlogController::class,'index']);

Route::get('/blog/{blog:slug}', [BlogController::class,'show']);
Route::post('/blog/{blog:slug}/comment', [CommentController::class,'store'])->name('comment.add');
Route::post('/comment/{comment}/comment-delete', [CommentController::class,'destroy'])->name('comment.destroy');
Route::post('/comment/{comment}/comment-update', [CommentController::class,'update'])->name('comment.update');

Route::get('/register',[RegisterController::class,'create'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);

Route::get('/login',[SessionsController::class,'create'])->name('login')->middleware('guest');
Route::post('/login',[SessionsController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/blog/create', [BlogController::class, 'create'])->middleware('admin.check');
Route::post('admin/blog', [BlogController::class, 'store'])->middleware('admin.check');

//API CALLS
Route::post('/newsletter', NewsletterController::class);