<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dimension;
use App\Models\Category;
class DimensionController extends Controller
{
    public function index(){
        $dimensions=Dimension::all();
        return view('admin.dashboard.dimensions.index',compact('dimensions'));
    }
    public function create(){
        $categories=Category::all();
        return view('admin.dashboard.dimensions.add_dimension',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id'=>'required|integer',
            'initial_range'=>'required|integer',
            'final_range'=>'required|integer',
            'color'=>'required',
            'risk_type'=>'required',
            'description'=>'required',
        ]);
        $dimension=new Dimension;
        $dimension->category_id=$request->category_id;
        $dimension->min_level=$request->initial_range;
        $dimension->max_level=$request->final_range;
        $dimension->color=$request->color;
        $dimension->risk=$request->risk_type;
        $dimension->description=$request->description;
        $saved=$dimension->save();
        if($saved){
            return redirect()->route('dimensions')->with('msg','Dimension Added');
        }else{
            return redirect()->route('dimensions')->with('msg','Dimension Not Added');
        }
    }
    public function edit($id){
        $data=Dimension::findorFail($id);
        $categories=Category::all();
        return view('admin.dashboard.dimensions.edit_dimension',compact('categories','data'));
    }
    public function update(Request $request){
        $request->validate([
            'category_id'=>'required|integer',
            'initial_range'=>'required|integer',
            'final_range'=>'required|integer|gt:initial_range',
            'color'=>'required',
            'risk_type'=>'required',
            'description'=>'required',
        ],
        [
            'final_range.gt:initial_range'=>'The Final Range must be greater than Initial Range'
        ]
    );
        $dimension=Dimension::findorFail($request->id);
        $dimension->category_id=$request->category_id;
        $dimension->min_level=$request->initial_range;
        $dimension->max_level=$request->final_range;
        $dimension->color=$request->color;
        $dimension->risk=$request->risk_type;
        $dimension->description=$request->description;
        $saved=$dimension->save();
        if($saved){
            return redirect()->route('dimensions')->with('msg','Dimension Updated');
        }else{
            return redirect()->route('dimensions')->with('msg','Dimension Not Updated');
        }
    }

    public function delete($id){
        $data=Dimension::findorFail($id);
        $deleted=$data->delete();
        if($deleted){
            return redirect()->route('dimensions')->with('msg','Dimension Deleted !');
        }else{
            return redirect()->route('categories')->with('msg','Dimension Not Deleted');      
        }
    }
}
