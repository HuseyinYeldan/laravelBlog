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
        return view('welcome',[
            'blogs' => Blog::latest()->filter(request(['search']))->get(),
            'categories'=> Category::all()
        ]);
    }

    public function show(Blog $blog){
        return view('blog',[
            'blog' => $blog
        ]);
    }

}
