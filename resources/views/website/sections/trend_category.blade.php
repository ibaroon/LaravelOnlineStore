<div class="py-0 px-3">
<h3 class="text-center" style="color:#c5542d">{{ trans('website_pages.trend_cats') }}</h3>
 
<div class="row">
<div class="owl-carousel trend_products owl-theme ">
    
@foreach ($cats as $item)

<div class="item text-center">
  <a href="{{route('getCatSlug',$item->slug)}}">
<div class="card my-5">
    <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="..." style="width:100%; height:200px;">
    <div class="card-body" >
       
      <h5 class="card-title">{{$item->meta_title}}</h5>
      <p class="card-text">{{$item->meta_description}}</p>
      {{-- <a href="{{$item->id}}" class="btn btn-dark">{{ trans('buttons.View') }}</a> --}}
    </div>
</div>
  </a>
  </div>


@endforeach

</div>


</div>
</div>