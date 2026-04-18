<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;

class SolutionController extends Controller
{
    public function index(){
        $solutions=Solution::orderBy('id','desc')->get();
        return view('admin.dashboard.solutions.index',compact('solutions'));
    }
    public function create(){
        return view('admin.dashboard.solutions.add_solution');
    }
    public function store(Request $request){
        $request->validate([
            'solution_name'=>'required',
            'initial_cost'=>'required|integer|lt:final_cost',
            'final_cost'=>'required|integer|gt:initial_cost'
        ],[
            'solution_name.required'=>'The solution name is required',
            'initial_cost.required'=>'The initial cost is required',
            'final_cost.required'=>'The final cost is required',
            'initial_cost.lt:final_cost'=>'The Initial Cost must be less Final Cost',
            'final_cost.gt:final_cost'=>'The Final Cost must be greater Initial Cost',
        ]
    );
        $sol=new Solution;
        $sol->solution_name=$request->solution_name;
        $sol->initial_cost=$request->initial_cost;
        $sol->final_cost=$request->final_cost;
        $saved=$sol->save();
        if($saved){
            return redirect('/solutions')->with('msg','Solution Added !');
        }else{
            return redirect('/solutions')->with('msg','Something Went Wrong !');
        }
    }
    public function edit($id){
        $data=Solution::findorFail($id);
        return view('admin.dashboard.solutions.edit_solution',compact('data'));
    }
    public function update(Request $request){
        $request->validate([
            'solution_name'=>'required',
            'initial_cost'=>'required|integer|lt:final_cost',
            'final_cost'=>'required|integer|gt:initial_cost'
            ],[
                'solution_name.required'=>'The solution name is required',
                'initial_cost.required'=>'The initial cost is required',
                'final_cost.required'=>'The final cost is required',
                'initial_cost.lt:final_cost'=>'The Initial Cost must be less Final Cost',
                'final_cost.gt:final_cost'=>'The Final Cost must be greater Initial Cost',
            ]
        );
        $sol=Solution::findorFail($request->id);
        $sol->solution_name=$request->solution_name;
        $sol->initial_cost=$request->initial_cost;
        $sol->final_cost=$request->final_cost;
        $saved=$sol->save();
        if($saved){
            return redirect('/solutions')->with('msg','Solution Updated !');
        }else{
            return redirect('/solutions')->with('msg','Something Went Wrong !');
        }
    }
    public function delete($id){
        $solution=Solution::findorFail($id);
        $deleted=$solution->delete();
        if($deleted){
            return redirect()->route('solutions')->with('msg','Solution Deleted !');
        }else{
            return redirect()->route('solutions')->with('msg','Solemthing Went Wrong !');

        }
    }

}
