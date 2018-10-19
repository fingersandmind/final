@extends ('sessions.layout')

@section('content')
    <div id="loginbox">            
        <form method="POST" class="form-vertical" action="login">
            @csrf
            {{-- <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div> --}}
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        {{-- <span class="add-on bg_lg"><i class="icon-user"> </i></span> --}}
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address Or Username" required/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        {{-- <span class="add-on bg_ly"><i class="icon-lock"></i></span> --}}
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required/>
                    </div>
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                <span class="pull-right"><button type="submit" class="btn btn-success">Login</button></span>
            </div>
        </form>
        <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
            
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                    </div>
                </div>
        
            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                <span class="pull-right"><a class="btn btn-info">Recover</a></span>
            </div>
        </form>
    </div>
@endsection