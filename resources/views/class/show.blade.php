@extends('class.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2><strong>{{$class->name}} </strong></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('class.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            <h5><label class="label label-info">{{ $class->description }}</label></h5>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Day:</strong>
            <h5><label class="label label-info">{{ $class->day }}</label></h5>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Room:</strong>
            <h5><label class="label label-info">{{ $class->room }}</label></h5>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Time:</strong>
            <h5><label class="label label-info">{{ $class->time }}</label></h5>
        </div>
    </div>
</div>
@endsection