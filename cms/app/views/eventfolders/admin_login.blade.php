@extends('layouts.admin_login')
@section('content')

<body id="signin-page" class="animated bounceInDown">
<div id="signin-page-content">
    {{ Form::open(array('url' => 'adminLogin')) }}
    	<div class="text-center"><a href="http://www.webqom.com/web88.html" target="_blank">
                <img src="assets/images/login/logo_web88.jpg" alt="Web88"></a></div>
        <h1 class="block-heading">Web88 CMS Admin Login</h1>

        <p>Please enter your login details to access.</p>

        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-user"></i>
                {{ Form::text('username', Input::old('username'), array('placeholder' => 'Username','class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-key"></i>
                {{ Form::password('password',array('placeholder' => 'Password','class' => 'form-control')) }}
            </div>
        </div>
        <div class="form-group">
            <div class="checkbox"><label><input type="checkbox">&nbsp;
                Remember me</label></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a id="btn-forgot-pwd" href="forgot_password.html" class="mlm">Forgot your password?</a></div>
        <hr>
        <a href="mailto:hock@webqom.com"><i class="fa fa-envelope"></i> hock@webqom.com</a>
        <a href="http://www.facebook.com/webqomtechnologies" class="pull-right" target="_blank"><i class="fa fa-facebook-square"></i> /webqomtechnologies</a><br/>
        <i class="fa fa-phone"></i>+(603) 2630 5562
        <span class="margin-top-5px text-12px pull-right">&copy; 2014 <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn. Bhd.</a></span>
        
    {{ Form::close() }}
</div>
<script src="{{ URL::asset('/assets/js/jquery-1.9.1.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/jquery-ui.js') }}"></script>
<!--loading bootstrap js-->
<script src="{{ URL::asset('/assets/vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js') }}"></script>
<script src="{{ URL::asset('/assets/js/html5shiv.js') }}"></script>
<script src="{{ URL::asset('/assets/js/respond.min.js') }}"></script>
<script src="{{ URL::asset('/assets/vendors/jquery-cookie/jquery.cookie.js') }}"></script>
</body>

@stop