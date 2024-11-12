@extends('admin.master')
@section('title')   {{trans('page_title.Show_Product')}} @endsection
@section('cs')
@endsection 
@section('page_title')  <i class="bi bi-eye"></i> {{trans('page_title.Show_Product')}} @endsection



@section('content')
<div class="card">
    <div class="callout callout-primary">{{trans('product_pages.Product_Info')}}</div>
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
<form action=""  method="" enctype="multipart/form-data">
    @csrf   
    @method('PUT') {{-- refate to update operation --}}
        <div class="row g-3"> 
            <div class="col-md-12">
                <label  class="form-label">{{trans('product_pages.Category')}}</label>
                <input type="text"  class="form-control" name="category_id"  id="category_id"  value="{{($product->category_id!=null) ? $product->category->name : trans('feedback_messages.none')}}" readonly>
            </div>
            <!--begin::Col-->
            <div class="col-md-6">
                <label  class="form-label">{{trans('product_pages.Arabic_Name')}}</label>
                 <input type="text" class="form-control" name="Arabic_Name"  id="Arabic_Name" placeholder="{{trans('product_pages.Arabic_Name')}}" value="{{$product->getTranslation('name','ar')}}" readonly>
            </div>
           
            <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.English_Name')}}</label>
                <input type="text" class="form-control " name="English_Name" id="English_Name" placeholder="{{trans('product_pages.English_Name')}}" value="{{$product->getTranslation('name','en')}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Slug')}}</label> 
                <input type="text" class="form-control" name="Slug" id="Slug" placeholder="{{trans('product_pages.Slug')}}" value="{{$product->slug}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Image')}}</label>
                @if ($product->image!="no")
                <img src="{{ asset('storage/'.$product->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 150px">
                {{-- <a href="{{route('cats.imgDestroy',$cat)}}">dd</a>   --}}
               
             @endif
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Arabic_Short_Desc')}}</label> 
                <textarea type="file" class="form-control" name="Arabic_Short_Desc" id="Arabic_Short_Desc" placeholder="{{trans('product_pages.Arabic_Short_Desc')}}" readonly>{{$product->getTranslation('short_description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.English_Short_Desc')}}</label> 
                <textarea type="file" class="form-control" name="English_Short_Desc" id="English_Short_Desc" placeholder="{{trans('product_pages.English_Short_Desc')}}" readonly>{{$product->getTranslation('short_description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Arabic_Desc')}}</label>  
                <textarea type="file" class="form-control" name="Arabic_Desc" id="Arabic_Desc" placeholder="{{trans('product_pages.Arabic_Desc')}}" readonly>{{$product->getTranslation('description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.English_Desc')}}</label>  
                <textarea type="file" class="form-control " name="English_Desc" id="English_Desc" placeholder="{{trans('product_pages.English_Desc')}}" readonly>{{$product->getTranslation('description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6">
                 <label class="form-check-label" for="gridCheck1">{{trans('product_pages.Showing')}}</label> 
                    @if ($product->status==1)
                     <span class="badge text-bg-success"> {{trans('Product_pages.yes')}}</span>
                     @else
                     <span class="badge text-bg-danger"> {{trans('Product_pages.no')}}</span>   
                    @endif
            </div>
            <div class="col-md-6"> 
                <label class="form-check-label" for="gridCheck1"> {{trans('product_pages.Popular')}}</label> 
                    @if ($product->trend==1)
                    <span class="badge text-bg-success"> {{trans('Product_pages.yes')}}</span>
                     @else
                     <span class="badge text-bg-danger"> {{trans('Product_pages.no')}}</span>   
                    @endif
            </div>

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Price')}}</label> 
                <input type="number" step="0.01" min="0" class="form-control" name="Price" id="Price" placeholder="{{trans('product_pages.Price')}}" value="{{$product->price}}" readonly>
            </div>
                
           <!--end::Col--> <!--begin::Col-->
           <div class="col-md-6">
            <label  class="form-label">{{trans('product_pages.Selling_Price')}}</label> 
            <input type="number" step="0.01" min="0" class="form-control" name="Selling_Price"  id="Selling_Price" placeholder="{{trans('product_pages.Selling_Price')}}"  value="{{$product->selling_price}}" readonly>
           </div>

       <div class="col-md-6"> 
        <label  class="form-label">{{trans('product_pages.Qty')}}</label> 
        <input type="number" step="0.01" min="0" class="form-control" name="Qty" id="Qty" placeholder="{{trans('product_pages.Qty')}}" value="{{$product->qty}}" readonly>
    </div>
        
   <!--end::Col--> <!--begin::Col-->
   <div class="col-md-6">
    <label  class="form-label">{{trans('product_pages.Tax')}}</label>
    <input type="number" step="0.01" min="0" class="form-control " name="Tax"  id="Tax" placeholder="{{trans('product_pages.Tax')}}" value="{{$product->tax}}" readonly>
</div>
           <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                <label class="form-label">{{trans('product_pages.Meta_Title')}}</label>  
                <input type="text" class="form-control" name="Meta_Title" id="Meta_Title" placeholder="{{trans('product_pages.Meta_Title')}}"  value="{{$product->meta_title}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

           <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('product_pages.Arabic_Meta_Desc')}}</label> 
                <textarea  class="form-control" name="Arabic_Meta_Desc" id="Arabic_Meta_Desc" placeholder="{{trans('product_pages.Arabic_Meta_Desc')}}" readonly>{{$product->getTranslation('meta_description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label class="form-label">{{trans('product_pages.English_Meta_Desc')}}</label>  
                <textarea  class="form-control" name="English_Meta_Desc" id="English_Meta_Desc" placeholder="{{trans('product_pages.English_Meta_Desc')}}"  readonly>{{$product->getTranslation('meta_description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                <label class="form-label">{{trans('product_pages.English_Meta_Desc')}}</label>  
                <!--font color="red">{{trans('product_pages.Note')}} : {{trans('product_pages.Key_Words_Notes')}}</!--font-->
                <textarea  class="form-control" name="Key_Words" id="Key_Words" placeholder="{{trans('product_pages.Key_Words')}}"  readonly>{{$product->meta_keywords}}</textarea>
                
            </div> <!--end::Col--> <!--begin::Col-->

            <!--div class="card-footer"> <button class="btn btn-primary" type="submit"><i class="bi bi-floppy"></i> {{trans('buttons.Save')}} </button> </!--div-->
        </div>
</form>
    </div>
</div>


@endsection



@section('js')
@endsection
