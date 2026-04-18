<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;
class LogoController extends Controller
{
    public function index(){
        return view('admin.dashboard.logo.index');
    }
    public function update(Request $request){
        //dd($request->all());
        $request->validate([
            'image'=>'required|mimes:jpg,png'
        ]);

        if($request->has('image')){
            // $data=$request->file('image');
            // dd($data);
            $image=$request->file('image');
            $destination_path="admin/dist/img/";
            $fileName=$image->getClientOriginalName();
            $image->move($destination_path,$fileName);
            $logo=new Logo;
            $logo=Logo::first();
            $logo->name=$fileName;
            $saved=$logo->save();
            if($saved){
                return redirect('/logo')->with('msg','Logo Updated');
            }
        }

    }
}
