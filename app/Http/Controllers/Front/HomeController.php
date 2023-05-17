<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->get();


        return view('front.home',compact('post_data'));
    }
}
