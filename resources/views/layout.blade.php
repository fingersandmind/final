<!DOCTYPE html>
<html lang="en">

<head>
    
    @yield('head')
    <link href="{{asset('css/css/spinners.css')}}" rel="stylesheet">
    <link href="{{asset('css/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/scss/icons/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <header class="topbar">

            @include('layouts.nav')

        </header>

        @yield('content')
        
    </div>

    @yield('script')

</body>

</html>