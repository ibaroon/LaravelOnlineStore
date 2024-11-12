<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;

class orderController extends Controller
{
    //

    public function index()
    {
        $data['route']='orders'; // for making sidebar class active
        $data['orders']=Order::with('user')->orderBy('created_at', 'DESC')->get();
      // return $data['orders']; //view result
        return  view('Admin.orders.index',$data);
    }

    public function changeStatus($orderId)
    {
        $order=Order::find($orderId);
        $order_products=OrderDetails::where('order_id',$orderId)->get();
        foreach ($order_products as $key => $value) 
        {
            $product_id= $value->product_id;
            $product = Product::find($product_id);
            $qty=$value->qty;
        if($order->status==0) 
        {$product->decrement('qty',  $qty);}
   else {$product->increment('qty',  $qty);}
      
        }

        if($order->status==0) 
        { $order->update(['status'=>1]);}
    else{ $order->update(['status'=>0]);}
       
       return $this->index();
    }
}
