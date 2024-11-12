@extends('website.layouts.master')
@section('title'){{$cat->slug}}@endsection
@section('css')

@endsection

@section('content')
<div class="px-3 py-3">
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('getCates')}}">{{trans('website_navbar.Category')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$cat->slug}}</li>
    </ol>
  </nav>

<br>

    <div class="card mb-3" >
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{asset('storage/'.$cat->image)}}" class="img-fluid rounded-start" alt="{{$cat->slug}}">
          </div>
          <div class="col-md-8">
            <div class="card-header">
              <h5 class="card-title">{{$cat->name}}
                @if ($cat->is_popular==1)
                <span class="float-end badge bg-success">{{trans('website_pages.trending')}}</span> 
                @endif
                </h5>
              </div>
            <div class="card-body">
              
              <p class="card-text">{{$cat->description}}</p>
              <hr/>
              <p class="card-text">{{$cat->meta_description}}</p>
              {{-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> --}}
            </div>
          </div>
        </div>
      </div>


</div>
<hr/>
<div class="px-3">

@if (count($cat->products)>0)
<h3 class="text-center" style="color:#c5542d">{{trans('website_pages.Products')}}</h3>

    @php
   $cat_slug='null';
   if ($cat->slug!=null)
   $cat_slug=$cat->slug;
  @endphp
 
 <div class="row">
      @foreach ($cat->products as $item)
    
      
      <div class="col-md-3">
        {{-- <a href="{{route('getProductSlug',[$cat_slug,$item->slug])}}"> --}}
     <div class="card  my-5" >   {{--//style="width: 18rem;" --}}
             <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="..." style="width:100%; height:200px;">     
          <div class="card-body" >   
            <h5 class="card-title">{{$item->meta_title}}
              @if ($item->trend==1)
              <span class="float-end badge bg-success">{{trans('website_pages.trending')}}</span> 
              @endif
            </h5>
          
            <p class="card-text">{{$item->meta_description}}</p>
            <div class="pb-2">
           <s>{{$item->price}}</s>
           <span class="float-end">{{$item->selling_price}}</span>
           <center> 
            <input type="hidden"  id="qty_value_{{$item->id}}" class="form-control text-center" value="1"  readonly>
            <input type="hidden"  id="avaliable_quan_{{$item->id}}" class="form-control text-center"  value="{{$item->qty}}" readonly>
            <input type="hidden"  id="product_id_{{$item->id}}" class="form-control text-center"  value="{{$item->id}}" readonly>


            <a href="{{route('getProductSlug',[$cat_slug,$item->slug])}}" class="btn btn-primary" title="{{trans('buttons.View')}}"><i class="bi bi-eye"></i></a>
            <button class="btn btn-warning" title="{{trans('website_pages.Add_to_cart')}}" onclick="AddToCart({{$item->id}})" {{($item->qty<=0)? 'disabled' : ''}}><i class="bi bi-cart-plus"></i></button>
            <button class="btn btn-danger" title="{{trans('website_pages.Add_to_wishlist')}}"><i class="bi bi-bag-heart"></i></button>
          </center>  
          
          </div>
          </div>
      </div>
    {{-- </a> --}}
        </div>
     
      
      @endforeach
    </div>
@else
<h3 class="text-center" style="color:#c5542d">{{trans('website_pages.NO_Products')}}</h3><br>
@endif



</div>
@endsection

@section('js')
<script>
function AddToCart(id)
{
  var req_value= $('#qty_value_'+id).val();
  var product_id= $('#product_id_'+id).val();
  //alert($('#product_id_'+id).val());

   $.ajax({
   method : 'POST',
   url : "{{ route('product.addToCart') }}",
   headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
   data : { 'product_id':product_id, 'qty':req_value },
   success:function (res){
     setTimeout(function(){// wait for 5 secs(2)
            location.reload(); // then reload the page.(3)
       }, 2000);
     Swal.fire(res.msg);
     //consloe.log('responseee :' + res.msg);
   },
   error: function(res) {
             var errors = res.responseJSON;
             console.log(errors);
         }
  });

}
</script>
@endsection