@extends('website.layouts.master')
@section('title'){{$product->slug}}@endsection
@section('css')

@endsection

@section('content')
<div class="px-3 py-3">
<nav aria-label="breadcrumb" >
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('getCates')}}">{{trans('website_navbar.Category')}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$product->category->slug}}</li>
      <li class="breadcrumb-item active" aria-current="page">{{$product->slug}}</li>
    </ol>
  </nav>

<br>

<div class="card mb-3 py-3" >
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{asset('storage/'.$product->image)}}" class="img-fluid img-rounded px-3" alt="{{$product->image}}" >
      </div>
      <div class="col-md-8">
        <div class="card-header ">
          <h5 class="py-4">
            {{$product->name}}
            @if ($product->trend==1)
            <span class="float-end badge bg-success">{{trans('website_pages.trending')}}</span> 
            @endif
          </h5>
        </div>

        <div class="card-body">
          <div class="pb-4">
          <s>{{trans('website_pages.price')}} : {{$product->price}}</s>
          <span class="float-end">{{trans('website_pages.selling_price')}} : {{$product->selling_price}}</span>
          </div>
                   
          <h5 class="card-title">{{$product->category->name}}</h5>
          <p class="card-text">{{$product->meta_description}}</p>
      
          <p class="card-text">
            @if ($product->qty>0)
            <span class="badge bg-success">{{trans('website_pages.Avaliable') }}</span>
            @else
            <span class="badge bg-danger">{{trans('website_pages.NotAvaliable') }}</span>
            @endif
          </p>
          <hr>
          @if ($product->qty>0)
          <div class="row">
          <div class="col-3">
            <h5> {{trans('website_pages.Quantity') }} </h5>
            <div class="input-group mb-3">
              <button class="input-group-text btn btn-outline-primary" onclick="increaseQty()">
                <i class="bi bi-plus"></i>
              </button>
              <input type="text"  id="qty_value" class="form-control text-center" min="1" value="1" style="height: 38px;" readonly>
               <button class="input-group-text btn btn-outline-primary" onclick="decreaseQty()">
                <i class="bi bi-dash"></i>
              </button>
            </div>
          </div>
      
<input type="hidden"  id="avaliable_quan" class="form-control text-center"  value="{{$product->qty}}" readonly>
<input type="hidden"  id="product_id" class="form-control text-center"  value="{{$product->id}}" readonly>

             
             

            <div class="col-3">
                  <h5 >{{trans('website_pages.options')}}</h5>
                  <div class="input-group mb-3">
                    <button class="input-group-text btn btn-warning" title="{{trans('website_pages.Add_to_cart')}}" onclick="AddToCart()">
                      <i class="bi bi-cart-plus"></i>
                    </button>
                  &nbsp;
                    <button class="input-group-text btn btn-danger"  title="{{trans('website_pages.Add_to_wishlist')}}"onclick="AddToWish()">
                      <i class="bi bi-bag-heart"></i>
                    </button>
                  </div>
            </div>  
        </div>
        @else
        <div class="col-3">
          <h5 >{{trans('website_pages.options')}}</h5>
          <div class="input-group mb-3">
          
            <button class="input-group-text btn btn-danger"  title="{{trans('website_pages.Add_to_wishlist')}}"onclick="AddToWish()">
              <i class="bi bi-bag-heart"></i>
            </button>
          </div>
    </div>

        @endif

        </div>
        
      </div>
    </div>
  </div>

  <div class="p-3" >
    <div class="row">
        
      <div class="card col-9">
        <div class="card-header"><h5 class="py-0">{{trans('website_pages.specifications') }}</h5></div>
        <div class="card-body">
          <h6 class="card-title">{{$product->short_description}}</h6>
          <hr>
          <p class="card-text">{{$product->description}}</p>
        </div>
      </div>


      
      <div class="card col-3">
        <div class="card-header"><h5 class="py-0">{{trans('website_pages.keywords') }}</h5></div>
        <div class="card-body">
          
          {{-- <h6 class="card-title">{{$product->short_description}}</h6>
          <hr> --}}
          <p class="card-text">
            @foreach ($keywords as $item)
            <span class="badge bg-warning">{{$item }}</span>
            @endforeach
           
          </p>
        </div>
      </div>
     

    </div>
  </div>
</div>
@endsection

@section('js')
<script>
 $.ajaxSetup({
   headers: {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
 });

function increaseQty()
{
var value= parseInt($('#qty_value').val());
var avaliable_quan= parseInt($('#avaliable_quan').val());
value=value+1;
(value>=avaliable_quan)? value=avaliable_quan : value=value;
$('#qty_value').val(value);
console.log(value);
}

function decreaseQty()
{
var value= parseInt($('#qty_value').val());
value=value-1;
(value==0)? value=1 : value=value;
$('#qty_value').val(value);
console.log(value);
}


function AddToCart()
{
  var req_value= $('#qty_value').val();
  var product_id= $('#product_id').val();

  $.ajax({
  
  method : 'POST',
  url : "{{ route('product.addToCart') }}",
  
  data : {
    'product_id':product_id,
    'qty':req_value
  },
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


