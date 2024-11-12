<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data['route']='products'; // for making sidebar class active
       // $data['products']=Category::select('id','name','image','is_showing','is_popular')->get();
        $data['products']=Product::select('id','name','category_id','image','trend','status','qty','tax','price','selling_price')->get();
        //return $data;
        return  view('admin.Product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route']='products';// for making sidebar class active
        $data['cats']=Category::select('id','name')->get();
        
        return  view('Admin.Product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        {
            // to display form values as json object
             // return $request; 
             try{
                 $validate = $request->validated();
     
                 $product= new Product();
                 $product->category_id=$request->category_id ;
                 $product->name=['ar'=>$request->Arabic_Name	,'en'=>$request->English_Name];
                 $product->short_description=['ar'=>$request->Arabic_Short_Desc ,'en'=>$request->English_Short_Desc];
                 $product->description=['ar'=>$request->Arabic_Desc ,'en'=>$request->English_Desc];
                 $product->slug=$request->Slug ;
                 $product->status=$request->Status ? '1' : '0' ;
                 $product->trend=$request->Popular ? '1' : '0' ;
     
                 $product->price=$request->Price ;
                 $product->selling_price=$request->Selling_Price ;
                 $product->qty=$request->Qty ;
                 $product->tax=$request->Tax ;
                 $product->meta_title=$request->Meta_Title ;
                 $product->meta_description=['ar'=>$request->Arabic_Meta_Desc ,'en'=>$request->English_Meta_Desc	];
                 $product->meta_keywords=$request->Key_Words	;	
                
              
     
                 if($request->hasFile('Image'))
                 {
                     $img= $request->file('Image')->store('/public/src/assets/img/uploads/products','public');
                     //php artisan storage:link
                 }
     
                 else
                 {   $img="no";   }
     
                 $product->image=$img	;	
                
                 $product->save();
                 toastr()->success(trans("feedback_messages.success_save"));
                 return redirect()->route('products.index');
     
             }catch(\Exception $e){
                  return redirect()->back()->with('error_catch',$e->getMessage());
             }
         }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data['product']=$product;
        $data['route']='products';
        return  view('Admin.Product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data['product']=$product; // assigning the returned product to data
        $data['cats']=Category::select('id','name')->get();
        $data['route']='products';// for making sidebar class active
        return  view('Admin.Product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
        $validated=$request->validated();
        try{
            $validated=$request->validated();

            $img =$product->image; // old img
            if($request->hasFile('Image'))
            {   if($img!="no") {Storage::disk('public')->delete($img);}
                $img= $request->file('Image')->store('/public/src/assets/img/uploads/products','public'); // new img
                //php artisan storage:link  
            }
    
            $product->update([
            
            'category_id'=>$request->category_id ,
            'name'=>['ar'=>$request->Arabic_Name	,'en'=>$request->English_Name],
            'short_description'=>['ar'=>$request->Arabic_Short_Desc	,'en'=>$request->English_Short_Desc],
            'description'=>['ar'=>$request->Arabic_Desc ,'en'=>$request->English_Desc],
            'price'=>$request->Price ,
            'selling_price'=>$request->Selling_Price	 ,
            'qty'=>$request->Qty ,
            'tax'=>$request->Tax ,


            'meta_title'=>['ar'=>$request->Arabic_Meta_Title ,'en'=>$request->English_Meta_Title],
            'meta_description'=>['ar'=>$request->Arabic_Meta_Desc ,'en'=>$request->English_Meta_Desc],

            'slug'=>$request->Slug ,
            'status'=>$request->Status ? '1' : '0' ,
            'trend'=>$request->Popular ? '1' : '0' ,
            'meta_title'=>$request->Meta_Title		,
            'meta_keywords'=>$request->Key_Words	,
            
            'image'=>$img,

            ]);
            toastr()->success(trans("feedback_messages.success_update"));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
       //return $product->image;
       Storage::disk('public')->delete($product->image);
       $product->delete();
       toastr()->success(trans("feedback_messages.success_delete"));
           return redirect()->route('products.index');
    }

    public function imgDestroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);
        
        try{
        $product->update(['image'=>'no' ]);
            toastr()->success(trans("feedback_messages.success_update"));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
       }
    }
}
