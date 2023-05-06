<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function profile_submit(Request $request)
    {
        $admin_data =  Admin::where('email',Auth::guard('admin')->user()->email)->first();


        $request->validate([
            'name'=> 'required',
            'email' => 'required|email',
        ]);


            if($request->password!='')
            {
                $request->validate([
                    'password'=> 'required',
                    'retype_password' => 'required',
                ]);

                $admin_data->password = Hash::make($request->password);

            }


            if($request->hasFile('photo'))
            {
                $request->validate([
                    'photo'=> 'image|mimes:jpg,jpeg,png,svg,gif',
                ]);

                $image = $request->file('photo');
                $new_name = rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/admin'),$new_name);
                $admin_data->photo = $new_name;
            }




            $admin_data->name = $request->name;
            $admin_data->email = $request->email;
            $admin_data->update();

            return redirect()->back()->with('success', 'Profile Updated Successfully');
    }



}
