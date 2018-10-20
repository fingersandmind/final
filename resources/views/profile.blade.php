@extends ('layout')

@section ('head')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>AdminWrap - Easy to Customize Bootstrap 4 Admin Template</title>
    <link href="{{asset('assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/css/colors/default.css')}}" id="theme" rel="stylesheet">

@endsection

@section('content')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor">Profile</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="m-t-30"> <img src="{{asset("storage/avatars/".$user->avatar)}}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{Auth::user()->name}}</h4>
                                <h6 class="card-subtitle">Accounts Manager Amix corp</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link">
                                        <i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link">
                                        <i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                </div>
                                <div class="row justify-content-center">
                                    <form action="update-avatar" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                                            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <div class="row">
                                        @if ($message = Session::get('success'))
                                
                                            <div class="alert alert-success alert-block">
                                
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @endif
                                
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                {{-- <strong>Whoops!</strong> There were some problems with your input.<br><br> --}}
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tab panes -->
                        <div class="card-body">
                            <form class="form-horizontal form-material" action="profile" method="post">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <h3>{{auth()->user()->name}}</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <h3>{{auth()->user()->email}}</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <h3>{{auth()->user()->username}}</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-12">Phone</label>
                                        <div class="col-md-12">
                                            <h3>{{auth()->user()->contact}}</h3>
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-success btn-rounded mb-4" 
                                            data-id="{{auth()->user()->id}}"
                                            data-myname="{{auth()->user()->name}}"
                                            data-myemail="{{auth()->user()->email}}"
                                            data-myusername="{{auth()->user()->username}}"
                                            data-mycontact="{{auth()->user()->contact}}"
                                            data-toggle="modal" data-target="#editProfile">Update Profile</button>
                                        </div>
                                    </div>
                                    @include('layouts.modal')
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2018 Adminwrap by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection

@section ('script')

<script src="{{asset('assets/node_modules/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/node_modules/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/node_modules/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{('js/js/perfect-scrollbar.jquery.min.js')}}"></script>
<!--Wave Effects -->
<script src="{{('js/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{('js/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{('js/js/custom.min.js')}}"></script>

@endsection

@push ('additionalJS')

    @if (session('status'))
        <script>
        swal("Looking Good Mate!","{{session('status') }}",'success')
        </script>
    @endif

<script>
    $('#editProfile').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var userId = button.data('id')
        var name = button.data('myname') 
        var email = button.data('myemail')
        var username = button.data('myusername')
        var contact = button.data('mycontact')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(userId);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #username').val(username);
        modal.find('.modal-body #phone').val(contact);
    })
</script>

@endpush