@extends('class.layout')

@section('breadcrumbs')
<li class="breadcrumb-item active"><a href="{{ url()->previous() }}">Classes</a></li>
    <li class="breadcrumb-item active">View</li>
@endsection


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2><strong>{{$class->name}} </strong></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <h3><label class="label label-info">{{ $class->name }}</label></h3>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            <h3><label class="label label-info">{{ $class->description }}</label></h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Day:</strong>
            <h3><label class="label label-info">{{ $class->day }}</label></h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Room:</strong>
            <h3><label class="label label-info">{{ $class->room }}</label></h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Schedule:</strong>
            <h3><label class="label label-info">{{ $class->schedule }}</label></h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>College</strong>
                <h3><label class="label label-info">{{ $class->college->description . "(". $class->college->name . ")"}}</label></h3>
            </div>
        </div>
</div>
@endsection