<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    {
    
        $data = $request->validate([
            "user_mail" => ["required", "email"],
            "user_password" => ["required"]
        ]);
       
        if (Auth::guard('admin')->attempt($data)) {
            $request->authenticate();
            $request->session()->regenerate();
            return  redirect(url("/"));
           
        }
        if (Auth::attempt($data)) {
            $request->authenticate();
            return  redirect(url("/"));
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
       
       
        $data = $request->validate([
            "user_name" => ["required", "string"],
            "user_mail" => ["required", "email", "string", "unique:users,email"],
            "user_password" => ["required"]
        ]);
        
        $user = User::create([
            "name" => $data["user_name"],
            "email" => $data["user_mail"],
            "password" =>  Hash::make($data["user_password"]),
        ]);

       
        Auth::login($user);
    
       
        return redirect(url("/admin"));
    }   
}
