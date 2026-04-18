<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Question;
use Hash;
use Auth;
class SigninController extends Controller
{
    public function signin(){
        return view('login');
    }
    public function login(Request $request){
        //dd($request->all());
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($credentials)){
            $userinfo=Auth::user();
            if($userinfo->is_verified == 1){
                if($userinfo->role == 'user'){
                    return redirect('/userdashboard');
                }else{
                    return redirect('/userlogin')->with('msg','Something Went Wrong');
                }
            }else{
                return redirect('/userlogin')->with('msg','Your Email is not verified');    
            }
        }else{
            return redirect('/userlogin')->with('msg','Invalid Email or Password');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/userlogin');
    }
    
}
