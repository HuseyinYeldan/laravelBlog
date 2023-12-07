<?php

use App\Models\Blog;
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
    return view('welcome',['blogs' => Blog::allBlogs()]);
});

// Route belirle ve slug ata.
Route::get('/blog/{slug}', function($slug){
    return view('blog',[
        'blog' => Blog::find($slug)
    ]);

})->where('blog','[A-z_\-]+');