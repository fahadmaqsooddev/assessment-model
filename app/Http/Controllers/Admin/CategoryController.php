<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);

        
        return view('admin.dashboard.categories.index',compact('categories'));
    }
    public function create(){
        return view('admin.dashboard.categories.add_category');
    }
    public function store(Request $request){
        $request->validate([
            'categoryname'=>'required|unique:categories,name'
        ]);
        $category=new Category;
        $category->name=$request->categoryname;
        $saved=$category->save();
        if($saved){
            return redirect()->route('categories')->with('msg','Category Created');
        }else{
            return redirect()->route('categories')->with('msg','Category Not Created');
        }
    }
    public function edit($id){
        $category=Category::findorFail($id);
        return view('admin.dashboard.categories.edit_category',compact('category'));
    }
    public function delete($id){
        $data=Category::find($id);
        $deleted=$data->delete();
        if($deleted){
            return redirect()->route('categories')->with('msg','Category Deleted');    
        }else{
            return redirect()->route('categories')->with('msg','Category Not Deleted');      
        }
    }
    public function update(Request $request){
        //dd($request->all());
        // Find the category by ID
        $data = Category::find($request->id);

        // Validate the category name, ignoring the current category ID
        $request->validate([
            'categoryname' => [
                'required',
                Rule::unique('categories', 'name')->ignore($request->id)
            ],
        ]);
        // Update the category name
        $data->name = $request->categoryname;
        // Save the category and check if the save was successful
        $saved = $data->save();
        if($saved){
            return redirect()->route('categories')->with('msg', 'Category Updated');
        }else{
            return redirect()->route('categories')->with('msg', 'Category Not Updated');
        }
    }


}
