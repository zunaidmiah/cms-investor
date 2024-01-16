	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>
        @if(isset($metaTitle) != '')  
        {{ @strip_tags($metaTitle) }}
        @else
        Investor Relations
        @endif
        </title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<!-- Mobile Specific Metas
	================================================== -->
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
 <link rel="icon" href="images/favicon.ico" type="image/x-icon">-->
 <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="images/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
 {{ HTML::style('css/frontstyle.css');}}
 {{ HTML::style('css/tabs.css');}}
  <script src="{{ url() }}/js/tab/jquery-1.7.1.min.js" type="text/javascript"></script> 
        <script src="{{ url() }}/js/tab/jquery.hashchange.min.js" type="text/javascript"></script>
        <script src="{{ url() }}/js/tab/jquery.easytabs.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ url() }}/css/tabs.css" media="all"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.7.1/themes/smoothness/jquery-ui.css">
        <style>
            #ui-datepicker-div { font-size:11px; }
        </style>


   

<!--Loading bootstrap css-->
