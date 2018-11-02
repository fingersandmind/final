@extends('class.layout')

@section('breadcrumbs')
<li class="breadcrumb-item active"><a href="{{route('class.index')}}">Classes</a></li>
    <li class="breadcrumb-item active">Edit</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Class</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('class.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


{!! Form::model($class, ['method' => 'PATCH','route' => ['class.update', $class->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {!! Form::text('description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Day:</strong>
            {!! Form::text('day', null, array('placeholder' => 'Day','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Room:</strong>
            {!! Form::text('room', null, array('placeholder' => 'Room','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time:</strong>
            {!! Form::text('schedule', null, array('placeholder' => 'Time','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>College</strong>
        </div>
        <div class="input-group mb-3"><br>
                {{-- @foreach($college as $key => $value) --}}
                    {{ Form::select('clg_no', $colleges, null, array('class' => 'custom-select'))}}
                    {{-- {{  Form::label($colleges->name, ucFirst($colleges->name)) }} --}}
                <br>
                {{-- @endforeach --}}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection

