<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  
    <title>Stock Charts</title>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- tabs js / css-->
	<script src="frontend/js/tab/jquery-1.7.1.min.js" type="text/javascript"></script> 
    <script src="frontend/js/tab/jquery.hashchange.min.js" type="text/javascript"></script>
    <script src="frontend/js/tab/jquery.easytabs.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="frontend/css/tabs.css" media="all"/>
    <!-- tabs js / css-->
    
    <!-- Your styles -->
    <link href="frontend/css/style.css" rel="stylesheet" media="screen">

     <!-- Favicons
    ================================================== -->


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- styles for IE -->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="frontend/css/ie/ie.css" type="text/css" media="screen" />
    <![endif]-->

     <style>
        .banner_subpage5 {

                background-image: url(http://cms.ock.net.my/uploads/banners/<?php echo $banner ?>);
                background-repeat: no-repeat;
                background-position: center top;
                height: 400px;
                width: 100%;
            
        }
    </style>
</head>
  <body> 
        <!-- Header-->
        <header class="slide1">            
            <!-- nav_logo-->
            <div class="nav_logo animated fadeInDown delay1">            
                <div class="container">
                    <div class="row-fluid">

                        <!-- Logo-->
                        <div class="span3 logo"><a href="http://cms.fareastholdingsbhd.com/" title="Back to Home"><img src="frontend/img/index/logo.png" alt="Far East Holdings Berhad"></a></div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">
                                <li><a href="{{ URL::to('/') }}">HOME</a></li>
                                <li>
                                	<a href="#">CORPORATE INFORMATION</a>
                                	<ul>                                  
                                        <li><a href="">Company Profile</a></li>
                                        <li><a href="">Shareholders</a></li>
                                        <li><a href="">Board of Directors</a></li>
                                        <li><a href="">Corporate Structure</a></li>
                                        <li><a href="">Management Team</a></li>
                                        <li><a href="">Audit Committee</a></li>
                                        <li><a href="">Board Charter</a></li>
                                        <li><a href="">Statutory Information</a></li>
                                        <li><a href="">E-recruitment</a></li>
                                        <li><a href="">Board Charter</a></li>
                                    </ul>
                                </li>

                                 <li>
                                    <a href="http://bursa.fareastholdingsbhd.com/">INVESTOR RELATIONS</a>
                                    <ul>                                  
                                        <li><a href="#">Corporate Announcement</a></li>
                                        <li><a href="#">Financial &amp; Estate Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/priceticker">Share Price</a></li>
                                                <li><a href="http://charts.fareastholdingsbhd.com/">Stock Charts</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialhighlights">Financial Statistics</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialposition">Statements of Financial Position</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/comprehensiveincome">Statements of Comprehensive Income</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialhighlights">Highlights</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/cashflowstatement"> Production Statistics</a></li>
                                                <li><a href="">Estate Location</a></li>
                                                <li><a href="">Estate Profile</a></li>
                                                <li><a href="">Key Audit Matters</a></li>
                                                <li><a href="#">Reports</a>
                                                	<ul>
                                                    	 <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/annualreports#all">Annual Reports</a></li>
                                                         <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/latestreport">Quarterly Reports</a></li>
                                                    </ul>
                                                    
                                                </li>
                                            </ul>
                                        </li>
                                        
                                    </ul>
                                </li> 
                                <li><a href="{{URL::to('')}}">AGM</a></li>                 
                          		<li><a href="#">MEDIA</a>
                                	<ul>
                                       <li><a href="{{URL::to('')}}">Company Bulletin</a></li>
                                       <li><a href="{{ URL::to('/pages/news_events') }}">News &amp; Events</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">LINKS</a>
                                	<ul>
                                       <li><a href="{{URL::to('')}}">Related Palm Oil Agencies</a></li>
                                       <li><a href="{{URL::to('')}}">Pahang State Government Agencies</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">CONTACT US</a></li>
                            </ul>
                            <!-- End Menu-->
                        </nav>
                        <!-- End Nav-->
                    </div>
                </div>
          </div>
            <!-- End nav_logo-->
            
            <!-- Slide -->
            
          <div class="banner_subpage5"></div>
            <!-- Info section Title-->
        
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>Stock Charts</h1>
                  </div>
                  <div class="span7">
                   <!-- <p>Full Turnkey Solutions for Telecom Client.</p>-->
                  </div>
                </div>
              </div>
          </div>
        </header>
        <!-- End Header-->
        
         
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container">
              <ul>
                <li><a href="http://cms.ock.net.my/">Home</a></li>
                <li>/</li>
                <li><a href="http://bursa.ock.net.my/">Investor Relations</a></li>
                <li>/</li>
                <li>Share Information</li>
                <li>/</li>
                <li>Stock Charts</li>
              </ul>
  </div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info">
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title">Daily Chart</h2>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                	<p class="pull-left">Technical Indicator: 
                    <select name="select" id="title">
                       <option>-- Loading --</option>
                    </select>
                    </p>
                    <div class="clearfix"></div>
                    
                   <div class="margin_top border_top border_bottom">
                   	   <div id="container" style="min-height:500px"></div>
                   </div>
                </div>
              </div>
            </div>
            <i class="icon-bar-chart right"></i>          </div>
          <!-- End Info white -->
  </section>
        <!-- End content info-->

        <!-- footer-->
        <footer>
            <div class="container">
                <div class="row-fluid">

                    <!-- Contact Us-->
                    <div class="span12">
                       <ul class="contact_footer">
                          <li>
                                <i class="icon-headphones"></i> + <i class="icon-envelope"></i> <a href="mailto:"> mail@mail.com</a> <i class="icon-map-marker"></i> Malaysia
                         </li>
                         <li>&copy; 2018. All Rights Reserved. <a href="http://www.webqom.com/web_design.html" target="_blank">Web Design Malaysia</a> &amp; <a href="http://www.webqom.com/web_hosting.html" target="_blank">Web Hosting Malaysia</a> </li>        
                        </ul>
                  </div>
                  <!-- Contact Us-->
                </div>
            </div>
        </footer>      
        <!-- End footer-->


   
        <!-- ======================= JQuery libs =========================== -->
        <!-- Always latest version of jQuery-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>   
        <!-- jQuery local-->      
        <script>window.jQuery || document.write('<script src="frontend/js/jquery-1.9.1.min.js"><\/script>')</script>
        <!-- jQuery ui-->    
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
        <!--Nav-->
        <script type="text/javascript" src="frontend/js/nav/tinynav.js"></script> 
        <script type="text/javascript" src="frontend/js/nav/superfish.js"></script>                                             
        <!--Totop-->
        <script type="text/javascript" src="frontend/js/totop/jquery.ui.totop.js" ></script>  
        <!--Slide-->
        <script type="text/javascript" src="frontend/js/slide/camera.js" ></script>      
        <script type='text/javascript' src='frontend/js/slide/jquery.easing.1.3.min.js'></script>   
        <!--flexsilider-->
        <script type="text/javascript" src="frontend/js/carousel/jquery.flexslider.js"></script>    
        <!--Ligbox--> 
        <script type="text/javascript" src="frontend/js/fancybox/jquery.fancybox-1.3.1.js"></script>  
        <!--Scrollama--> 
        <script type="text/javascript" src="frontend/js/scrollama/TweenMax.min.js"></script>
        <script type="text/javascript" src="frontend/js/scrollama/jquery.superscrollorama.js"></script>    
        <!--Gallery Grid--> 
        <script type="text/javascript" src="frontend/js/gallery/modernizr.custom.26633.js"></script>
        <script type="text/javascript" src="frontend/js/gallery/jquery.gridrotator.js"></script>     
        <!--Minislider Team-->         
        <script type="text/javascript" src="frontend/js/team/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="frontend/js/team/jquery.catslider.js"></script> 
        <!--Filters-->
        <script type="text/javascript" src="frontend/js/filters/filters.js" ></script>                            
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="frontend/js/bootstrap/bootstrap.js"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="frontend/js/jquery-func.js"></script>
        <!-- ======================= End JQuery libs =========================== -->
  </body>


   <script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>
   <script src="vendors/charts/exporting.js"></script>

   <script src="vendors/charts/technical-indicators.src.js"></script>
   <script src="frontend/js/chart.js?v=6"></script>
   
</html>