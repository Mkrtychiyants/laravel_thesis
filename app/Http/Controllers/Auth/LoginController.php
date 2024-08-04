<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator ;
use Illuminate\Support\Carbon;  
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ClientLoginRequest;

class LoginController extends Controller
{
    public function showWelcomePage()
    {
        return redirect(route('clientLogin'));
    }
    public function showLoginForm()
    {
        return view("client.auth.login");
    }
    public function login(ClientLoginRequest $request): RedirectResponse
    {   
       
        $credentials = $request->validated();
          
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect(route('client_sessions_list', Carbon::now('Europe/Moscow')->locale('ru_RU')->format('Y-m-d')));
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

        return redirect(url("/client/login"));
        }
  
}
