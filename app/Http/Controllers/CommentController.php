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
        'post_id' => 'required|exists:posts,id'
    ]);


    //   dd($post->id);
    $comment=Comment::create([
        'user_id' => auth()->id(),
        'post_id' => $post->id,
        'comment' => $request->comment,
    ]);
    // dd($post->id);

    
    return redirect()->back()->with('success', 'Comment added successfully!');
}

    public function show(Post $post)
    {
        $post = load(['comments.user']);
        return view('posts.show', compact('post'));
    }


    public function destroy($id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }


} 