@extends('website.layouts.master')
@section('title'){{trans('website_pages.Orders')}}@endsection

@section('content')
<div class="px-3 py-3">
  <nav aria-label="breadcrumb" >
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('website')}}">{{trans('website_navbar.Home')}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('website_pages.Orders')}}</li> 
      </ol>
    </nav>


<div class="px-3">
  <h3 class="text-center" style="color:#c5542d">{{trans('website_pages.Orders')}}</h3>
</div>


    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
  
     
          <div class="list-group">
@if (count($orders)<1)
<br><br><br>
<h5 class="text-center">{{trans('website_pages.no_orders')}} </h5>
<br><br><br>
@else
    

<ul class="px-4">

@foreach ($orders as $order)


<a href="#" class="list-group-item list-group-item-action"  onclick="myFunction({{$order->id}})">
<li class="px-2 ">
  <span class="badge text-bg-primary"> <i class="bi bi-calendar-date-fill"></i> {{$order->created_at}}</span> - 
  <span class="badge text-bg-secondary"> <i class="bi bi-currency-dollar"></i> {{number_format($order->total_amount,2)}}  </span> - 
  <span class="badge {{($order->payment_method==1)?'bg-info':'text-bg-light'}}" >{{($order->payment_method==1)?  trans('website_pages.online')  : trans('website_pages.ByHand')}}  </span>
  <span class="float-end badge {{($order->status==1)?'bg-success':'bg-warning'}}" >{{($order->status==1)?  trans('website_pages.complete') : trans('website_pages.pending')}}</span>
</li>
</a>

<ul id="myDIV_{{$order->id}}" style="display: none">
@foreach ($order->orderDetails as $detail)
<li>
<table class="table table-striped">
<tr>
    <td>{{$detail->product->name}} </td>
    <td>{{$detail->qty}} </td>
    <td>{{number_format($detail->price,2)}} </td>
    <td>{{number_format($detail->qty*$detail->price,2)}} </td>
</tr>
</table>
</li>
@endforeach

</ul>

@endforeach
</ul>
@endif
          </div>
        </div>
      </div>
    </div>
</div>


@endsection

@section('js')
<script>
function myFunction(id) {
    var x = document.getElementById("myDIV_"+id);
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  </script>
@endsection