@extends('class.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add Class</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('my-class.index') }}"> Back</a>
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



{!! Form::open(array('route' => 'class.store','method'=>'POST')) !!}


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>College</strong>
        </div>
        <div class="input-group mb-3"><br>
                {{-- @foreach($college as $key => $value) --}}
                    {{-- {{ Form::select('clg_no', $colleges , array('class' => 'custom-select'))}} --}}
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