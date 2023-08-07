<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if(Auth::guard('admin')->user()->status==0){
            return view('admin.profile.account-activate');
        }
        else {
                $user = User::all();
                $staff = Admin::all();
                $data = array('user'=>$user,'staff'=>$staff);
                return view('admin.dashboard')->with($data);

            }
        }
}
