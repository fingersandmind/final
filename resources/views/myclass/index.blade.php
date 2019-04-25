@extends('class.layout')


@section('breadcrumbs')
<li class="breadcrumb-item active">My Classes</li>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>My Class of {{$sem->semester}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('load') }}"> Load My Class</a>
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
                <th>Name</th>
                <th>Description</th>
                <th>Day</th>
                <th>Room</th>
                <th>Schedule</th>
                <th width="280px">Action</th>
            </tr>
                @foreach ($semclass as $class)
                <tr>
                    <td>{{$class->schoolClass->name}}</td>
                    <td>{{$class->schoolClass->description}}</td>
                    <td>{{$class->schoolClass->day}}</td>
                    <td>{{$class->schoolClass->room}}</td>
                    <td>{{$class->schoolClass->schedule}}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('class.show',$class->schoolClass->id) }}" title="View"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>
                    
                @endforeach
        </table>
    </div>
</div>



{!! $semclass->render() !!}


@endsection