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
    public function destroy(Comment $comment){
        if(Auth::user()->id !== $comment->user->id){
            return redirect()->back()->with('error', "You don't have the permisson to do that!");
        }
        Comment::destroy($comment->id);
        return redirect()->back()->with('success', "Comment successfully delted.");
        
    }
}
