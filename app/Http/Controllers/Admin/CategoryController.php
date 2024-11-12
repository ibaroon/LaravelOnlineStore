<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['route']='cats'; // for making sidebar class active
        $data['cats']=Category::select('id','name','image','is_showing','is_popular')->get();
        //return $data['cats']; //view result
        return  view('Admin.Category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['route']='cats';// for making sidebar class active
        return  view('Admin.Category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {   // to display form values as json object
        // return $request; 
        try{
            $validate = $request->validated();

            $cat= new Category();
            $cat->name=['ar'=>$request->Arabic_Name	,'en'=>$request->English_Name];
            $cat->description=['ar'=>$request->Arabic_Desc ,'en'=>$request->English_Desc];
            $cat->meta_title=['ar'=>$request->Arabic_Meta_Title ,'en'=>$request->English_Meta_Title];
            $cat->meta_description=['ar'=>$request->Arabic_Meta_Desc ,'en'=>$request->English_Meta_Desc	];

            $cat->slug=$request->Slug ;
            $cat->is_showing=$request->Status ? '1' : '0' ;
            $cat->is_popular=$request->Popular ? '1' : '0' ;
            $cat->meta_keywords=$request->Key_Words	;	

            if($request->hasFile('Image'))
            {
                $img= $request->file('Image')->store('/public/src/assets/img/uploads/cats','public');
                //php artisan storage:link
            }

            else
            {   $img="no";   }

            $cat->image=$img	;	
           
            $cat->save();
            toastr()->success(trans("feedback_messages.success_save"));
            return redirect()->route('cats.index');

        }catch(\Exception $e){
             return redirect()->back()->with('error_catch',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $cat)
    {
        //
        $data['cat']=$cat;
        $data['route']='cats';
        return  view('Admin.Category.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $cat)
    {
        //return $cat; //display returned cat
        $data['cat']=$cat; // assigning the returned cat to data
        $data['route']='cats';// for making sidebar class active
        return  view('Admin.Category.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $cat)
    {
        //return $request;//view request
        try{
            $validated=$request->validated();

            $img =$cat->image; // old img
            if($request->hasFile('Image'))
            {   if($img!="no") {Storage::disk('public')->delete($img);}
                $img= $request->file('Image')->store('/public/src/assets/img/uploads/cats','public'); // new img
                //php artisan storage:link  
            }
    
            $cat->update([

            'name'=>['ar'=>$request->Arabic_Name	,'en'=>$request->English_Name],
            'description'=>['ar'=>$request->Arabic_Desc ,'en'=>$request->English_Desc],
            'meta_title'=>['ar'=>$request->Arabic_Meta_Title ,'en'=>$request->English_Meta_Title],
            'meta_description'=>['ar'=>$request->Arabic_Meta_Desc ,'en'=>$request->English_Meta_Desc],

            'slug'=>$request->Slug ,
            'is_showing'=>$request->Status ? '1' : '0' ,
            'is_popular'=>$request->Popular ? '1' : '0' ,
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
    public function destroy(Category $cat)
    {
        //return $cat->image;
         Storage::disk('public')->delete($cat->image);
         $cat->delete();
         toastr()->success(trans("feedback_messages.success_delete"));
             return redirect()->route('cats.index');
    }

    public function imgDestroy(Category $cat)
    {
        Storage::disk('public')->delete($cat->image);
        
        try{
        $cat->update(['image'=>'no' ]);
            toastr()->success(trans("feedback_messages.success_update"));
            return redirect()->back();

        }catch(\Exception $e){
            return redirect()->back()->withErrors('error',$e->getMessage());
       }
    }
}
