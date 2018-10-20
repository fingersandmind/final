<nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('home')}}">
            <b>
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" />
            </b>
            <span>
                <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" />
                <img src="{{asset('assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage" />
            </span> </a>
        </div>
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-bars"></i></a> </li>
            
            {{-- <li class="nav-item hidden-xs-down search-box"> <a class="nav-link hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="fa fa-search"></i></a>
                <form class="app-search">
                    <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="fa fa-times"></i></a></form>
            </li> --}}
            
        </ul>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
        <ul class="navbar-nav my-lg-0">
            <!-- ============================================================== -->
            <!-- Profile -->
            <!-- ============================================================== -->
            <li class="nav-item dropdown u-pro">
                @if(Auth::check())
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset("storage/avatars/".auth()->user()->avatar)}}" alt="user" class="" /> 
                    <span class="hidden-md-down">{{auth()->user()->name}}&nbsp;</span> </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{route('home')}}">Dashboard</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </div>
                @endif
            </li>
        </ul>
    </div>
</nav>