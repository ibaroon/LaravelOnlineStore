<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class WebSiteController extends Controller
{
    public function index(){
        $data['route']='index';
        $data['cats']= Category::where(['is_popular'=>1,'is_showing'=>1])->select('id','name','meta_title','meta_description','image','slug')->get();
        $data['products']= Product::where('trend',1)->select('id','meta_title','meta_description','selling_price','price','image','slug','category_id','qty')->get(); // we add category_id to ensure relation betweeb product and category
        
        // if(Auth::check())
        // {
        //   $data['cart_items']=Cart::where('user_id',Auth::id())->get(); 
        //   $data['cart_notif']=count($data['cart_items']);
        // }
        // else{$data['cart_notif']=0;} // cart notification

         //return count($data['cart_items']);
         if(Auth::check())
        {$cart_products=Cart::where('user_id',Auth::id())->get();
            $cartCount=count($cart_products);
            session(['cartCount' => $cartCount]);}
        else
        {session(['cartCount' => 0]);}
        return view('website.index',$data);
    }

    public function getCates()
    { $data['route']='cats';
      $data['cats']= Category::where('is_showing',1)->get();
      return view('website.cats',$data);
    }

    public function getProducts()
    { $data['route']='products';
      $data['products']= Product::with('category')->where('status',1)->get();
      //$data['product']=Product::with('category')->where('slug',$productSlug)->where('status',1)->first();
      return view('website.products',$data);
    }

    public function getCateBySlug($slug)
    { $data['route']='cats'; 
      //check for api validation
      if(Category::where('slug',$slug)->exists())
        { $data['cat']=Category::with('products')->where('slug',$slug)->where('is_showing',1)->first();
          // get all category details with all products
          return view('website.cat',$data);
        } 
      else
        {return redirect('/')->with('error',trans('feedback_messages.Category_Slug_Not_Found'));}

    }

    public function getProductBySlug($CatSlug,$productSlug)
    { $data['route']='products'; 
      //check for api validation
      if(Category::where('slug',$CatSlug)->exists())
        { 

         if(Product::where('slug',$productSlug)->exists())
        { $data['product']=Product::with('category')->where('slug',$productSlug)->where('status',1)->first();
          $data['keywords']=explode(',',$data['product']->meta_keywords);
          //return $data['keywords'];
          return view('website.product',$data);
         //return $data;
        } 
      else
        {return redirect('/')->with('error',trans('feedback_messages.Product_Slug_Not_Found'));}

        } 
      else
        {return redirect('/')->with('error',trans('feedback_messages.Category_Slug_Not_Found'));}

    }
}
