<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
class LoginController extends Controller
{
    public function index(){
        return view('admin/login');
    }
    public function store(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            return redirect('/dashboard');
        }else{
            return redirect('/login')->with('msg','Invalid Email or Password Combination');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
