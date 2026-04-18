<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\User;
class ProfileController extends Controller
{
    public function index(){
        $user_id=Auth::user()->id;
        $data=User::find($user_id);
        return view('admin.dashboard.profile.index',compact('data'));
    }
    public function update(Request $request){
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
            $destination_path="admin/dist/img/";
            $fileName=$image->getClientOriginalName();
            $image->move($destination_path,$fileName);
            $data->image=$fileName;
        }
        $saved=$data->save();
        if($saved){
            //echo"Data Saved";
            return redirect('/profile')->with('msg','Profile Updated');
        }else{
            return redirect('/profile')->with('msg','Something Went Wrong');
        }
    }
}
