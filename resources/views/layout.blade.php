<!DOCTYPE html>
<html lang="en">

<head>
    
    @yield('head')
    @include('css')

</head>

<body class="fix-header fix-sidebar card-no-border">
    <div id="main-wrapper">
        <header class="topbar">

            @include('layouts.nav')

        </header>

        @yield('content')
        
    </div>

    @include('javascripts')

   

</body>

</html>