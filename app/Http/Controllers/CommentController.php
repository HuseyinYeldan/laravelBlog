<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog){

        $data = $request->validate([
            'comment' => 'required|max:256|min:4'
        ]);

        Comment::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::user()->id,
            'body' => $request->input('comment'),
        ]);

        return redirect()->back()->with('success','Your comment has been submited.');

    }
}
