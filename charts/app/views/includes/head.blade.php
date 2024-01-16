<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>@if(isset($title)){{$title}} @else {{ '' }} @endif</title>
 <!--Loading bootstrap css-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&display=swap" rel="stylesheet"> 
    
{{HTML::style('vendors/jquery-ui-1.10.3.custom/css/ui-lightness/jquery-ui-1.10.3.custom.css', array('media'=>'screen'))}}
{{HTML::style('vendors/font-awesome/css/font-awesome.min.css', array('media'=>'screen'))}}
{{HTML::style('vendors/bootstrap/css/bootstrap.min.css', array('media'=>'screen'))}}
{{HTML::style('vendors/bootstrap-datepicker/css/datepicker.css', array('media'=>'screen'))}}
{{HTML::style('vendors/bootstrap-switch/css/bootstrap-switch.css?v=1', array('media'=>'screen'))}}
{{HTML::style('vendors/animate.css/animate.css', array('media'=>'screen'))}}
{{HTML::style('vendors/jquery-pace/pace.css', array('media'=>'screen'))}}
{{HTML::style('css/style.css', array('media'=>'screen'))}}
{{HTML::style('css/style-mango.css', array('media'=>'screen'))}}
{{HTML::style('css/vendors.css', array('media'=>'screen'))}}
{{HTML::style('css/themes/grey.css', array('media'=>'screen'))}}
{{HTML::style('vendors/datatables/css/dataTables.bootstrap.css', array('media'=>'screen'))}}
{{HTML::style('css/style-responsive.css', array('media'=>'screen'))}}    
</head>

<body>
<div>
<a id="totop" href="#"><i class="fa fa-angle-up"></i></a>