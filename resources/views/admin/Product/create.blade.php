@extends('admin.master')
@section('title')   {{trans('page_title.Create_Product')}} @endsection
@section('cs')
@endsection 
@section('page_title')  <i class="bi bi-plus-square"></i> {{trans('page_title.Create_Product')}} @endsection



@section('content')
<div class="card">
    <div class="callout callout-primary">{{trans('product_pages.Product_Info')}}</div>
    <div class="card-body">
        @if (session('error_catch'))
            <div class="bg-danger">{{session('error_catch')}}</div>
        @endif
<form action="{{route('products.store')}}"  method="post" enctype="multipart/form-data">
    @csrf   
        <div class="row g-3"> 
            <div class="col-md-12">
                {{-- <label  class="form-label">{{trans('product_pages.Category')}}</label> --}}
                <select  class="form-control @error('category_id') is-invalid @enderror" name="category_id"  id="category_id"  >
           <option selected value="">{{trans('product_pages.Category')}}</option>
           @foreach ($cats as $item)
               <option value="{{$item->id}}">{{$item->name}}</option>
           @endforeach
                </select>
                @error('category_id')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <!--begin::Col-->
            <div class="col-md-6">
                 {{-- <label  class="form-label">{{trans('product_pages.Arabic_Name')}}</label> --}}
                 <input type="text" class="form-control @error('Arabic_Name') is-invalid @enderror" name="Arabic_Name"  id="Arabic_Name" placeholder="{{trans('product_pages.Arabic_Name')}}" value="{{old('Arabic_Name')}}">
                 @error('Arabic_Name')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
            </div>
           
            <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.English_Name')}}</label>  --}}
                <input type="text" class="form-control @error('English_Name') is-invalid @enderror" name="English_Name" id="English_Name" placeholder="{{trans('product_pages.English_Name')}}" >
                @error('English_Name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Slug')}}</label>  --}}
                <input type="text" class="form-control @error('Slug') is-invalid @enderror" name="Slug" id="Slug" placeholder="{{trans('product_pages.Slug')}}"  >
                @error('Slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Image')}}</label>  --}}
                <input type="file" class="form-control " name="Image" id="Image" placeholder="{{trans('product_pages.Image')}}" >
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Arabic_Short_Desc')}}</label>  --}}
                <textarea type="file" class="form-control @error('Arabic_Short_Desc') is-invalid @enderror" name="Arabic_Short_Desc" id="Arabic_Short_Desc" placeholder="{{trans('product_pages.Arabic_Short_Desc')}}" ></textarea>
                @error('Arabic_Short_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.English_Short_Desc')}}</label>  --}}
                <textarea type="file" class="form-control @error('English_Short_Desc') is-invalid @enderror" name="English_Short_Desc" id="English_Short_Desc" placeholder="{{trans('product_pages.English_Short_Desc')}}" ></textarea>
                @error('English_Short_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Arabic_Desc')}}</label>  --}}
                <textarea type="file" class="form-control @error('Arabic_Desc') is-invalid @enderror" name="Arabic_Desc" id="Arabic_Desc" placeholder="{{trans('product_pages.Arabic_Desc')}}" ></textarea>
                @error('Arabic_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.English_Desc')}}</label>  --}}
                <textarea type="file" class="form-control @error('English_Desc') is-invalid @enderror" name="English_Desc" id="English_Desc" placeholder="{{trans('product_pages.English_Desc')}}" ></textarea>
                @error('English_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Status" id="Status"> 
                    <label class="form-check-label" for="gridCheck1">{{trans('product_pages.Showing')}}</label> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check"> <input class="form-check-input" type="checkbox" name="Popular" id="Popular">
                <label class="form-check-label" for="gridCheck1"> {{trans('product_pages.Popular')}}</label> 
                </div>
            </div>

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Price')}}</label>  --}}
                <input type="number" step="0.01" min="0" class="form-control @error('Price') is-invalid @enderror" name="Price" id="Price" placeholder="{{trans('product_pages.Price')}}" >
                @error('Price')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
                
           <!--end::Col--> <!--begin::Col-->
           <div class="col-md-6">
            {{-- <label  class="form-label">{{trans('product_pages.Selling_Price')}}</label> --}}
            <input type="number" step="0.01" min="0" class="form-control @error('Selling_Price') is-invalid @enderror" name="Selling_Price"  id="Selling_Price" placeholder="{{trans('product_pages.Selling_Price')}}" >
            @error('Selling_Price')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
       </div>

       <div class="col-md-6"> 
        {{-- <label  class="form-label">{{trans('product_pages.Qty')}}</label>  --}}
        <input type="number" step="0.01" min="0" class="form-control @error('Qty') is-invalid @enderror" name="Qty" id="Qty" placeholder="{{trans('product_pages.Qty')}}" >
        @error('Qty')
        <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
        
   <!--end::Col--> <!--begin::Col-->
   <div class="col-md-6">
    {{-- <label  class="form-label">{{trans('product_pages.Tax')}}</label> --}}
    <input type="number" step="0.01" min="0" class="form-control @error('Tax') is-invalid @enderror" name="Tax"  id="Tax" placeholder="{{trans('product_pages.Tax')}}" >
    @error('Tax')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
</div>
           <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                {{-- <label class="form-label">{{trans('product_pages.Meta_Title')}}</label>  --}}
                <input type="text" class="form-control" name="Meta_Title" id="Meta_Title" placeholder="{{trans('product_pages.Meta_Title')}}"  >
            </div> <!--end::Col--> <!--begin::Col-->

           <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label  class="form-label">{{trans('product_pages.Arabic_Meta_Desc')}}</label>  --}}
                <textarea  class="form-control" name="Arabic_Meta_Desc" id="Arabic_Meta_Desc" placeholder="{{trans('product_pages.Arabic_Meta_Desc')}}" ></textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                {{-- <label class="form-label">{{trans('product_pages.English_Meta_Desc')}}</label>  --}}
                <textarea  class="form-control" name="English_Meta_Desc" id="English_Meta_Desc" placeholder="{{trans('product_pages.English_Meta_Desc')}}"  ></textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                {{-- <label class="form-label">{{trans('product_pages.English_Meta_Desc')}}</label>  --}}
                <font color="red">{{trans('product_pages.Note')}} : {{trans('product_pages.Key_Words_Notes')}}</font>
                <textarea  class="form-control" name="Key_Words" id="Key_Words" placeholder="{{trans('product_pages.Key_Words')}}"  ></textarea>
                
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="card-footer"> <button class="btn btn-primary" type="submit"><i class="bi bi-floppy"></i> {{trans('buttons.Save')}} </button> </div>
        </div>
</form>
    </div>
</div>


@endsection



@section('js')
@endsection
