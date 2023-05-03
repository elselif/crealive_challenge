<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;


class AdminLoginController extends Controller
{
    public function index()
    {
        
        return view('admin.login');
    }

    public function forget_password()
    {
        return view('admin.forget_password');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credential= [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin.home');
        }else {
            return redirect()->route('admin.login')->with('error', 'Invalid Email or Password');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
