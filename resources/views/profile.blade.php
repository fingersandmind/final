@extends ('layout')

@section ('head')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/favicon.png')}}">
    <title>AdminWrap - Easy to Customize Bootstrap 4 Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/node_modules/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('css/css/colors/default.css')}}" id="theme" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

@endsection

@section('content')
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li> <a class="waves-effect waves-dark" href="{{url('home')}}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                    </li>
                    @can('role-list')
                    <li> <a class="waves-effect waves-dark" href="{{ route('users.index') }}" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Manage Teachers</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="{{ route('roles.index') }}" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Manage Role</span></a>
                    </li>
                    @endcan
                    <li class="active"> <a class="waves-effect waves-dark" href="{{url('profile')}}" aria-expanded="false"><i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i class="fa fa-table"></i><span class="hide-menu">Tables</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false"><i class="fa fa-smile-o"></i><span class="hide-menu">Icons</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="fa fa-globe"></i><span class="hide-menu">Map</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span></a>
                    </li>
                    <li> <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false"><i class="fa fa-question-circle"></i><span class="hide-menu">404</span></a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
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
                                <h6 class="card-subtitle">Accoubts Manager Amix corp</h6>
                                <div class="row text-center justify-content-md-center">
                                    <div class="col-4"><a href="javascript:void(0)" class="link">
                                        <i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                    <div class="col-4"><a href="javascript:void(0)" class="link">
                                        <i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                </div>
                                <div class="row justify-content-center">
                                    <form action="profile" method="post" enctype="multipart/form-data">
                                        @csrf
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
                            <form class="form-horizontal form-material">
                                <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="{{auth()->user()->name}}" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="{{auth()->user()->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <a href="profile" class="btn btn-success">Update Profile</a>
                                    </div>
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