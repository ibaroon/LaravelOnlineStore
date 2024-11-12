<div class="py-0 px-3">
  <br>
<h3 class="text-center text-underline" style="color:#c5542d">{{ trans('website_pages.trend_products') }}</h3>
    
<div class="row">
<div class="owl-carousel trend_products owl-theme ">
    
    @foreach ($products as $item)
  @php
   $cat_slug='null';
   if ($item->category_id!=null)
   $cat_slug=$item->category->slug;
  @endphp
 
    {{-- <a href="{{route('getProductSlug',[$cat_slug,$item->slug])}}"> --}}
    <div class="item">
   <div class="card  my-5" >   {{--//style="width: 18rem;" --}}
           <img src="{{asset('storage/'.$item->image)}}" class="card-img-top" alt="..." style="width:100%; height:200px;">     
        <div class="card-body" >   
          <h5 class="card-title">{{$item->meta_title}}</h5>
          <p class="card-text">{{$item->meta_description}}</p>
          <div class="pb-4">
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
      </div>
    {{-- </a> --}}
    
    @endforeach
    
    </div>
    

    </div>
  </div>

    
