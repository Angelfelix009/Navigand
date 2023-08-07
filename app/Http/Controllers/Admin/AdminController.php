<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function change_password(){
        if(Auth::guard('admin')->user()->status==0){
            return view('admin.profile.account-activate');
        }
        else {
            if(Auth::guard('admin')->user()->lock_status==1){
                return view('admin.profile.account-lock');
            }
            else{
                return view('admin.profile.change-password');
            }
        }
    }
    public function update_password(ChangePasswordRequest $request)
    {
        if(Auth::guard('admin')->user()->status==0){
            return view('admin.profile.account-activate');
        }
        else {
            if (Auth::guard('admin')->user()->lock_status == 1) {
                return view('admin.profile.account-lock');
            }
            else{
                $id = Auth::guard('admin')->user()->id;
                $password = Auth::guard('admin')->user()->password;
                if (Hash::check($request['old_password'], $password)) {
                    $user = Admin::find($id);
                    $user->password = Hash::make($request['password']);
                    $data = $user->save();
                    if ($data == true) {
                        return back()->with('success', 'Password Changed Successfully');
                    }
                } else {
                    return back()->with('error', 'Please enter correct current password');
                }
            }
        }
    }
    public function change_picture(){
        return view('admin.profile.change-picture');
    }
    public function update_picture(Request $request){
        $this->validate($request,[
            'picture'=>'image|max:1200',
        ]);
        $id=Auth::guard('admin')->user()->id;
        //get file name with extension
        $fileNameWithExt=$request->file('picture')->getClientOriginalName();
        //get file name
        $filname=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
        //get extension
        $extension = $request->file('picture')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore=$filname.'_'.time().'.'.$extension;
        $user = Admin::find($id);
        $user->profile_photo_path=$fileNameToStore;
        $save = $user->save();
        if($save==true){
            $path = $request->file('picture')->storeAs('public/admin/'.$id.'/', $fileNameToStore);
            if($path){
                return redirect('/admin-home')->with('success','Account Profile Picture Updated');
            }
        }
    }
    public function change_role(Request $request){
        $this->validate($request,[
            'id'=>'required',
            'user_role'=>'required',
        ]);
        $data = Admin::findorfail($request->input('id'));
        $data->role_id=$request->input('user_role');
        $data->save();
        return redirect()->to('/admin')->with('success','Role Changed Successfully');
    }
}
