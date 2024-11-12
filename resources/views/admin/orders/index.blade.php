@extends('admin.master')
@section('title')   {{trans('page_title.Orders')}} @endsection
@section('cs')
@endsection 
@section('page_title') <i class="bi bi-list-check"></i> {{trans('page_title.Orders')}} @endsection



@section('content')
<div class="card">
    {{-- <div class="card-header"><a href="{{route('products.create')}}" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-square"></i> {{trans('buttons.Create')}} </a></div> --}}
    <div class="card-body">

                <table class="table table-bordered " id="example1">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{trans('order_pages.Date')}}</th>
                    <th>{{trans('order_pages.Customer')}}</th>
                    <th>{{trans('order_pages.Phone')}}</th>
                    <th>{{trans('order_pages.Amount')}}</th>
                    
                    <th>{{trans('order_pages.PaymentMethod')}}</th>
                    <th>{{trans('order_pages.Status')}}</th>
                    <th>{{trans('order_pages.Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @php  $i=1;  @endphp
               @foreach ($orders as $item)
                   
          
               
                <tr class="align-middle">
                    <td align="center">{{$i++}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->user->fname}} {{$item->user->lname}}</td>
                    <td>{{$item->user->phone}}</td>
                    <td>{{$item->total_amount}}</td> 
                 
                    <td align="center">@if ($item->payment_method==1)
                        <span class="badge text-bg-success">{{trans('order_pages.Online_Payment')}}</span>
                        @else
                        <span class="badge text-bg-danger">{{trans('order_pages.ByHandPayment')}}</span>   
                        @endif
                    </td>
                 
                    <td align="center">
                        @if ($item->status==1)
                        <span class="badge text-bg-success">{{trans('order_pages.Completed')}}</span>
                        @else
                        <span class="badge text-bg-warning">{{trans('order_pages.Pending')}}</span>   
                        @endif
                    </td>
                    
                    <td>
                        <a href="{{route('products.show',$item->id)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> {{trans('buttons.View')}} </a>
                        
                        <a href="{{route('orders.changeStatus',$item)}}" class="btn btn-outline-{{ ($item->status==1) ? "success" : "warning" }} btn-sm"> <i  class="{{ ($item->status==1) ? "bi bi-toggle-on" : "bi bi-toggle-off" }}"></i> {{trans('order_pages.Status')}}  </a>
                        {{-- @include('admin.includes.delete_modal',['type'=>'product','data'=>$item])  --}}
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
