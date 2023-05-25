<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->get();
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->orderBy('id','desc')->where('show_on_home',1)->get();

        $category_data = Category::orderBy('category_order','asc')->get();

        return view('front.home',compact('post_data','sub_category_data','category_data'));
    }

    public function get_subcategory_by_category($id)
    {
        $sub_category_data =  SubCategory::where('category_id',$id)->get();
        $response = "<option value=''>Select Subcategory</option>";
        foreach($sub_category_data as $item)
        {
            $response .= '<option value = "'.$item->id.'">'.$item->sub_category_name.'</option>';
        }

        return response()->json(['sub_category_data'=>$response]);

    }


    public function search(Request $request)
    {
      $post_data=Post::with('rSubCategory')->orderBy('id','desc');

        if($request->text_item!='')
        {
            $post_data = $post_data ->where('post_title','like','%' .$request->text_item.'%');
        }

        if($request->sub_category!='')
        {
            $post_data = $post_data ->where('sub_category_id',$request->sub_category);
        }

        $post_data = $post_data->paginate(3);

        return view('front.search_result',compact('post_data'));

    }

}
