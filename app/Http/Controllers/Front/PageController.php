<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DeliveryInformation;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ReturnPolicy;
use App\Models\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
class PageController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        $product = Product::all()->Random()->limit(9)->get();
        $hottest = Product::orderby('order','desc')->first();
        $array = array('category'=>$category,'product'=>$product,'hottest'=>$hottest);
        return view('front.index')->with($array);
    }
    public function find_product(Request $request){
        $this->validate($request,[
            'category'=>'required',
            'search'=>'required',
        ]);
        $category = Category::all();
        if($request->input('category')=='All Categories'){
            $data = Product::where('name','LIKE','%'.$request->input('search').'%')->paginate(9);
            $title = 'All Category';
        }
        else{
            $b = Category::findorfail($request->input('category'));
            $data = Product::where('name','LIKE','%'.$request->input('search').'%')->where('category_id','=',$request->input('category'))->paginate(9);
            $title = $b->name;
        }
        $array = array('category'=>$category,'data'=>$data,'title'=>$title);
        return view('front.my-product')->with($array);
    }
    public function login(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('auth.login')->with($array);
    }
    public function login_process(Request $request){
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6',
        ]);
        //attempt t log use in
        if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=> $request->password],$request->remember)){
            $category = Category::all();
            $array = array('category'=>$category);
            return redirect()->intended(route('dashboard'))->with($array);
        }
        //if Unsuccessful, then redirect back to login form
        return redirect()->back()->withInput($request->only('email','remember'));
    }
    public function goods(){
        $category = Category::all();
        $goods = Product::findorfail($_REQUEST['id']);
        $array = array('category'=>$category,'data'=>$goods);
        return view('front.view-product')->with($array);
    }
    public function my_product($id){
        $category = Category::all();
        $title = Category::findorfail($id);
        $goods = Product::where('category_id','=',$id)->paginate(9);
        $array = array('category'=>$category,'data'=>$goods,'title'=>$title->name);
        return view('front.my-product')->with($array);
    }
    public function wishlist(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.wishlist')->with($array);
    }
    public function add_wishlist(Request $request){
        Cart::instance('saveForLater')->add($request->input('id'), $request->input('name'), $request->input('qty'), $request->input('price'))->associate('App\Models\Product');
        return redirect()->route('wishlist.index')->with('success','Item was added to your WishList!');
    }
    public function wishlist_saveforlater($id){
        $item = Cart::get($id);
        Cart::remove($id);
        Cart::instance('saveForLater')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\Product');
        return redirect()->route('cart.index')->with('success','Item saved into your Wishlist');
    }
    public function wishlist_destroy($id)
    {
        //
        Cart::instance('saveForLater')->remove($id);
        return redirect()->route('wishlist.index')->with('success','Item Removed Successfully');
    }
    public function switchToCart($id){
        $item = Cart::instance('saveForLater')->get($id);
        Cart::instance('saveForLater')->remove($id);
        Cart::add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\Product');
        return redirect()->route('wishlist.index')->with('success','Item moved into your Cart');
    }
    public function update_cart(Request $request){
        Cart::update($_REQUEST['id'], $_REQUEST['qty']);
        session()->flash('success_message','Quantity was updated successfully');
        return response()->json(['success'=>true]);
    }
    public function about(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.about')->with($array);
    }
    public function history(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.history')->with($array);
    }
    public function vision_mission(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.vision-mission')->with($array);
    }
    public function board(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.board')->with($array);
    }
    public function management(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.management')->with($array);
    }
    public function terms_conditions(){
        $category = Category::all();
        $term = Terms::findorfail(1);
        $array = array('category'=>$category,'terms'=>$term);
        return view('front.terms-conditions')->with($array);
    }
    public function delivery_information(){
        $category = Category::all();
        $data = DeliveryInformation::findorfail(1);
        $array = array('category'=>$category,'data'=>$data);
        return view('front.delivery-information')->with($array);
    }
    public function privacy_policy(){
        $category = Category::all();
        $data = PrivacyPolicy::findorfail(1);
        $array = array('category'=>$category,'data'=>$data);
        return view('front.privacy-policy')->with($array);
    }
    public function return_policy(){
        $category = Category::all();
        $data = ReturnPolicy::findorfail(1);
        $array = array('category'=>$category,'data'=>$data,'title'=>'Return Policy');
        return view('front.other-policy')->with($array);
    }
    public function contact(){
        $category = Category::all();
        $array = array('category'=>$category);
        return view('front.contact')->with($array);
    }
    public function contact_us(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required',
            'phone'=>'required',
        ]);
        $to =  'info@navigand.com';
        $email_subject = $request->input('subject') . ' From '. $request->input('name');
        $email_body = "New message received. ".
            " Here are the details:\n \n    
            NAME: " .$request->input('name')."\n.  
            SUBJECT:".$request->input('subject') ."\n.
            EMAIL ADDRESS:" .$request->input('email') ."\n. 
            PHONE NUMBER: ".$request->input('phone') ."\n. 
            MESSAGE: ".$request->input('message');
        //navigandng@gmail.com
        $headers = 'Cc: navigandng@gmail.com' . "\r\n";
        mail($to,$email_subject,$email_body,$headers);
        $category = Category::all();
        $array = array('category'=>$category,'success'=>'Message Sent');
        return view('front.message-sent')->with($array);
    }
    public function select_state(Request $request){
        $country = $_REQUEST['country'];
        $state = State::where('country_id','=',$country)->orderBy('name','asc')->get();
        if(count($state)>0){
            echo '<option value="">Select a State</option>';
            foreach ($state as $data){
                echo '<option value="'.$data->id.'">'.$data->name.'</option>';
            }
        }
        else{
            return '<option value="">No State Available at the Moment'.$country.'</option>';
        }
    }
    public function confirm_payment(){

    }
    public function frequently_asked_questions(){
        $data = Faq::all();
        $category = Category::all();
        $array=array('data'=>$data,'category'=>$category);
        return view('front.frequently-asked-questions')->with($array);
    }
    public function delete_cart(){
        $id = $_REQUEST['id'];
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success','Item Removed Successfully');
    }
}
