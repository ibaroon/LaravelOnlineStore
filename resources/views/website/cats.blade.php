@extends('website.layouts.master')
@section('title'){{trans('website_pages.Categories')}}@endsection

@section('content')
<div class="px-3 py-3">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">{{trans('website_navbar.Home')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{trans('website_navbar.Category')}}</li>
    </ol>
  </nav>
  <h3 class="text-center" style="color:#c5542d">{{ trans('website_pages.Categories') }}</h3>

  <div class="row">
  <!--div class="owl-carousel trend_products owl-theme "-->
      
  @foreach ($cats as $item)
  
  <div class="col-md-3 text-center">
    <a href="{{route('getCatSlug',$item->slug)}}">
  <div class="card my-5">
      <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="..." style="width:100%; height:200px;">
      <div class="card-body" >
         
        <h5 class="card-title">{{$item->meta_title}}</h5>
        <p class="card-text">{{$item->meta_description}}</p>
        {{-- <a href="getCatSlug/{{$item->id}}" class="btn btn-dark">{{ trans('buttons.View') }}</a> --}}
      </div>
  </div>
    </a>
    </div>
  
  
  @endforeach
  
  </!--div-->
  
  
  </div>
  </div>


@endsection