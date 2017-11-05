<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Rules\ThreadTitleUnique;

class ThreadController extends Controller
{
    public function getIndex()
    {
        $threads = Thread::with(['user', 'posts' => function ($query) {
            $query->orderBy('created_at');
        }])->get();
        
        return view('threads/list', compact('threads'));
    }
    
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
        
        return redirect('threads');
    }
    
    public function getView($id)
    {
        $thread = Thread::with('posts.user')->find($id);
        
        return view('threads/view', compact('thread'));
    }
    
    public function getEdit(Request $request, $id)
    {
        $thread = Thread::find($id);
        
        if(!$thread || $thread->user_id != $request->user()->id) {
            abort(404);
        }
        
        return view('threads/edit', compact('thread'));
    }
    
    public function postEdit(Request $request)
    {
        $validatedData = $request->validate([
            'thread_id' => 'required',
            'title' => ['required', 'max:100', new ThreadTitleUnique($request->get('thread_id'))],
            'description' => ''
        ]);
        
        $thread = Thread::find($validatedData['thread_id']);
        
        if(!$thread || $thread->user_id != $request->user()->id) {
            abort(404);
        }
        
        $thread->fill($validatedData);
        $thread->save();
        
        return redirect('threads/view/' . $thread->id);
    }
    
    public function getDelete(Request $request, $id)
    {
        $thread = Thread::find($id);
        
        if(!$thread || $request->user()->type != 'admin' && $thread->user_id != $request->user()->id) {
            abort(404);
        }
        
        return view('threads/delete', compact('thread'));
    }
    
    public function postDelete(Request $request)
    {
        $validatedData = $request->validate([
            'thread_id' => 'required'
        ]);
        
        $thread = Thread::find($validatedData['thread_id']);
        
        if(!$thread || $request->user()->type != 'admin' && $thread->user_id != $request->user()->id) {
            abort(404);
        }
        
        Thread::where('id', $thread->id)->delete();
        
        return redirect('threads');
    }
}
