<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExtraQuestion;

class ExtraQuestionController extends Controller
{
    public function index(){
        $extraquestions=ExtraQuestion::paginate(10);
        return view('admin.dashboard.extraquestions.index',compact('extraquestions'));
    }
    public function create(){
        return view('admin.dashboard.extraquestions.add_extra_question');
    }
    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'question'=>'required',
            'feedback'=>'required',
            'question_type'=>'required',
        ]);
        $qt=$request->question_type;
        
        if ($qt === 'range') {
            $request->validate([
                'min_range' => 'required|integer|min:0',
                'max_range' => 'required|integer|gte:min_range|min:1',
            ], [
                'min_range.required' => 'The minimum range is required for range type questions.',
                'max_range.required' => 'The maximum range is required for range type questions.',
                'max_range.gt' => 'The maximum range must be greater than the minimum range.',
            ]);
        }
        $extraquestion=new ExtraQuestion;
        $extraquestion->question=$request->question;
        $extraquestion->question_type=$qt;
        $extraquestion->feedback=$request->feedback;
        if($qt=='range'){
            $extraquestion->min_range=$request->min_range;
            $extraquestion->max_range=$request->max_range;
        }
        $saved=$extraquestion->save();
        if($saved){
            return redirect('/extra-questions')->with('msg','Extra Question Added !');
        }
    }
    public function delete($id){
        $extraquestion=ExtraQuestion::findorFail($id);
        $deleted=$extraquestion->delete();
        if($deleted){
            return redirect()->route('extra-questions')->with('msg','Extra Question Deleted !');
        }else{
            return redirect()->route('extra-questions')->with('msg','Extra Question Not Deleted !');

        }
    }
    public function edit($id){
        $extraquestion=ExtraQuestion::findorFail($id);
        return view('admin.dashboard.extraquestions.edit_extra_question',compact('extraquestion'));
    }
    public function update(Request $request){
        $request->validate([
            'question'=>'required',
            'feedback'=>'required',
            'question_type'=>'required',
        ]);
        $qt=$request->question_type;
        if ($request->question_type == 'range') {
            $request->validate([
                'min_range' => 'required|integer|min:0',
                'max_range' => 'required|integer|gte:min_range|min:1',
            ], [
                'min_range.required' => 'The minimum range is required for range type questions.',
                'max_range.required' => 'The maximum range is required for range type questions.',
                'max_range.gt' => 'The maximum range must be greater than the minimum range.',
            ]);
        }
        $extraquestion=ExtraQuestion::find($request->id);
        $extraquestion->question=$request->question;
        $extraquestion->question_type=$qt;
        $extraquestion->feedback=$request->feedback;
        if($qt){
            $extraquestion->min_range=$request->min_range;
            $extraquestion->max_range=$request->max_range;
        }
        $saved=$extraquestion->save();
        if($saved){
            return redirect('/extra-questions')->with('msg','Extra Question Updated !');
        }   
    }
}
