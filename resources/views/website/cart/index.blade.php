@extends('website.layouts.master')
@section('title'){{trans('website_pages.Cart')}}@endsection
@section('css')

@endsection

@section('content')
  <div class="px-3 py-3">
    <nav aria-label="breadcrumb" >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('website')}}">{{trans('website_navbar.Home')}}</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{trans('website_pages.Shopping_Cart')}}</li> 
        </ol>
      </nav>
 

  <div class="px-3">
    <h3 class="text-center" style="color:#c5542d">{{trans('website_pages.Shopping_Cart')}}</h3>
  </div>

    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
  
      

@php
    $i=1; $total_price=0;
@endphp
          @forelse ( $cart_products as $item)
          
          @php $req_qty=$item->qty; @endphp
            
          @if ($item->product->qty<$item->qty) <span class="badge bg-danger">{{trans('website_pages.NotAvaliable') }}</span> @endif
          <input type="hidden" id="count" value="{{count($cart_products)}}">
          <div class="card rounded-3 mb-4">
            <div class="card-body p-4">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-md-2 col-lg-2 col-xl-2">
                  <img
                   src="{{asset('storage/'.$item->product->image)}}"
                    class="img-fluid rounded-3" alt="{{$item->product->name}}">
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                  <p class="text-muted">{{$item->product->name}}</p>
                  {{-- <p><span class="text-muted">Size: </span>M <span class="text-muted">max Qan: </span>{{$item->product->qty}}</p> --}}
                </div>
               
                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepDown();updateCart({{$item->id}})">
                    <i class="bi bi-dash"></i>
                  </button>
              @if ($item->product->qty<$item->qty) @php   $req_qty=0;      @endphp
               
              @endif
                  <input id="Qty_{{$i}}" min="1" name="quantity" max="{{$item->product->qty}}" value="{{$req_qty}}" type="number"
                    class="form-control form-control-sm text-center Qty_{{$item->id}}"  />
               
                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                    onclick="this.parentNode.querySelector('input[type=number]').stepUp();updateCart({{$item->id}})">
                    <i class="bi bi-plus"></i>
                  </button>
                  
                </div>
               
                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                  <input id="Price_{{$i}}" min="0" name="price"  value="{{$item->product->selling_price}}" type="hidden"
                  class="form-control form-control-sm Price_{{$item->id}}" />
                  <input id="Tprice_{{$i}}" min="0" name="price"  value="{{$item->product->selling_price*$req_qty}}" type="text"
                  class="form-control form-control-sm text-center Tprice_{{$item->id}}"  />
                  {{-- <h5  class="mb-0">{{$item->product->selling_price*$item->qty}}</h5> --}}
                </div>
                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                  @include('admin.includes.delete_modal',['type'=>'cart_product','data'=>$item])
                </div>
              </div>
            </div>
          </div>
  
         
  
        @php
            $i++;
            $total_price =   $total_price+($item->product->selling_price*$req_qty);
           
        @endphp
  
          @empty
          <br><br><br>
              <h5 class="text-center">{{trans('website_pages.NO_Products')}}</h5>
              <br><br><br>
          @endforelse 
         
      
  @if (count($cart_products)>0)
  <div class="col-12">
  <div class="card">
    <div class="card-body">
        <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md-2 col-lg-2 col-xl-2">
        <a href="{{route('checkout.index')}}"  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block btn-lg"> {{trans('website_buttons.Proceed_to_Pay')}}</a>
        </div>

        <div class="col-md-3 col-lg-3 col-xl-3">
                
        </div>
            
        <div class="col-md-3 col-lg-3 col-xl-2 text-center d-flex">
        {{trans('website_pages.total_amount')}}
        </div>


        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
        <input id="TotalPrice" min="0" value=" {{$total_price}}" type="text"  class="form-control form-control-sm text-center"  readonly /> 
        {{-- <h5 class="mb-0">{{$total_price}}  </h5> --}}
        </div>

        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
             
        </div>
    
        </div>

    </div>
</div>
  </div>
  @else
      
  @endif
        

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

   function updateCart(id)
   {
    var sum=0;
    var count= parseInt($('#count').val());
 
   

  var Qty= parseInt($('.Qty_'+id).val());
  var Price= parseFloat($('.Price_'+id).val());


  parseFloat($('.Tprice_'+id).val(Qty*Price));

 


 console.log(Qty);
 $.ajax({
  method: 'POST',
  url:"{{route('cart.update')}}",
  dataType:'json',
  data: {
    'id':id,
    'qty':Qty
  },success:function(res){ console.log(res) },
  error: function(res) {
            var errors = res.responseJSON;
            console.log(errors);
        }
 })


 for (let index = 1; index <= count; index++) {
     
     sum=sum+parseFloat($('#Tprice_'+ index).val());
     //alert($('#Tprice_'+ index).val());
    parseFloat($('#TotalPrice').val(sum));
   
     
   }

  
   }


  
  
  
  </script>
  @endsection
  
  
  

