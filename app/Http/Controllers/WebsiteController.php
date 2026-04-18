<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Question;
use Auth;
use Str;
use App\Models\User;
use Hash;
use App\Models\ExtraQuestion;
use App\Models\ExtraResponse;

class WebsiteController extends Controller
{
    public function index(){
        $questions=Question::with('choices')->get();
        return view('user/dashboard',compact('questions'));
    }
    public function store(Request $request)
    {
        // Ensure the user is authenticated
        $userId = Auth::user()->id;

        // Validate and sanitize input
        $validated = $request->validate([
            'questions.*' => 'required|integer',
            'answers.*' => 'required|integer', // Adjust validation rules as needed
        ]);

        // Prepare the data for storing
        $responses = [];
        
        // Check if there are questions and answers
        if ($request->has('questions') && $request->has('answers')) {
            $questions = $request->input('questions');
            $answers = $request->input('answers');
            $token=Str::random(32);
            foreach ($questions as $key => $questionId) {
                $responses[] = [
                    'user_id' => $userId,
                    'question_id' => $questionId,
                    'choice_id' => $answers[$key], // Assuming 'choice_id' is the column for storing answers
                    'unique_token' => $token // Optional: if you want a unique token for each entry
                ];
            }
        }

        //dd($responses);

        // Insert all responses into the database
        try {
            Response::insert($responses);
            return redirect('/userresponses')->with('msg', 'Responses Submitted Successfully');
        } catch (Exception $e) {
            return redirect('/userdashboard')->with('msg', 'Something Went Wrong');
        }
    }
    public function responses(){
        $question_count=Question::count();
        $user_id=Auth::user()->id;
        $responses=Response::where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->limit($question_count)
        ->with('question','choice')
        ->get();
        return view('user.responses',compact('responses'));
    }
    public function profile(){
        $data=Auth::user();
        return view('user.profile',compact('data'));
    }
    public function updateprofile(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'nullable|mimes:jpg,png'
        ]);
        $user_id=Auth::user()->id;
        $data=User::find($user_id);
        $data->name=$request->name;
        if(isset($request->password) && !empty($request->password)){
            $data->password=Hash::make($request->password);
        }
        if($request->has('image')){
            $image=$request->file('image');
            $destination_path="user/img/";
            $fileName=$image->getClientOriginalName();
            $image->move($destination_path,$fileName);
            $data->image=$fileName;
        }
        $saved=$data->save();
        if($saved){
            //echo"Data Saved";
            return redirect('/userprofile')->with('msg','Profile Updated');
        }else{
            return redirect('/userprofile')->with('msg','Something Went Wrong');
        }
    }
    public function extraquestions(){
        $questions=ExtraQuestion::all();
        return view('user.extraquestions',compact('questions'));
    }
    public function extraquestionresponses(Request $request){

        //$questions=ExtraQuestion::all();
        //return view('user.extraquestions',compact('questions'));
        if($request->has('answers') && $request->has('questions') && $request->input('user_id'))
        {
            $questions = $request->input('questions');
            $answers = $request->input('answers');
            $user_id = $request->input('user_id');
            $token=Str::random(32);
            foreach ($questions as $key => $questionId) {
                $responses[] = [
                    'user_id' => $user_id,
                    'question_id' => $questionId,
                    'answer' => $answers[$key], // Assuming 'choice_id' is the column for storing answers
                    'unique_token' => $token // Optional: if you want a unique token for each entry
                ];
            }

            try {
                ExtraResponse::insert($responses);
                return redirect('/extraquestions')->with('msg', 'Responses Submitted Successfully');
            } catch (Exception $e) {
                return redirect('/extraquestions')->with('msg', 'Something Went Wrong');
            }

        }
    }
}
