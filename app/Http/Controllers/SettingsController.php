<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function getIndex()
    {
        return view('settings');
    }
    
    public function postIndex(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255' . ($request->user()->email !== $request->get('email') ? '|unique:users' : ''),
            'current_password' => 'required|string|min:6',
            'new_password' => 'nullable|string|min:6|confirmed',
        ]);
        
        $user = $request->user();
        
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        
        if(!empty($validatedData['new_password'])) {
            $user->password = bcrypt($validatedData['new_password']);
        }
        
        $user->save();
        
        return redirect('home');
    }
}
