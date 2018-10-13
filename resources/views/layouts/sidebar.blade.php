<aside class="left-sidebar">
        <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('home')}}" aria-expanded="false">
                        <i class="fa fa-tachometer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                @can('role-list')
                <li> 
                    <a class="waves-effect waves-dark" href="{{ route('users.index') }}" aria-expanded="false">
                        <i class="fa fa-user"></i><span class="hide-menu">Manage Teachers</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{ route('roles.index') }}" aria-expanded="false">
                        <i class="fa fa-star"></i><span class="hide-menu">Manage Role</span>
                    </a>
                </li>
                @endcan
                
                <li> 
                    <a class="waves-effect waves-dark" href="{{url('profile')}}" aria-expanded="false">
                        <i class="fa fa-user-circle-o"></i><span class="hide-menu">Profile</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="{{ route('class.index') }}" aria-expanded="false">
                        <i class="fa fa-table"></i><span class="hide-menu">Classes</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="icon-fontawesome.html" aria-expanded="false">
                        <i class="fa fa-smile-o"></i><span class="hide-menu">Icons</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false">
                        <i class="fa fa-globe"></i><span class="hide-menu">Map</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false">
                        <i class="fa fa-bookmark-o"></i><span class="hide-menu">Blank</span>
                    </a>
                </li>

                <li> 
                    <a class="waves-effect waves-dark" href="pages-error-404.html" aria-expanded="false">
                        <i class="fa fa-question-circle"></i><span class="hide-menu">404</span>
                    </a>
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