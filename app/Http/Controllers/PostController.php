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
}
