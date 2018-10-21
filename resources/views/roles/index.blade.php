@extends('roles.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="pull-right">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
            @endcan
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
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}" title="View"><i class="fa fa-eye"></i></a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" title="Edit"><i class="fa fa-edit"></i></a>
            @endcan
            @can('role-delete')
                @csrf
                <button class="btn btn-danger delete" id="{{$role->id}}" type="button" title="Delete"><i class="fa fa-trash"></i></button>
            @endcan
        </td>
    </tr>
    @endforeach
</table>


{!! $roles->render() !!}


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
                url: "{{route('roles.delete')}}",
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
            'Role Deleted',
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