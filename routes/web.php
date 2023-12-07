<?php

use App\Models\Blog;
use App\Models\Category;
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

Route::get('/blogs', function () {
    //return the files to view
    return view('welcome',['blogs' => Blog::with('category')->get()]);
});

// Route belirle ve slug ata.
Route::get('/blog/{blog:slug}', function(Blog $blog){
    return view('blog',[
        'blog' => $blog
    ]);

});

Route::get('/categories/{category:slug}',function(Category $category){
    return view('welcome',['blogs' => $category->blogs]);
    
});