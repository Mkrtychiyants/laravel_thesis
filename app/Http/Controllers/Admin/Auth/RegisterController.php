<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\AdminRegisterRequest;



class RegisterController extends Controller
{
    
    public function showRegisterForm()
    {
        return view("admin.auth.register");
    }
    public function register(AdminRegisterRequest $request)
    {

        $data = $request->validated();
        $admin = AdminUser::create([
            "name" => $data["admin_name"],
            "email" => $data["admin_mail"],
            "password" =>  Hash::make($data["admin_password"]),
        ]);

        event(new Registered($admin));
       
        Auth::guard('admin')->login($admin);
    
       
        return redirect(url("/admin/welcome/"));
    }   
}
