<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;

class SearchController extends Controller
{
    public function getIndex()
    {
        return view('search/index');
    }
    
    public function getSearch(Request $request)
    {
        $validatedData = $request->validate([
            'term' => 'required|string|max:255'
        ]);

        $term = $validatedData['term'];
        
        $threads = Thread::where('title', 'like', '%' . $term . '%')
                ->orWhere('description', 'like', '%' . $term . '%')
                ->get();
        
        $posts = Post::with('thread')
                ->where('message', 'like', '%' . $term . '%')
                ->get();
        
        return view('search/results', compact('term', 'threads', 'posts'));
    }
}
