<?php

use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    $files = File::files(resource_path("/blogs"));

    $blogs = [];

    foreach($files as $file){
        $document = YamlFrontMatter::parseFile($file);
        $blogs[] = new Blog(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug,
            $document->image
        );
    }

    return view('welcome',['blogs' =>$blogs]);
});

// Route belirle ve slug ata.
Route::get('/blog/{slug}', function($slug){

    return view('blog',[
        'blog' => Blog::find($slug)
    ]);

})->where('blog','[A-z_\-]+');