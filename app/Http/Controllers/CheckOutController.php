<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use DB;

class CheckOutController extends Controller
{
    //
    public function index()
    {
        $data['route']="cart";
        $data['cart_products']=Cart::where('user_id',Auth::id())->get();
        return view('website.checkout.index',$data);
    }

    public function proceed(Request $request)
    {
        $data['route']="cart";
// inserting into order tabel
if($request->sum>0)
{
             $order = new Order();
             $order->total_amount=$request->sum;
             $order->user_id=Auth::id();
             $order->status=0;
             $order->payment_method=$request->PaymentMethod;
             $order->save();

$order_id=$order->id;// last index of order table
$data['order_id']=$order_id;
$cart_products=Cart::where('user_id',Auth::id())->get();

foreach ($cart_products as $key => $value) {
   $product_id= $value->product_id;
   $price=$value->product->selling_price;
   $qty=$value->qty;

   // inserting into orderDetais tabel
   $order_details = new OrderDetails();
             $order_details->order_id=$order_id;
             $order_details->product_id=$product_id;
             $order_details->price=$price;
             $order_details->qty=$qty;
             $order_details->save();

    // echo $value->product_id;
    // echo " - ".$value->product->selling_price;  // display all records as array of object 
    // echo " - ".$value->qty ."<br>"; 
}
//$cart_products->delete();
DB::table('carts')->where('user_id', '=', Auth::id())->delete(); //use DB;
session(['cartCount' => 0]);

if($request->PaymentMethod==1)
    {return view('website.payment.index',$data);}
else
{
    $data['route']="cart";
    $data['cart_products']=Cart::where('user_id',Auth::id())->get();
    toastr()->success(trans("feedback_messages.request_complete"));
    return view('website.cart.index',$data);}
}
else 
{
    $data['route']="cart";
    $data['cart_products']=Cart::where('user_id',Auth::id())->get();
    toastr()->error(trans("feedback_messages.checkout_error"));
    return view('website.cart.index',$data);
}
//return $cart_products;
    }

    public function orders()
    {
        $data['route']="order";
        $data['orders']=Order::with('orderDetails')->where('user_id',Auth::id())->orderBy('created_at', 'DESC')->get();
       //return $data;
        return view('website.orders.index',$data);
    }
}
