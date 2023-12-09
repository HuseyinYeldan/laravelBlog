<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){
        return view('posts.index',[
            'blogs' => Blog::latest()->filter(request(['search','category','user']))->get(),
        ]);
    }

    public function show(Blog $blog){
        return view('posts.show',[
            'blog' => $blog
        ]);
    }

}
