<?php

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\BlogController;
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

// Route belirle ve slug ata.
Route::get('/blog/{blog:slug}', [BlogController::class,'show']);

Route::get('/user/{user:username}', function(User $user){
    return view('posts.index', [
        'blogs' => $user->blogs
    ]);
});