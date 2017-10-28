<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function postCreate(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'thread_id' => 'required'
        ]);
        
        $post = new Post;
        
        $post->fill($validatedData);
        $post->user_id = $request->user()->id;
        $post->save();
        
        return redirect('threads/view/' . $validatedData['thread_id']);
    }
    
    public function getEdit($id)
    {
        $post = Post::with('thread')->find($id);
        
        return view('posts/edit', compact('post'));
    }
    
    public function postEdit(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'post_id' => 'required'
        ]);
        
        $post = Post::find($validatedData['post_id']);
        
        $post->fill($validatedData);
        $post->save();
        
        return redirect('threads/view/' . $post->thread->id);
    }
    
    public function getDelete($id)
    {
        $post = Post::with('thread')->find($id);
        
        return view('posts/delete', compact('post'));
    }
    
    public function postDelete(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required'
        ]);
        
        $post = Post::find($validatedData['post_id']);
        Post::where('id', $post->id)->delete();
        
        return redirect('threads/view/' . $post->thread->id);
    }
}
