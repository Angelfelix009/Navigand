<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest:admin',['except'=>['showLoginForm','logout']]);
    }

    public function showLoginForm(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('auth.admin-login')->with($array);
    }
    public function password_reset(){
        return view('auth.admin-password-reset');
    }
    public function login(Request $request){
        //validate the form
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        //attempt t log use in
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        //if Unsuccessful, then redirect back to login form
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function login_process(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        //attempt t log use in
        if(Auth::guard('user')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember)){
            $category = Category::all();
            $array = array('category'=>$category);
            return redirect()->intended(route('dashboard'))->with($array);
        }
        //if Unsuccessful, then redirect back to login form
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/admin-login');
    }
    protected function loggedOut(Request $request)
    {
        //
    }
}
