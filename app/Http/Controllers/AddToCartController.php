<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class AddToCartController extends Controller
{
    public function index()
    {
    $data['route']="cart";
    $data['cart_products']=Cart::where('user_id',Auth::id())->get();
    $cartCount=count($data['cart_products']);
   
         session(['cartCount' => $cartCount]);
   
    return view('website.cart.index',$data);
    }

    public function addToCart(Request $request)
    {
        $product_id=$request->product_id;
        $qty=$request->qty;
        $user_id=Auth::id();

        if(Auth::check())
        { $product=Product::where('id',$product_id)->exists();

            if($product)
            {
                $product_name=Product::findOrFail($product_id);
                if(Cart::where('product_id',$product_id)->where('user_id',$user_id)->exists()  )
                {
                    return response()->json(['msg'=> '[ '.$product_name->name . '] - already in your Cart']); 

                        

                }else{ 
                //     Cart::create([
                //     'product_id'=>$product_id,
                //     'qty'=>$qty,
                //     'user_id'=>$user_id
                // ]); 
                $cart = new Cart();
                $cart->product_id=$product_id;
                $cart->user_id=$user_id;
                $cart->qty=$qty;
                $cart->save();
                $cart_products=Cart::where('user_id',Auth::id())->get();
                $cartCount=count($cart_products);
                session(['cartCount' => $cartCount]);
                return response()->json(['msg'=>'[ '.$product_name->name.' ] -  Added to Cart Successfully']);
            }

            }else{ return response()->json(['msg'=>'Product Not Found']);}
           

        }else{ return response()->json(['msg'=>'Login first']);  }

    }


    public function destroy(Cart $cart)
    {
         $cart->delete();
         toastr()->success(trans("feedback_messages.success_delete"));
         $cart_products=Cart::where('user_id',Auth::id())->get();
         $cartCount=count($cart_products);
         session(['cartCount' => $cartCount]);
         return redirect()->route('cart.index');
       
    }

    public function update(Request $request)
    {

        if(Auth::check())
        {
            if(Cart::where('id',$request->id)->exists()){
                $cart=Cart::where('id',$request->id)->first();
                $cart->update(['qty'=>$request->qty]);

    
            }
            return response()->json(['msg'=>'Cart Updated']);
            
        }
       //return $request;

    }

}
