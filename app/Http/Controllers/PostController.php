<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{

    public function create()
    {
        return view('post.create');
    }

    

    
    public function store(Request $request){
        $request->validate([
            
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
            
        ]);

        
        $post = new Post();
        $post->user_id = auth()->id();
        $post->content = $request->content;
        if($request->hasFile('image')){
            $uploadPath = public_path('uploads');
            
            if(!File::exists($uploadPath)){
                File::makeDirectory($uploadPath, 0777, true, true);
            }
            
            
            $filename = uniqid().'_'.time().'.'.$request->image->extension();//generate unquie image id

            $request->image->move($uploadPath,  $filename);

            $post->image = 'uploads/'.$filename;
        }

        $post->save();

        return redirect()->back()->with('success', 'Post create successfully!');
       
    }

    
    public function index()
    {
        $posts = Post::with(['user', 'comments.user'])->latest()->get();
       
        return view('feed.index', compact('posts')); 
         
        
    }


    public function show($id)
    {
        $post = Post::with('user', 'comments.user')->findOrFail($id);
        $comments = $post->comments;
        // dd($comments);

        return view('posts.show', compact('post', 'comments'));

    }

    
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        if($post->image && file_exists(public_path($post->image)))
        {
            unlink(public_path($post->image));
        }
        
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');

    }

    
}