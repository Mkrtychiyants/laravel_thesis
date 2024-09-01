<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Carbon; 
use App\Http\Requests\ClientRegisterRequest;

class RegisterController extends Controller
{
    
    public function showRegisterForm()
    {
        return view("client.auth.register");
    }
    public function register(ClientRegisterRequest $request)
    {
        $data = $request->validated();
  
        $user = User::create([
            "name" => $data["user_name"],
            "email" => $data["user_mail"],
            "password" =>  Hash::make($data["user_password"]),
        ]);

        event(new Registered($user));
       
        Auth::login($user);
    
       
        return redirect(route('clientSessionsList', Carbon::now('Europe/Moscow')->locale('ru_RU')->format('Y-m-d')));
    }   
}
