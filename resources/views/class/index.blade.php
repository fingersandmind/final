@extends('class.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Class Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('class.create') }}"> Add Class</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
    @endif

    <div class="col-lg-15 margin-tb">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Description</th>
                <th>Day</th>
                <th>Room</th>
                <th>Time</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $class)
                <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $class->name }}</td>
                <td>{{ $class->description }}</td>
                <td>{{ $class->day }}</td>
                <td>{{ $class->room }}</td>
                <td>{{ $class->time }}</td>
                {{-- <td>{{ $class->teacher->name}}</td> --}}
                {{-- <td>
                    @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                    @endif
                </td> --}}
                <td>
                    <a class="btn btn-info" href="{{ route('class.show',$class->id) }}" title="View"><i class="fa fa-eye"></i></a>
                    @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('class.edit',$class->id) }}" title="Edit"><i class="fa fa-edit"></i></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['class.destroy', $class->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger','title' => 'Delete','type' => 'submit', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
                </tr>
            @endforeach
            </table>
    </div>
</div>





{!! $data->render() !!}


@endsection