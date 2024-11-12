@extends('admin.master')
@section('title')   {{trans('page_title.Products')}} @endsection
@section('cs')
@endsection 
@section('page_title') <i class="bi bi-boxes"></i> {{trans('page_title.Products')}} @endsection



@section('content')
<div class="card">
    <div class="card-header"><a href="{{route('products.create')}}" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-square"></i> {{trans('buttons.Create')}} </a></div>
    <div class="card-body">

                <table class="table table-bordered " id="example1">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{trans('product_pages.Name')}}</th>
                    <th>{{trans('product_pages.Category')}}</th>
                    <th>{{trans('product_pages.Image')}}</th>

                    {{-- <th>{{trans('product_pages.Price')}}</th>
                    <th>{{trans('product_pages.Selling_Price')}}</th>
                    <th>{{trans('product_pages.Qty')}}</th>
                    <th>{{trans('product_pages.Tax')}}</th> --}}
                    
                    <th>{{trans('product_pages.Showing')}}</th>
                    <th>{{trans('product_pages.Popular')}}</th>
                    <th >{{trans('product_pages.Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @php  $i=1;  @endphp
               @foreach ($products as $item)
                   
          
               
                <tr class="align-middle">
                    <td align="center">{{$i++}}</td>
                    <td>
                    {{$item->name}}  
                    </td>
                     <td> {{ ($item->category_id!=null) ? $item->category->name : trans('feedback_messages.none') }}</td> 
                    <td align="center"> 
                        @if ($item->image!='no')
                        <img src="{{ asset('storage/'.$item->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 100px">
                         <!--img src="{{Storage::url($item->image)}}" alt=""/-->    
                        @endif
                        
                    </td>

                    {{-- <td> {{$item->price}} </td>
                    <td> {{$item->selling_price}} </td>
                    <td> {{$item->qty}} </td>
                    <td> {{$item->tax}} </td> --}}
                 
                    <td align="center">
                        @if ($item->status==1)
                        <span class="badge text-bg-success">{{trans('product_pages.yes')}}</span>
                        @else
                        <span class="badge text-bg-danger">{{trans('product_pages.no')}}</span>   
                        @endif
                    </td>
                    <td align="center">@if ($item->trend==1)
                        <span class="badge text-bg-success">{{trans('product_pages.yes')}}</span>
                        @else
                        <span class="badge text-bg-danger">{{trans('product_pages.no')}}</span>   
                        @endif
                    </td>
                    <td>
                        <a href="{{route('products.show',$item->id)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> {{trans('buttons.View')}} </a>
                        <a href="{{route('products.edit',$item->id)}}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i> {{trans('buttons.Edit')}} </a>
                        @include('admin.includes.delete_modal',['type'=>'product','data'=>$item]) 
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
   
</div>

@endsection



@section('js')
<script src="{{asset('dist/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('dist/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script> <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
  
 $(function () {
$("#example1").DataTable();
// $("#example2").DataTable({
//     "paging":true,
//     "lenghtChange":false,
//     "searching":ture,
//     "ordering":true,
//     "info":true,
//     "autoWidth":false
// });
 });
</script>
@endsection
