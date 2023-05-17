<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Admin;

class PostController extends Controller
{
    public function detail($id)
    {




       $post_detail = Post::with('rSubCategory')->where('id',$id)->first();
       if($post_detail->author_id == 0)
       {
            $user_data = Admin::where('id',$post_detail->admin_id)->first();

       }
       else
       {

       }

       $new_value = $post_detail ->visitors + 1;
       $post_detail ->visitors = $new_value;
         $post_detail ->update();
       

       return view('front.post_detail', compact('post_detail','user_data'));
    }
}
