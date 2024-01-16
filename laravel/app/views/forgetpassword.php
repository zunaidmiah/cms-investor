<!DOCTYPE html>
<html lang="en">
<head>

<title>Media News Admin Login: Welcome to Web88 Administration Panel</title>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../admin/images/icons/favicon.ico" rel="shortcut icon">
    <!--Loading bootstrap css-->

<link type="text/css" rel="stylesheet" href="../css/fonts.css">

<link type="text/css" rel="stylesheet" href="../admin/vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css">
<link type="text/css" rel="stylesheet" href="../admin/vendors/font-awesome/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="../admin/vendors/bootstrap/css/bootstrap.min.css">
    <!--LOADING SCRIPTS FOR PAGE-->
    <!--LOADING SCRIPTS FOR PAGE-->
<link type="text/css" rel="stylesheet" href="../css/bootstrap-datepicker.css">
<link type="text/css" rel="stylesheet" href="../css/bootstrap-switch.min.css">
    
    <!--Loading style vendors-->
<link type="text/css" rel="stylesheet" href="../admin/vendors/animate.css/animate.css">
<link type="text/css" rel="stylesheet" href="../admin/vendors/jquery-pace/pace.css">


    <!--Loading style-->
<link type="text/css" rel="stylesheet" href="../admin/css/style.css">
<link type="text/css" rel="stylesheet" href="../admin/css/style-mango.css" id="theme-style">
<link type="text/css" rel="stylesheet" href="../admin/css/vendors.css">
<link type="text/css" rel="stylesheet" href="../admin/css/themes/grey.css" id="color-style">
<link type="text/css" rel="stylesheet" href="../admin/css/style-responsive.css">

<style>
  body {
    font-family: 'Open Sans', sans-serif !important;
  }
</style>

    
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body id="signin-page" class="animated bounceInDown">
<div id="signin-page-content">
    
    <form action="forgetpassword" class="form" method="post">
        
        <?php if(isset($error)){ ?>
        <div class="alert-danger alert warning"><?php echo $error ?> </div>
        <?php } ?>
    	<div class="text-center"><a href="http://www.webqom.com/web88.html" target="_blank"><img src="../admin/images/login/logo_web88.jpg" alt="Web88"></a></div>
        <h1 class="block-heading">Forgot Your Password?</h1>

        <p>Please enter your registered email to reset the password.</p>

         <div class="form-group">
            <div class="input-icon"><i class="fa fa-user"></i><input type="text" placeholder="Your Email" name="email" class="form-control"></div>
        </div>
        

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Reset Password
                &nbsp;<i class="fa fa-chevron-circle-right"></i></button>
            <a id="btn-forgot-pwd" href="/" class="mlm">Return to Login Page</a></div>
        <hr>
        <a href="mailto:hock@webqom.com"><i class="fa fa-envelope"></i> hock@webqom.com</a>
        <a href="http://www.facebook.com/webqomtechnologies" class="pull-right" target="_blank"><i class="fa fa-facebook-square"></i> /webqomtechnologies</a><br/>
        <i class="fa fa-phone"></i>+(603) 8688 3850
        <span class="margin-top-5px text-12px pull-right">&copy; 2020 <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn. Bhd.</a></span>
        
    </form>
</div>
<script src="../admin/js/jquery-1.9.1.js"></script>
<script src="../admin/js/jquery-migrate-1.2.1.min.js"></script>
<script src="../admin/js/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="../admin/vendors/bootstrap/js/bootstrap.min.js"></script>
<script src="../admin/vendors/bootstrap-hover-dropdown.js"></script>
<script src="../admin/js/html5shiv.js"></script>
<script src="../admin/js/respond.min.js"></script>
<script src="../admin/vendors/jquery-cookie/jquery.cookie.js"></script>
</body>
</html>