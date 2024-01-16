@extends('layouts.admin_login')
@section('content')

<body id="signin-page" class="animated bounceInDown">
<div id="signin-page-content">
    {{ Form::open(array('url' => 'ForgotPassword')) }}
    	<div class="text-center"><a href="http://www.webqom.com/web88.html" target="_blank"><img src="assets/images/login/logo_web88.jpg" alt="Web88"></a></div>
        <h1 class="block-heading">Forgot Your Password?</h1>

        <p>Please enter your registered email to reset the password.</p>
        @if (Session::has('message'))
        <div class="alert alert-success alert-dismissable">
          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
          <i class="fa fa-check-circle"></i> <strong>Success!</strong>
          <p>{{ Session::get('message') }}</p>
        </div>
        @endif
        @if (Session::has('error_message'))
        <div class="alert alert-danger alert-dismissable">
          <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
          <i class="fa fa-times-circle"></i> <strong>Error!</strong>
          <p>{{ Session::get('error_message') }}</p>
        </div>
        @endif
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-user"></i>
                 {{ Form::text('email', Input::old('email'), array('placeholder' => 'Your Email','class' => 'form-control')) }}
                </div>
        </div>
        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reset Password
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a id="btn-forgot-pwd" href="{{ URL::to('ReturnToLogin') }}" class="mlm">Return to Login Page</a></div>
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



