<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class AdminSubCategoryController extends Controller
{
    public function show()
    {
        $sub_categories = SubCategory::with('rCategory')->orderBy('sub_category_order','asc')->get();
        return view('admin.sub_category_show.sub_category_show',compact('sub_categories'));
    }  
    public function create()
    {
        $categories = Category::orderBy('category_order','asc')->get();
        return view('admin.sub_category_create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);

        $sub_category = new SubCategory;
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category-> show_on_menu = $request->show_on_menu;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();

        return redirect()->route('admin_sub_category_show')->with('success','Sub Category created successfully');
    }

    public function edit($id)
    {
        $categories = Category::orderBy('category_order','asc')->get();
        $sub_category_single = SubCategory::where('id',$id)->first();

        return view('admin.sub_category_edit',compact('categories','sub_category_single'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sub_category_name' => 'required',
            'sub_category_order' => 'required',
        ]);

        $sub_category = SubCategory::find($request->id);
        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->sub_category_order = $request->sub_category_order;
        $sub_category-> show_on_menu = $request->show_on_menu;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();

        return redirect()->route('admin_sub_category_show')->with('success','Sub Category updated successfully');
    }

    public function delete($id)
    {
        $sub_category_single = SubCategory::where('id',$id)->first();
        $sub_category_single->delete();

        return redirect()->route('admin_sub_category_show')->with('success','Sub Category deleted successfully');
    }
}
