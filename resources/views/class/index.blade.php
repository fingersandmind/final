@extends('class.layout')

@section('breadcrumbs')
    <li class="breadcrumb-item active">Classes</li>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
        <h2>Classes of {{$sem->semester}}</h2>
        </div>
        <div class="pull-right">
            {{-- <a class="btn btn-success" href="{{ route('class.create') }}"> Add Class</a> --}}
        </div>
    </div>

    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif --}}

    <div class="col-lg-15 margin-tb">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Day</th>
                <th>Room</th>
                <th>Schedule</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $class)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $class->schoolClass->name }}</td>
                <td>{{ $class->schoolClass->description }}</td>
                <td>{{ $class->schoolClass->day }}</td>
                <td>{{ $class->schoolClass->room }}</td>
                <td>{{ $class->schoolClass->schedule }}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('class.show',$class->schoolClass->id) }}" title="View"><i class="fa fa-eye"></i></a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('class.edit',$class->schoolClass->id) }}" title="Edit"><i class="fa fa-edit"></i></a>

                    @csrf
                    <button id ="{{$class->schoolClass->id}}" type="button" class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></button>

                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['class.destroy', $class->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger delete','title' => 'Delete','type' => 'button', 'id' => '', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                    {!! Form::close() !!} --}}
                    @endcan
                </td>
                </tr>
            @endforeach
            </table>
    </div>
</div>





{!! $data->render() !!}


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
                url: "{{route('class.delete')}}",
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
            'Class Deleted',
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