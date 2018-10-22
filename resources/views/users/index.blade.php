@extends('users.layout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Teachers Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}" title="View"><i class="fa fa-eye"></i></a>
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}" title="Edit"><i class="fa fa-edit"></i></a>

    @csrf
    <button id ="{{$user->id}}" type="button" class="btn btn-danger delete" title="Delete"><i class="fa fa-trash"></i></button>
        
    </td>
  </tr>
 @endforeach
</table>
    

{!! $data->render() !!}

@endsection



@section('dashboard')

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <div>
                        <h5 class="card-title">Teacher's Dashboard</h5>
                    </div>
                </div>
                <div class="table-responsive m-t-20 no-wrap">
                    <table class="table vm no-th-brd pro-of-month">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $user)
                            <tr class="active">
                                <td><span class="round"><img src="{{asset("storage/avatars/".$user->avatar)}}" alt="user" width="50"></span></td>
                                <td>
                                    <h6>{{$user->name}}</h6>
                                </td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge badge-success">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}" title="View">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('votd')
<div class="col-lg-4">
    <div class="card">
        <div class="up-img" style="background-image:url({{asset('assets/images/big/img1.jpg')}})"></div>
        <div class="card-body">
            <h5 class=" card-title">Verse of the day</h5>
            <script src="http://www.verse-a-day.com/js/NIV.js"></script>
            <div class="d-flex m-t-20">
                <a class="link" href="https://www.biblestudytools.com/bible-verse-of-the-day/" target="_blank">Read more</a>
                <div class="ml-auto align-self-center">
                    <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart-o"></i></a>
                    <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-share-alt"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
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
                url: "{{route('users.delete')}}",
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
            'User Deleted',
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