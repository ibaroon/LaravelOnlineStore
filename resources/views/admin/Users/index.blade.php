@extends('admin.master')
@section('title') {{trans('page_title.Users')}} @endsection
@section('cs')
@endsection 
@section('page_title')<i class="nav-icon bi bi-people-fill"></i> {{trans('page_title.Users')}} @endsection



@section('content')
<div class="card">
    <!--div class="card-header"><a href="{{route('cats.create')}}" class="btn btn-outline-primary mb-2"><i class="bi bi-plus-square"></i> {{trans('buttons.Create')}} </a></!--div-->
    <div class="card-body">

                <table class="table table-bordered " id="example1">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{trans('user_pages.Name')}}</th>
                    <!--th>{{trans('user_pages.Phone')}}</!--th-->
                    <th>{{trans('user_pages.Email')}}</th>
                    <th>{{trans('user_pages.Image')}}</th>
                   
                    <th >{{trans('user_pages.User_type')}}</th>
                    <th >{{trans('user_pages.Actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @php  $i=1;  @endphp
                @foreach ($users as $item)
                    
               
                <tr class="align-middle">
                    <td align="center">{{$i++}}</td>
                    <td>{{$item->fname." ". $item->lname}}</td>
                    <!--td>{{$item->phone}}</!--td-->
                    <td>{{$item->email}}</td>
                    <td align="center"> 
                        @if ($item->image!='no')
                        <img src="{{ asset('avatars/'.$item->image) }}" alt="" class="img-thumbnail" style="border-radius: 10px; max-width: 100px">
                         <!--img src="{{Storage::url($item->image)}}" alt=""/-->    
                        @endif
                        
                    </td>
                    
                 <td align="center">
                    @if ($item->is_admin==1)
                    <span class="badge text-bg-success">{{trans('user_pages.Admin')}} </span>
                      @else
                      <span class="badge text-bg-warning">{{trans('user_pages.User')}} </span>
                    @endif
                 </td>
                
                    <td>
                        <!--a href="{{route('users.show',$item->id)}}" class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i> {{trans('buttons.View')}} </!--a-->
                        <a href="{{route('users.change_type',$item->id)}}" class="btn btn-outline-{{ ($item->is_admin==1) ? "success" : "warning" }} btn-sm"> <i  class="{{ ($item->is_admin==1) ? "bi bi-toggle-on" : "bi bi-toggle-off" }}"></i> {{trans('user_pages.Admin')}}  </a>
                        @include('admin.includes.delete_modal',['type'=>'user','data'=>$item])
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
