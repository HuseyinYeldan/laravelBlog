<?php

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
    return view('welcome');
});

// Route belirle ve slug ata.
Route::get('/blog/{slug}', function($slug){

    // DIR mevcut konumu alıyor.
    $path = __DIR__ .'\..\resources\blogs\first-blog.html';


    // PHP yolun gösterdiği yerdeki dosyadan içerikleri al.
    $blog = file_get_contents($path);

    // Aldığımız dosyadaki(html) bilgileri viewa ata
    return view('blog', [
        'blog' => $blog 
    ]);

});