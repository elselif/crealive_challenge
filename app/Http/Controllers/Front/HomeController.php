<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->get();
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->orderBy('id','desc')->where('show_on_home',1)->get();


        return view('front.home',compact('post_data','sub_category_data'));
    }
}
