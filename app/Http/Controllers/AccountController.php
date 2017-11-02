<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class AccountController extends Controller
{
    public function getIndex()
    {
        $users = User::with('threads', 'posts')->get();
        
        return view('accounts/list', compact('users'));
    }
    
    public function getCreate()
    {
        $types = User::select('type')->distinct()->pluck('type');
        
        return view('accounts/create', compact('types'));
    }
    
    public function postCreate(Request $request)
    {
        $types = User::select('type')->distinct()->pluck('type');
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|in:' . implode(',', $types->toArray())
        ]);
        
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'type' => $validatedData['type'],
        ]);
        
        return redirect('accounts');
    }
}
