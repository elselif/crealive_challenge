<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class LoginController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id',1)->first();

        return view('front.login',compact('page_data'));
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential= [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::guard('author')->attempt($credential)){
            return redirect()->route('author_home');
        }else {
            return redirect()->route('login')->with('error', 'Invalid Email or Password');
        }
    }

    public function logout()
    {
        Auth::guard('author')->logout();
        return redirect()->route('login');
    }
}
