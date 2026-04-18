<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Choice;
use App\Models\Category;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::paginate(10);
        return view('admin.dashboard.questions.index',compact('questions'));
    }
    public function create(){
        $categories=Category::all();
        return view('admin.dashboard.questions.add_question',compact('categories'));
    }
    public function store(Request $request){
        $request->validate([
            'category_id' => 'required|integer',
            'question' => 'required',
            'choices.*' => 'required',
            'recommendations.*' => 'required'
        ], [
            'choices.*.required' => 'Each choice is required.',
            'recommendations.*.required' => 'Each recommendation is required.',
            'category_id.required'=>'The category name is required'
        ]);
        $question=new Question;
        $question->category_id=$request->category_id;
        $question->question=$request->question;
        $saved=$question->save();
        if($saved){
            $questionid=$question->id;
            $choices=$request->input('choices');
            $recommendations=$request->input('recommendations');
            foreach($choices as $key=>$choice){
                // Save the choice and corresponding recommendation
                Choice::create([
                    'choice_text' => $choice,
                    'recommendations' => $recommendations[$key],
                    'question_id' => $questionid
                ]);
            }
        }
        return redirect()->route('questions')->with('msg','Question Added !');
    }
    public function delete($id){
        $question=Question::findorFail($id);
        $deleted=$question->delete();
        if($deleted){
            return redirect()->route('questions')->with('msg','Question Deleted !');
        }else{
            return redirect()->route('questions')->with('msg','Question Not Deleted !');

        }
    }
    public function edit($id){
        $questiondata=Question::find($id);
        $choicesdata=Choice::Where('question_id',$id)->get();
        $categories=Category::all();
        return view('admin.dashboard.questions.edit_question',compact('questiondata','choicesdata','categories'));
    }
    public function update(Request $request){
        $request->validate([
            'category_id' => 'required|integer',
            'question' => 'required',
            'choices.*' => 'required',
            'recommendations.*' => 'required',
            'choice2.*' => 'required',
            'recommendations2.*' => 'required',
        ], [
            'choices.*.required' => 'Each choice is required.',
            'recommendations.*.required' => 'Each recommendation is required.',
            'choice2.*.required' => 'Each choice is required.',
            'recommendations2.*.required' => 'Each recommendation is required.',
            'category_id.required'=>'The category name is required'
        ]);
        $id=$request->id;
        $data=Question::findorFail($id);
        $data->category_id=$request->category_id;
        $data->question=$request->question;
        $data->save();
        //$choices=$request->input('choices');
        //$recommendations=$request->input('recommendations');
        if($request->has('choices')){
            $choices=$request->input('choices');
            $recommendations=$request->input('recommendations');
            foreach ($choices as $key => $choice) {
                $findrec=Choice::find($request->answer_id[$key]);
                $findrec->choice_text=$choice;
                $findrec->recommendations=$request->recommendations[$key];
                $findrec->save();
            }
        }
        //dd($request->all());
        if ($request->has('choices2')) {
            $choices2=$request->input('choices2');
            $recommendations2=$request->input('recommendations2');
            foreach($choices2 as $key=>$choice2){
                // Save the choice and corresponding recommendation
                Choice::create([
                    'choice_text' => $choice2,
                    'recommendations' => $recommendations2[$key],
                    'question_id' => $id
                ]);
            }
        }
        return redirect()->route('questions')->with('msg','Question Updated !');
    }
}
