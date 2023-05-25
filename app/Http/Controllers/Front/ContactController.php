<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Page;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;




class ContactController extends Controller
{
    public function index()
    {
        $page_data =  Page::where('id',1)->first();
        return view('front.contact' , compact('page_data'));
    }

    public function send_email(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if(!$validator->passes())
        {
            return response()->json(['code' =>0,'error_message' =>$validator->errors()->toArray()]);
        }

        else
        {
            $admin_data = Admin::where('id',1)->first();
            $subject = 'contact from email';
            $message='visitor message detail: <br>';
            $message .= '<b>visitor name :</b> '.$request->name.'<br>';
            $message .= '<b>visitor email:</b> '.$request->email.'<br>';
            $message .= '<b>visitor message: </b>'.$request->message;
            Mail::to($admin_data->email)->send(new Websitemail($subject,$message));
            
            return response()->json((['code'=>1,'success_message'=> 'Email is sent!']));
        }
    }

}
