@extends('admin.master')
@section('title')   {{trans('page_title.Categories')}} @endsection
@section('cs')
<meta name="keywords" content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
@endsection 
@section('page_title') <i class="bi bi-tags-fill"></i> {{trans('page_title.Categories')}} @endsection



@section('content')
 {{-- {{Request::route()->getName(); }}  --}}
<div class="card">
    <div class="card-header"><a href="{{route('cats.create')}}" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-square"></i> {{trans('buttons.Create')}} </a></div>
    <div class="card-body">

                <table class="table table-bordered " id="example1">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{trans('category_pages.Name')}}</th>
                    <th>{{trans('category_pages.Image')}}</th>
                    <th>{{trans('category_pages.Showing')}}</th>
                    <th>{{trans('category_pages.Popular')}}</th>
                    <th >{{trans('category_pages.Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @php  $i=1;  @endphp
                @foreach ($cats as $item)
                    
               
                <tr class="align-middle">
                    <td align="center">{{$i++}}</td>
                    <td>{{$item->name}}</td>
                    <td align="center"> 
                        @if ($item->image!='no')
                        <img src="{{ asset('storage/'.$item->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 100px">
                         <!--img src="{{Storage::url($item->image)}}" alt=""/-->    
                        @endif
                        
                    </td>
                    <td align="center">
                        @if ($item->is_showing==1)
                        <span class="badge text-bg-success">{{trans('category_pages.yes')}}</span>
                        @else
                        <span class="badge text-bg-danger">{{trans('category_pages.no')}}</span>   
                        @endif
                    </td>
                    <td align="center">@if ($item->is_popular==1)
                        <span class="badge text-bg-success">{{trans('category_pages.yes')}}</span>
                        @else
                        <span class="badge text-bg-danger">{{trans('category_pages.no')}}</span>   
                        @endif
                    </td>
                    <td>
                        <a href="{{route('cats.show',$item->id)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> {{trans('buttons.View')}} </a>
                        <a href="{{route('cats.edit',$item->id)}}" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil-square"></i> {{trans('buttons.Edit')}} </a>
                        @include('admin.includes.delete_modal',['type'=>'cat','data'=>$item])
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
