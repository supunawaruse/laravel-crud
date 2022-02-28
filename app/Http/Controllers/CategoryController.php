<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function AllCategory() {
        $categories = Category::latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }
    
    public function AddCategory(Request $request) {
        
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255'
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();
        return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    public function GetCategory($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function UpdateCategory(Request $request,$id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id
        ]);
        return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }

    public function DeleteCategory($id){
        $update = Category::find($id)->forceDelete();

        return Redirect()->route('all.category')->with('success', 'Category Deleted Successfully');
    }
}
