@extends('users.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Teachers Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}" title="View"><i class="fa fa-eye"></i></a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}" title="Edit"><i class="fa fa-edit"></i></a>


    @csrf
    <button id ="{{$user->id}}" type="button" class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></button>
        
    </td>
  </tr>
 @endforeach
</table>
    

{!! $data->render() !!}

{{-- {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id], 
        'style'=>'display:inline', 'class' => 'delete', 'method' => 'DELETE']) !!}
            {!! Form::hidden('id', $user->id) !!}
            {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger delete', 'type' => 'submit', 
            'title' => 'Delete']) !!}
            {!! Form::close() !!} --}}




@endsection

@push('additionalJS')

<script>
$(document).ready(function() {
    $(document).on('click', '.delete', function(event) {
        event.preventDefault();

        swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {

            $.ajax({
                url: "{{route('users.delete')}}",
                type: 'post',
                dataType: 'json',
                data: 
                {
                    '_token': $('input[name=_token]').val(),
                    'id':$(this).attr('id'),
                },
            })
            .done(function(data) {
                swal(
            'Deleted!',
            'User Deleted',
            'success'
            )
                setInterval(function(){
                location.reload();
                },600);
            })
            .fail(function() {
                console.log("error");
            });
        }
        })
    });
});
</script>
    
@endpush