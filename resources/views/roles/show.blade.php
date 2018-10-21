@extends('roles.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>
<hr>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            <h3>{{ $role->name }}</h3>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>
        <br><br><br><hr>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            @can('role-delete')
            {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                {!! Form::hidden('id', $role->id) !!}
                {!! Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger delete', 'type' => 'button','id' => $role->id, 'title' => 'Delete']) !!}
            {!! Form::close() !!} --}}
            @endcan
        </div>
    </div>
</div>
@endsection
