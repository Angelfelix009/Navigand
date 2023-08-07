<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function order(){
        if(Auth::guard('admin')->user()->status==0){
            return view('admin.profile.account-activate');
        }
        else {
            $data = Order::where('order_status','=','ongoing')->where('status','=','completed')->orderby('created_at','asc')->get();
            $array = array('order'=>$data);
            return view ('admin.order.index')->with($array);
        }
    }
    public function order_details(){
        $id = $_REQUEST['id'];
        $data = Order::find($id);
        return view('admin.order.order-details',compact('data'));
    }
    public function complete_order(){
        $id = $_REQUEST['id'];
        $data = Order::find($id);
        $data->order_status='completed';
        $data->save();
        return back()->with('success','Order Mark as Completed Successfully');
    }
}
