<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index(){
        return view('posts.index',[
            'blogs' => Blog::latest()->filter(request(['search','category','user']))->paginate(6)->withQueryString(),
        ]);
    }

    public function show(Blog $blog){
        return view('posts.show',[
            'blog' => $blog
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('posts.create',compact('categories'));
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'image' => 'required|image',
            'slug' => ['required',Rule::unique('blogs','slug')],
            'category_id' =>['required', Rule::exists('categories','id')],
            'body' => 'required'
        ]);
        //Adds the image to the storage folder
        $attributes['image'] = $request->file('image')->store('thumbnails');

        $attributes['user_id'] = Auth::user()->id;

        Blog::create($attributes);
        return redirect('/')->with('success', 'Your blog has been created.');
    }

    public function edit(Blog $blog){
        return view('posts.edit',[
            'blog' => $blog
        ]);
    }
}
