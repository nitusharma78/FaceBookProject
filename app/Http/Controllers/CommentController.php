<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
   public function store(Request $request, Post $post){
         $request->validate([
        'comment' => 'required|string|min:10',
        'post_id' => 'required|exists:posts,id',
    ]);

    Comment::create([
        'user_id' => auth()->id(),
        'post_id' => $request->post_id,   // ✅ will not be null now
        'comment' => $request->comment,
    ]);
    
  //  $comment->save();
    
    //     $comment = new Comment();
    //     $comment->user_id = auth()->id();
    //     $comment->post_id = $request->post;
    //     $comment->comment = $request->comment;
    //     $comment->save();

    return back()->with('success', 'Comment added successfully!');
      
   }
}