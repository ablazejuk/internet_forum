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
    
    public function getEdit($id)
    {
        $user = User::find($id);
        $types = User::select('type')->distinct()->pluck('type');
        
        return view('accounts/edit', compact('user', 'types'));
    }
    
    public function postEdit(Request $request)
    {
        $user = User::find($request->get('user_id'));
        $types = User::select('type')->distinct()->pluck('type');
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($user->email !== $request->get('email') ? '|unique:users' : ''),
            'new_password' => 'nullable|string|min:6|confirmed',
            'type' => 'required|in:' . implode(',', $types->toArray())
        ]);
        
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        
        if(!empty($validatedData['new_password'])) {
            $user->password = bcrypt($validatedData['new_password']);
        }
        
        $user->type = $validatedData['type'];
        
        $user->save();
        
        return redirect('accounts');
    }
    
    public function getDelete($id)
    {
        $user = User::with('threads', 'posts')->find($id);
        $types = User::select('type')->distinct()->pluck('type');
        
        return view('accounts/delete', compact('user', 'types'));
    }
    
    public function postDelete(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required'
        ]);
        
        $user = User::find($validatedData['user_id']);
        
        User::where('id', $user->id)->delete();
        
        return redirect('accounts');
    }
}
