<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryInformation;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\ReturnPolicy;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FootNoteController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function terms(){
        $data = Terms::findorfail(1);
        return view('admin.footnote.terms')->with('terms',$data);
    }
    public function privacy(){
        $data = PrivacyPolicy::findorfail(1);
        return view('admin.footnote.privacy')->with('data',$data);
    }
    public function delivery(){
        $data = DeliveryInformation::findorfail(1);
        return view('admin.footnote.delivery')->with('data',$data);
    }
    public function return_policy(){
        $data = ReturnPolicy::findorfail(1);
        return view('admin.footnote.return-policy')->with('data',$data);
    }
    public function post_terms(Request $request, $id){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $data = Terms::findorfail($id);
        $data->content=$request->input('body');
        $data->admin_id=Auth::guard('admin')->user()->id;
        $data->save();
        return redirect()->to('update-terms')->with('success','Terms and Condition Updated Successfully');
    }
    public function post_policy(Request $request, $id){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $data = PrivacyPolicy::findorfail($id);
        $data->content=$request->input('body');
        $data->admin_id=Auth::guard('admin')->user()->id;
        $data->save();
        return redirect()->to('update-privacy')->with('success','Privacy Policy Updated Successfully');
    }
    public function post_delivery(Request $request, $id){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $data = DeliveryInformation::findorfail($id);
        $data->content=$request->input('body');
        $data->admin_id=Auth::guard('admin')->user()->id;
        $data->save();
        return redirect()->to('update-delivery')->with('success','Delivery Information Updated Successfully');
    }
    public function post_return(Request $request, $id){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $data = ReturnPolicy::findorfail($id);
        $data->content=$request->input('body');
        $data->admin_id=Auth::guard('admin')->user()->id;
        $data->save();
        return redirect()->to('update-return-policy')->with('success','Returned Policy Updated Successfully');
    }
    public function add_faq(){
        return view('admin.footnote.add-faq');
    }
    public function faq_save(Request $request){
        $this->validate($request,[
            'title'=>'required|max:255',
            'body'=>'required',
        ]);
        $faq= new Faq();
        $faq->title = $request->input('title');
        $faq->body = $request->input('body');
        $faq->admin_id = Auth::guard('admin')->user()->id;
        $faq->save();
        return redirect()->route('faq.create')->with('success','Your Question has been Stored');
    }
}
