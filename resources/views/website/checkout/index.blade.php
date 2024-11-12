@extends('website.layouts.master')
@section('title'){{trans('website_pages.CheckOut')}}@endsection

@section('content')

<section class="h-100">
    <div class="container h-100 py-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0">{{trans('website_pages.CheckOut')}}</h3>
           
          </div>

    <div class="row">
        <div class="col-7">
<div class="card p-2">
    <div class="card-header">{{trans('website_pages.Customer_Details')}}</div>
    <div class="card-body">
<form action="" method="">
    <div class="row">
        <div class="col">
            <label for="fname" class="form-label">{{trans('website_pages.fname')}}</label>
            <input type="text" class="form-control" name="fname" value="{{Auth::user()->fname}}">
        </div>
        <div class="col">
            <label for="lname" class="form-label">{{trans('website_pages.lname')}}</label>
            <input type="text" class="form-control" name="lname" value="{{Auth::user()->lname}}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="email" class="form-label">{{trans('website_pages.email')}}</label>
            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}">
        </div>
        <div class="col">
            <label for="phone" class="form-label">{{trans('website_pages.phone')}}</label>
            <input type="number" class="form-control" name="phone" value="{{Auth::user()->phone}}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="address" class="form-label">{{trans('website_pages.address')}}</label>
            <input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
        </div>
      
    </div>
</form>
    </div>
</div>
        </div>
        <div class="col-5">
            <div class="card p-2">
                <div class="card-header">{{trans('website_pages.Order_Details')}}</div>
                <div class="card-body">
            
                    <table class="table table-bordered " id="example1">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>{{trans('website_pages.Products')}}</th>
                                <th>{{trans('website_pages.Quantity')}}</th>
                                <th>{{trans('website_pages.price_per_unit')}}</th>
                                <th>{{trans('website_pages.total')}}</th>
                            </tr>
                        </thead>
                        <tbody>
@php  $i=1; $sum=0;  @endphp
@foreach ( $cart_products as $item)
@if ($item->product->qty>=$item->qty)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$item->product->name}}</td>
        <td align="center">{{$item->qty}}</td>
        <td align="center">{{$item->product->selling_price}}</td>
        <td align="center">{{$item->product->selling_price*$item->qty}}</td>
    </tr>
    @php
       $sum=$sum+($item->product->selling_price*$item->qty) 
    @endphp
@else
@endif
@endforeach
<tr><td colspan="4" align="center">{{trans('website_pages.total_amount')}}</td><td align="center">{{$sum}}</td></tr>
                        </tbody>
                    </table>
                    
                </div>
                <form action="{{route('checkout.proceed')}}" method="post">
                    @csrf 
                  <input type="hidden" name="sum" value="{{$sum}}">
                  <div class="row">
                    <div class="col">
                        <label  class="form-label px-2"> {{trans('website_pages.PaymentMethod')}} </label>
                        </div> 
                    <div class="col">
                        <select class="form-control" name="PaymentMethod" required>
                            <option value="">{{trans('website_pages.choose')}}</option>
                            <option value="1">{{trans('website_pages.online')}}</option>
                            <option value="0">{{trans('website_pages.ByHand')}}</option>
                          </select>
                    </div>
                    
                  </div>
               <br>
                <button type="submit"  class="form-control btn btn-outline-primary">{{trans('website_pages.submit')}}</button>
                {{-- href="{{route('checkout.proceed',$sum)}}"     --}}
            </form>
            </div>
        </div>
    </div>

</div>
      </div>
    </div>
</section>

@endsection