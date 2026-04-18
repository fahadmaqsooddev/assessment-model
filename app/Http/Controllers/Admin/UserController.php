<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
class UserController extends Controller
{
    public function index(){
        //dd(Hash::make(12));
        $user_id=Auth::user()->id;
        $users=User::where('id','<>',$user_id)->paginate(10);
        return view('admin.dashboard.users.index',compact('users'));
    }
}
