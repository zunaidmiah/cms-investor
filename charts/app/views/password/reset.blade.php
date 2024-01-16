<!DOCTYPE html>
<html lang="en">
<head>

<title>Login: Welcome to Web88 Administration Panel</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/images/icons/favicon.ico" rel="shortcut icon">
    <!--Loading bootstrap css-->
    <link type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,700,400italic,700italic' rel='stylesheet' type='text/css'>
    
    
<link type="text/css" rel="stylesheet" href="/vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
<link type="text/css" rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="/vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING SCRIPTS FOR PAGE-->
    <!--LOADING SCRIPTS FOR PAGE-->
<link type="text/css" rel="stylesheet" href="/vendors/bootstrap-datepicker/css/datepicker.css">
<link type="text/css" rel="stylesheet" href="/vendors/bootstrap-switch/css/bootstrap-switch.css">
    
    <!--Loading style vendors-->
<link type="text/css" rel="stylesheet" href="/vendors/animate.css/animate.css">
<link type="text/css" rel="stylesheet" href="/vendors/jquery-pace/pace.css">
    <!--Loading style-->
<link type="text/css" rel="stylesheet" href="/css/style.css">
<link type="text/css" rel="stylesheet" href="/css/style-mango.css" id="theme-style">
<link type="text/css" rel="stylesheet" href="/css/vendors.css">
<link type="text/css" rel="stylesheet" href="/css/themes/grey.css" id="color-style">
<link type="text/css" rel="stylesheet" href="/css/style-responsive.css">

    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body id="signin-page" class="animated bounceInDown">
<div id="signin-page-content">
@if(Session::has('error'))
			<div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>{{ Session::get('error')  }}</p>
              </div>
@endif
   <form action="{{ action('RemindersController@postReset') }}" method="POST">
   <input type="hidden" name="token" value="{{ $token }}">
    	<div class="text-center"><a href="http://www.webqom.com/web88.html" target="_blank"><img src="/images/login/logo_web88.jpg" alt="Web88"></a></div>
        <h1 class="block-heading">Forgot Your Password?</h1>

        <p>Please enter your registered email to reset the password.</p>

        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            {{ Form::email('email','',array('class'=>'form-control','placeholder'=>"Your Email")) }}</div>
        </div>
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            {{ Form::password('password',array('class'=>'form-control','placeholder'=>"New Password")) }}</div>
        </div>
        <div class="form-group">
            <div class="input-icon"><i class="fa fa-key"></i>
            {{ Form::password('password_confirmation',array('class'=>'form-control','placeholder'=>"Confirm New Password")) }}</div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a id="btn-forgot-pwd" href="/login" class="mlm">Return to Login Page</a></div>
        <hr>
        <a href="mailto:hock@webqom.com"><i class="fa fa-envelope"></i> hock@webqom.com</a>
        <a href="http://www.facebook.com/webqomtechnologies" class="pull-right" target="_blank"><i class="fa fa-facebook-square"></i> /webqomtechnologies</a><br/>
        <i class="fa fa-phone"></i>+(603) 2630 5562
        <span class="margin-top-5px text-12px pull-right">&copy; 2014 <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn. Bhd.</a></span>
        
    </form>
</div>
<script src="/js/jquery-1.9.1.js"></script>
<script src="/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendors/bootstrap-hover-dropdown.js"></script>
<script src="/js/html5shiv.js"></script>
<script src="/js/respond.min.js"></script>
<script src="/vendors/jquery-cookie/jquery.cookie.js"></script>

<script type="text/javascript">
$(document).ready(function(e) {
    $('form').submit(function(e) {
        if($('[type="password"]').val().length<12){
			alert("Password must be at least 12 characters long");
			return false;
		}
    });
});
</script>
</body>
</html>