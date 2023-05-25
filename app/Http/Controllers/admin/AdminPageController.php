<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_about',compact('page_data'));
    }

    public function about_update(Request $request)
    {

        $request->validate([
            'about_title' => 'required',
            'about_detail' => 'required'
        ]);

        $page = Page::where('id',1)->first();
        $page->about_title = $request->about_title;
        $page->about_detail = $request->about_detail;
        $page ->about_status = $request->about_status;
        $page->update();


        return redirect()->route('admin_page_about')->with('success','data is updated successfully');

    }


    public function login()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_login',compact('page_data'));
    }

    public function login_update(Request $request)
    {  
        $request->validate([
            'login_title' => 'required'
        ]);


        $page = Page::where('id',1) -> first();
        $page -> login_title = $request ->login_title;
        $page -> login_status = $request ->login_status;
        $page->update();

        return redirect()-> route('admin_page_login')->with('success','data is updated success');
        

    }
    public function contact()
    {
        $page_data = Page::where('id',1)->first();
        return view('admin.page_contact',compact('page_data'));
    }

    public function contact_update(Request $request)
    {  
        $request->validate([
            'contact_title' => 'required'
        ]);


        $page = Page::where('id',1) -> first();
        $page -> contact_title = $request ->contact_title;
        $page -> contact_detail = $request ->contact_detail;
        $page -> contact_map = $request ->contact_map;
        $page -> contact_status = $request ->contact_status;
        $page->update();

        return redirect()-> route('admin_page_contact')->with('success','data is updated success');
        

    }

}
