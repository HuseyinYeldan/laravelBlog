<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function index(){

        //return the files to view
        //Instead of just getting all the blogs we are getting with the category so we don't run the sql multiple times.
        return view('posts.index',[
            'blogs' => Blog::latest()->filter(request(['search','category']))->get(),
        ]);
    }

    public function show(Blog $blog){
        return view('posts.show',[
            'blog' => $blog
        ]);
    }

}
