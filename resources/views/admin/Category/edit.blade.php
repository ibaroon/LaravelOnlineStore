@extends('admin.master')
@section('title')   {{trans('page_title.Edit_Category')}} @endsection
@section('cs')
@endsection 
@section('page_title')  <i class="bi bi-pencil-square"></i> {{trans('page_title.Edit_Category')}} @endsection



@section('content')
<div class="card">
    <div class="callout callout-primary">{{trans('category_pages.Category_Info')}}</div>
    <div class="card-body">
<form action="{{route('cats.update',$cat->id)}}"  method="post" enctype="multipart/form-data">
    @csrf   
     @method('PUT') {{-- refate to update operation --}}
        <div class="row g-3"> <!--begin::Col-->
            <div class="col-md-6">
                 <label  class="form-label">{{trans('category_pages.Arabic_Name')}}</label> 
                 <input type="text" class="form-control @error('Arabic_Name') is-invalid @enderror" name="Arabic_Name"  id="Arabic_Name" placeholder="{{trans('category_pages.Arabic_Name')}}" value="{{$cat->getTranslation('name','ar')}}" >
                 @error('Arabic_Name')
                 <div class="alert alert-danger">{{$message}}</div>
                 @enderror
            </div>
           
            <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Name')}}</label>  
                <input type="text" class="form-control @error('English_Name') is-invalid @enderror" name="English_Name" id="English_Name" placeholder="{{trans('category_pages.English_Name')}}"  value="{{$cat->getTranslation('name','en')}}">
                @error('English_Name')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Slug')}}</label>  
                <input type="text" class="form-control @error('Slug') is-invalid @enderror" name="Slug" id="Slug" placeholder="{{trans('category_pages.Slug')}}"  value="{{$cat->slug}}">
                @error('Slug')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Image')}}</label>  
                 @if ($cat->image!="no")
                 <img src="{{ asset('storage/'.$cat->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 100px">
                 {{-- <a href="{{route('cats.imgDestroy',$cat)}}">dd</a>   --}}
                 @include('admin.includes.delete_img_modal',['type'=>'CatImg','data'=>$cat])
              @endif
                <input type="file" class="form-control " name="Image" id="Image" placeholder="{{trans('category_pages.Image')}}" >
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Arabic_Desc')}}</label>  
                <textarea type="file" class="form-control @error('Arabic_Desc') is-invalid @enderror" name="Arabic_Desc" id="Arabic_Desc" placeholder="{{trans('category_pages.Arabic_Desc')}}" >{{$cat->getTranslation('description','ar')}}</textarea>
                @error('Arabic_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Desc')}}</label>  
                <textarea type="file" class="form-control @error('English_Desc') is-invalid @enderror" name="English_Desc" id="English_Desc" placeholder="{{trans('category_pages.English_Desc')}}">{{$cat->getTranslation('description','en')}}</textarea>
                @error('English_Desc')
                <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="Status" id="Status" {{ ($cat->is_showing==1) ? 'checked' : ''}}> 
                    <label class="form-check-label" for="gridCheck1">{{trans('category_pages.Showing')}}</label> 
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check"> <input class="form-check-input" type="checkbox" name="Popular" id="Popular" @if ($cat->is_popular==1) @checked(true)  @else @checked(false) @endif>
                <label class="form-check-label" for="gridCheck1"> {{trans('category_pages.Popular')}}</label> 
                </div>
            </div>

            <div class="col-md-6"> 
                <label class="form-label">{{trans('category_pages.Arabic_Meta_Title')}}</label> 
                <input type="text" class="form-control" name="Arabic_Meta_Title" id="Arabic_Meta_Title" placeholder="{{trans('category_pages.Arabic_Meta_Title')}}"  value="{{$cat->getTranslation('meta_title','ar')}}" >
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.English_Meta_Title')}}</label> 
                <input type="text" class="form-control" name="English_Meta_Title" id="English_Meta_Title" placeholder="{{trans('category_pages.English_Meta_Title')}}"  value="{{$cat->getTranslation('meta_title','en')}}">
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label  class="form-label">{{trans('category_pages.Arabic_Meta_Desc')}}</label> 
                <textarea  class="form-control" name="Arabic_Meta_Desc" id="Arabic_Meta_Desc" placeholder="{{trans('category_pages.Arabic_Meta_Desc')}}" >{{$cat->getTranslation('meta_description','ar')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-6"> 
                <label class="form-label">{{trans('category_pages.English_Meta_Desc')}}</label>  
                <textarea  class="form-control" name="English_Meta_Desc" id="English_Meta_Desc" placeholder="{{trans('category_pages.English_Meta_Desc')}}"  >{{$cat->getTranslation('meta_description','en')}}</textarea>
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="col-md-12"> 
                 <label class="form-label">{{trans('category_pages.English_Meta_Desc')}}</label> 
                <font color="red">{{trans('category_pages.Note')}} : {{trans('category_pages.Key_Words_Notes')}}</font>
                <textarea  class="form-control" name="Key_Words" id="Key_Words" placeholder="{{trans('category_pages.Key_Words')}}"  >{{$cat->meta_keywords}}</textarea>
                
            </div> <!--end::Col--> <!--begin::Col-->

            <div class="card-footer"> <button class="btn btn-primary" type="submit"><i class="bi bi-floppy"></i> {{trans('buttons.Save')}} </button> </div>
        </div>
</form>
    </div>
</div>


@endsection



@section('js')
@endsection
