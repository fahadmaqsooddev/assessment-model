<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use App\Models\ExtraQuestion;
class DashboardController extends Controller
{
    public function index(Request $request){
        $categorycount=Category::all()->count();
        $questioncount=Question::all()->count();
        $extraquestioncount=Question::all()->count();
        return view('admin.dashboard.index',compact(['categorycount','questioncount','extraquestioncount']));    
    }
}
