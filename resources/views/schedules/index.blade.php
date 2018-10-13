@extends('schedules.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Schedules</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="#"> Add Class</a>
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
            {{-- @foreach ($data as $key => $class) --}}
                {{-- <tr>
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
                    <a class="btn btn-info" href="#" title="View"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-primary" href="#" title="Edit"><i class="fa fa-edit"></i></a>
                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['class.destroy', $class->id],'style'=>'display:inline']) !!}
                        {!! Form::button('<i class="fa fa-trash"></i>', ['class' => 'btn btn-danger','title' => 'Delete','type' => 'submit', 'data-confirm' => 'Are you sure you want to delete?']) !!}
                    {!! Form::close() !!} --}}
                </td>
                </tr>
            {{-- @endforeach --}}
            </table>
    </div>
    <div class="col-lg-15">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div>
                        <h5 class="card-title m-b-0">Schedule Calendar</h5>
                    </div>
                    <div class="ml-auto">
                        <ul class="list-inline text-center font-12">
                            <li><i class="fa fa-circle text-success"></i> SITE A</li>
                            <li><i class="fa fa-circle text-info"></i> SITE B</li>
                            <li><i class="fa fa-circle text-primary"></i> SITE C</li>
                        </ul>
                    </div>
                </div>
                <div class="" id="sales-chart" style="height: 355px;"></div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex m-b-30 no-block">
                    <h5 class="card-title m-b-0 align-self-center">Performance</h5>
                    <div class="ml-auto">
                        <select class="custom-select b-0">
                            <option selected="">Today</option>
                            <option value="1">Tomorrow</option>
                        </select>
                    </div>
                </div>
                <div id="visitor" style="height:260px; width:100%;"></div>
                <ul class="list-inline m-t-30 text-center font-12">
                    <li><i class="fa fa-circle text-purple"></i> Present</li>
                    <li><i class="fa fa-circle text-success"></i> Absents</li>
                    <li><i class="fa fa-circle text-info"></i> Late</li>
                </ul>
            </div>
        </div>
    </div>
    
</div>





{{-- {!! $data->render() !!} --}}


@endsection