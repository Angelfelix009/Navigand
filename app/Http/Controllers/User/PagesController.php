<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BillingAddress;
use App\Models\Category;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function transaction_verification(){
        $curl = curl_init();
        $id = $_REQUEST['transaction_id'];
        $status = $_REQUEST['status'];
        $ref = $_REQUEST['tx_ref'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/$id/verify",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: FLWSECK_TEST-d6d2f15df70602246a5c43f0f5ae7f4e-X"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        //echo $response.'<br>';
        //echo '<br><br><br>';
        //echo '<h1>Start</h1>';
        $arr = json_decode($response, true);
        foreach($arr as $key => $value) {
            if($key == 'data'){
                $content = html_entity_decode($value['meta']['content']);
                $json = json_decode($content,true);
                foreach ($json as $key=>$k) {
                    $company_name =$value['meta']['company_name'];
                    $country =$value['meta']['country'];
                    $state =$value['meta']['state'];
                    $city =$value['meta']['city'];
                    $address =$value['meta']['address'];
                    $phone =$value['meta']['phone'];
                    // $order_note =$value['meta']['order_note'];
                    $reference_id =$_REQUEST['tx_ref'];
                    $trans_id =$_REQUEST['transaction_id'];
                    $status =$_REQUEST['status'];
                    $cart_content =$k[0]['name'];
                    $product_qty =$k[0]['qty'];
                    $product_price=$k[0]['price'];
                    $order_qty =$k[0]['qty'];
                    $amount_paid =$value['charged_amount'];
                    $total_bill =$value['amount'];

                    $order=new Order();
                    $order->user_id=Auth::user()->id;
                    $order->reference_id=$reference_id;
                    $order->trans_id=$trans_id;
                    $order->status=$status;
                    $order->cart_content=$cart_content;
                    $order->product_qty=$product_qty;
                    $order->order_qty=$order_qty;
                    $order->order_note='s';
                    $order->price=$product_price;
                    $order->amount_paid=$amount_paid;
                    $order->total_bill=$total_bill;
                    $order->save();

                    $billing = new BillingAddress();
                    $billing->user_id=Auth::user()->id;
                    $billing->order_id=$order->id;
                    $billing->company_name=$company_name;
                    $billing->country=$country;
                    $billing->state=$state;
                    $billing->city=$city;
                    $billing->address=$address;
                    $billing->phone=$phone;
                    $billing->order_note='ss';
                    $billing->save();


                }
                Cart::destroy();
                $category = Category::all();
                $array=array('category'=>$category);
                return view('user.payment-success')->with($array);
            }
            else{

            }
        }
    }
    public function order(){
        $category = Category::all();
        $array=array('category'=>$category);
        return view('user.my-order')->with($array);
    }
}
