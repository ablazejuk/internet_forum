<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Thread;

class PostController extends Controller
{
    public function postCreate(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'thread_id' => 'required'
        ]);
        
        $thread = Thread::find($validatedData['thread_id']);
        
        if(!$thread) {
            abort(404);
        }
        
        $post = new Post;
        
        $post->fill($validatedData);
        $post->user_id = $request->user()->id;
        $post->save();
        
        return redirect('threads/view/' . $validatedData['thread_id']);
    }
    
    public function getEdit(Request $request, $id)
    {
        $post = Post::with('thread', 'user')->find($id);
        
        if(!$post || $post->user_id != $request->user()->id) {
            abort(404);
        }
        
        return view('posts/edit', compact('post'));
    }
    
    public function postEdit(Request $request)
    {
        $validatedData = $request->validate([
            'message' => 'required',
            'post_id' => 'required'
        ]);
        
        $post = Post::find($validatedData['post_id']);
        
        if(!$post || $post->user_id != $request->user()->id) {
            abort(404);
        }
        
        $post->fill($validatedData);
        $post->save();
        
        return redirect('threads/view/' . $post->thread->id);
    }
    
    public function getDelete(Request $request, $id)
    {
        $post = Post::with('thread', 'user')->find($id);
        
        if(!$post || $request->user()->type != 'admin' && $post->user_id != $request->user()->id) {
            abort(404);
        }
        
        return view('posts/delete', compact('post'));
    }
    
    public function postDelete(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required'
        ]);
     
        $post = Post::find($validatedData['post_id']);
        
        if(!$post || $request->user()->type != 'admin' && $post->user_id != $request->user()->id) {
            abort(404);
        }
        
        Post::where('id', $post->id)->delete();
        
        return redirect('threads/view/' . $post->thread->id);
    }
}
