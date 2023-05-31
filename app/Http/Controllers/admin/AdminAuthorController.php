<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;


class AdminAuthorController extends Controller
{
    public function show()
    {
        $authors = Author::get();

        return view('admin.author_show', compact('authors'));
    }

    public function create()
    {
        return view('admin.author_create');
    }

    public function store(Request $request)
    {
        $author = new Author();

     


        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:authors',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        if($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);


            $now = time();
          $ext =  $request->file('photo')->extension();
            $final_name = 'author_photo_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_name);

            $author->photo = $final_name;
        }

        $author-> name = $request -> name;
        $author -> email = $request -> email;
        $author->password = Hash::make($request->password);
        $author -> token = '' ;
        $author -> save();

            $subject = 'your account is created to the website';
            $message='hi , your accaount is created succesfluy and now you can login to our system from the front and login page.Please go to this link : <br><br> ';
            $message.='<a href="'.route('login').'">';
            $message .= 'Click on this link';
            $message .= '</a>';

           
            Mail::to($request->email)->send(new Websitemail($subject,$message));
        

        return redirect()->route('admin_author_show')->with('success','data is added succesfuly');

    }


}
