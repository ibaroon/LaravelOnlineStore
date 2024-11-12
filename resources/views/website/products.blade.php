@extends('website.layouts.master')
@section('title'){{trans('website_navbar.Product')}}@endsection
@section('css')

@endsection

@section('content')
<div class="px-3 py-3">
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('website')}}">{{trans('website_navbar.Home')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{trans('website_navbar.Product')}}</li> 
    </ol>
  </nav>



<div class="px-3">

@if (count($products)>0)
<h3 class="text-center" style="color:#c5542d">{{trans('website_pages.Products')}}</h3>


 
 <div class="row">
      @foreach ($products as $item)
      @php
   $cat_slug='null';
   if ($item->category_id!=null)
   $cat_slug=$item->category->slug;
  @endphp
      
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
<h3 class="text-center" style="color:#c5542d">{{trans('website_pages.NO_Products')}}</h3>
@endif



</div>
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