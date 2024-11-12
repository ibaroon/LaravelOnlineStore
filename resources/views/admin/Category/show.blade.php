@extends('admin.master')
@section('title')   {{trans('page_title.Show_Category')}} @endsection
@section('cs')
@endsection 
@section('page_title')  <i class="bi bi-eye"></i> {{trans('page_title.Show_Category')}} @endsection



@section('content')
<div class="card">
    <div class="callout callout-primary">{{trans('category_pages.Category_Info')}}</div>
    <div class="card-body">
<form action=""  method="" enctype="multipart/form-data">
   
        <div class="row g-3"> <!--begin::Col-->
            <div class="col-md-6">
                 <label  class="form-label">{{trans('category_pages.Arabic_Name')}}</label> 
                 <input type="text" class="form-control" name="Arabic_Name"  id="Arabic_Name" placeholder="{{trans('category_pages.Arabic_Name')}}" value="{{$cat->getTranslation('name','ar')}}" readonly >        
            </div>
           
            <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Name')}}</label>  
                <input type="text" class="form-control" name="English_Name" id="English_Name" placeholder="{{trans('category_pages.English_Name')}}"  value="{{$cat->getTranslation('name','en')}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Slug')}}</label>  
                <input type="text" class="form-control " name="Slug" id="Slug" placeholder="{{trans('category_pages.Slug')}}"  value="{{$cat->slug}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Image')}}</label>
                @if ($cat->image!="no")
                <img src="{{ asset('storage/'.$cat->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 150px">
                @endif
                <!--input type="file" class="form-control " name="Image" id="Image" placeholder="{{trans('category_pages.Image')}}" -->
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Arabic_Desc')}}</label> 
                <textarea type="file" class="form-control " name="Arabic_Desc" id="Arabic_Desc" placeholder="{{trans('category_pages.Arabic_Desc')}}" readonly>{{$cat->getTranslation('description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Desc')}}</label>  
                <textarea type="file" class="form-control" name="English_Desc" id="English_Desc" placeholder="{{trans('category_pages.English_Desc')}}" readonly>{{$cat->getTranslation('description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6">
               
                     <label class="form-check-label">{{trans('category_pages.Showing')}}</label> 
                     @if ($cat->is_showing==1)
                     <span class="badge text-bg-success">{{trans('category_pages.yes')}}</span>
                     @else
                     <span class="badge text-bg-danger">{{trans('category_pages.no')}}</span>   
                     @endif
                
            </div>
            <div class="col-md-6">
                
                     <label class="form-check-label"> {{trans('category_pages.Popular')}}</label> 
                     @if ($cat->is_popular==1)
                     <span class="badge text-bg-success">{{trans('category_pages.yes')}}</span>
                     @else
                     <span class="badge text-bg-danger">{{trans('category_pages.no')}}</span>   
                     @endif 
                
            </div>

            <div class="col-md-6"> 
                <label class="form-label">{{trans('category_pages.Arabic_Meta_Title')}}</label> 
                <input type="text" class="form-control" name="Arabic_Meta_Title" id="Arabic_Meta_Title" placeholder="{{trans('category_pages.Arabic_Meta_Title')}}"  value="{{$cat->getTranslation('meta_title','ar')}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Meta_Title')}}</label> 
                <input type="text" class="form-control" name="English_Meta_Title" id="English_Meta_Title" placeholder="{{trans('category_pages.English_Meta_Title')}}"  value="{{$cat->getTranslation('meta_title','en')}}" readonly>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Arabic_Meta_Desc')}}</label>  
                <textarea  class="form-control" name="Arabic_Meta_Desc" id="Arabic_Meta_Desc" placeholder="{{trans('category_pages.Arabic_Meta_Desc')}}" readonly>{{$cat->getTranslation('meta_description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label class="form-label">{{trans('category_pages.English_Meta_Desc')}}</label> 
                <textarea  class="form-control" name="English_Meta_Desc" id="English_Meta_Desc" placeholder="{{trans('category_pages.English_Meta_Desc')}}"  readonly>{{$cat->getTranslation('meta_description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                <label class="form-label">{{trans('category_pages.English_Meta_Desc')}}</label> 
                <!--font-- color="red">{{trans('category_pages.Note')}} : {{trans('category_pages.Key_Words_Notes')}}</!--font-->
                <textarea  class="form-control" name="Key_Words" id="Key_Words" placeholder="{{trans('category_pages.Key_Words')}}"  readonly>{{$cat->meta_keywords}}</textarea>
                
            </div> <!--end::Col--> <!--begin::Col-->

            <!--div class="card-footer"> <button class="btn btn-primary" type="submit">{{trans('buttons.Save')}} <i class="bi bi-floppy"></i></button> </!--div-->
        </div>
</form>
    </div>
</div>


@endsection



@section('js')
@endsection
