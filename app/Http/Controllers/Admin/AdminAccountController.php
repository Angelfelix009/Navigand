<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //
        $user = Admin::where('role_id','>=',2)->Where('role_id','<=',5)->get();
        return view ('admin.admin.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = New Admin();
        return view ('admin.admin.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterAdminRequest $request)
    {
        //
        $user = new Admin();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=Hash::make($request->input('password'));
        $user->role_id=$request->input('user_role');
        $user->status =1;
        $data =$user->save();
        if($data == true){
            return back()->with('success','Admin Account Created Successfully');
        }
        else{
            return back()->with('error','Server Busy, Try again Later');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user= Admin::find($id);
        return view ('admin.admin.edit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = Admin::find($id);
        $user->status=$request->input('status');
        $data = $user->save();
        if ($data == true){
            return back()->with('success','Account Status Updated');
        }
        else{
            return back()->with('error','An error has occur while trying to update status, try again later');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Admin::find($id);
        $data->delete();
        return redirect('/admin')->with('success','Account Delete Successfully');
    }
}
