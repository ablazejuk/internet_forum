<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function postCreate(Request $request)
    {
        $validatedData = $request->validate([
            'post' => 'required',
            'thread_id' => 'required'
        ]);
        
        
        dd($validatedData);
//        $thread = new Thread;
//        
//        $thread->fill($validatedData);
//        $thread->user_id = $request->user()->id;
//        $thread->save();
        
        return redirect('threads/view' . $validatedData['thread_id']);
    }
}
