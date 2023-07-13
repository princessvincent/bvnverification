<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
       $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',
       ]);

       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
       ]);

       if($user){
        return redirect()->back()->with('status', 'Registration successful');
       }else{
        return redirect()->back()->with('status', 'Registration failed');
       }
    }

    public function login(Request $request)
    {
            $request->validate([
                    'email' => 'required|email',
                    'password' => 'required'
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect('dashboard');
            }else{
                return redirect()->back()->with('status', 'Wrong Credentials');
            }
    }
}
