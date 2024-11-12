<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_{{$type}}_{{$data->id}}">
  <i class="bi bi-trash"></i> {{trans('buttons.Remove')}} 
</button>

@php
if($type=='cat'){$ActionPage="cats.destroy";}
if($type=='product'){$ActionPage="products.destroy";}
if($type=='user'){$ActionPage="users.destroy";}
if($type=='cart_product'){$ActionPage="cart.destroy";}

@endphp

<!-- Modal -->
<div class="modal fade" id="delete_{{$type}}_{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">{{trans('page_title.Delete_Data')}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
      <form action="{{route($ActionPage,$data)}}" method="post">
        @method('DELETE')
        @csrf
      <div class="modal-body">
        {{trans('feedback_messages.delete_sure')}}
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{trans('buttons.Cancel')}}</button>
        <button type="submit" class="btn btn-primary">{{trans('buttons.Confirm')}}</button>
      </div>

      </form>

    </div>
  </div>
</div>