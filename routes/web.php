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

//add load to fix the n+1 problem.
Route::get('/categories/{category:slug}',function(Category $category){
    return view('welcome',[
        'blogs' => $category->blogs,
        'currentCat' => $category->name,
        'categories'=> Category::all()
    ]);
});

Route::get('/user/{user:username}', function(User $user){
    return view('welcome', [
        'blogs' => $user->blogs
    ]);
});