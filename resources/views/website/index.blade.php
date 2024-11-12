@extends('website.layouts.master')
@section('css')

<link rel="stylesheet" href="{{asset('dist/css/owl/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('dist/css/owl/owl.theme.default.css')}}">
<style>
.card{ box-shadow: 10px 10px 25px;}
.owl-carousel .card {overflow: hidden;}
.owl-carousel .item img{transition: all .2s ease-in-out }
.owl-carousel .item img:hover{transform: scale(1.1); }
</style>

@endsection

@section('title'){{trans('website_pages.Home')}}@endsection

@section('content')
    
@include('website.sections.slider')
@include('website.sections.trend_product')
@include('website.sections.trend_category')

@endsection


@section('js')

<script src="{{asset('dist/js/owl/owl.carousel.min.js')}}"></script> 
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

$('.trend_products').owlCarousel({
    loop:true,
    // autoplay:true,
    margin:20,
    nav:true,
    rtl:true,
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
           
        },
        480:{
            items:2,
            nav:true,
           
        },
        600:{
            items:3,
            nav:false
        },
        
        1000:{
            items:4,
            nav:true,
            loop:true
           
           
        }
    }
})

$('.trend_categories').owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    rtl:true,
    dots:false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
           
        },
        480:{
            items:2,
            nav:true,
           
        },
        600:{
            items:3,
            nav:false
        },
        
        1000:{
            items:4,
            nav:true,
            loop:true
           
           
        }
    }
})
    </script>
@endsection
       
        


