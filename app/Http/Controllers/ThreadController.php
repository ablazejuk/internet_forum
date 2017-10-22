<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ThreadController extends Controller
{
    public function getCreate()
    {
        return view('threads/create');
    }
    
    public function postCreate(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:threads|max:100',
            'description' => ''
        ]);
        
        $thread = new Thread;
        
        $thread->fill($validatedData);
        $thread->user_id = $request->user()->id;
        $thread->save();
        
        return redirect('home');
    }
}
