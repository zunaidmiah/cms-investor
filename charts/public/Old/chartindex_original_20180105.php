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
                        <div class="span3 logo"><a href="http://cms.ock.net.my/" title="Back to Home"><img src="frontend/img/index/logo.png" alt="OCK Group Berhad"></a></div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">
                                <li><a href="http://cms.ock.net.my/">HOME</a>                                </li>
                                <li>
                                	<a href="#">ABOUT US</a>
                                	<ul>                                  
                                        <li><a href="http://ock.net.my/profile">Corporate Profile</a></li>
                                        <li><a href="http://ock.net.my/mission">Vision &amp; Mission</a></li>
                                        <li><a href="http://ock.net.my/board">Board of Directors</a></li>
                                        <li><a href="http://ock.net.my/structure">Corporate Structure</a></li>
                                        <li><a href="http://ock.net.my/milestone">Milestone</a></li>
                                        <li><a href="http://ock.net.my/achievement">Achievements</a></li>
                                        <li><a href="http://ock.net.my/boardcharter">Board Charter</a></li>
                                        <li><a href="http://cms.ock.net.my/pages/news_events">News &amp; Events</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">CORE BUSINESS</a>
                                	<ul>
                                        <li><a href="http://ock.net.my/telecommunication">Telecommunications Network Services</a></li>

                                        <li><a href="http://ock.net.my/trading">Trading of Telecommunication &amp; IT Products</a></li>

                                        <li><a href="http://ock.net.my/greentech">Green Technology &amp; Solar</a></li>

                                        <li><a href="http://ock.net.my/engineeringworks">M&amp;E Engineering Works</a></li>

                                        
                                    </ul>
                                </li>
                                <li><a href="http://ock.net.my/clients">CLIENTS</a></li>
                                 <li>
                                    <a href="http://bursa.ock.net.my/">INVESTOR RELATIONS</a>
                                    <ul>                                  
                                        <li><a href="#">Corporate Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/corporateinformation/general">General</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/corporateinformation/directorprofile">Director's Profile</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/corporateinformation/keymanagemnet">Key Management Team</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/corporateinformation/ourproperties">Our Properties</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/corporateinformation/oursubsidiaries">Our Subsidiaries</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="http://bursa.ock.net.my/investorrelations/corporategovernance">Corporate Governance</a></li>
                                        <li><a href="#">IPO Centre</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/ipocentre/ipostatistics">IPO Statistics</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/ipocentre/competitiveadvantages">Competitive Advantages</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/ipocentre/riskfactors">Risk Factors</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/ipocentre/utilizationproceeds">Utilisation of Proceeds</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/ipocentre/industryoverview">Industry Overview</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Share Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/shareinformation/priceticker">Price Ticker</a></li>
                                                <li><a href="http://charts.ock.net.my/">Stock Charts</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/shareinformation/pricevolume">Price &amp; Volume</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/shareinformation/shareholdingsanalysis">Analysis of Shareholdings</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/shareinformation/topshareholders">Top 30 Shareholders</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="http://bursa.ock.net.my/investorrelations/frontentitlement">Entitlements</a></li>
                                        <li><a href="#">Financial Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/financialhighlights">Financial Highlights</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/comprehensiveincome">Comprehensive Income</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/financialposition">Financial Position</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/cashflowstatement">Cash Flow Statement</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/equitychanges">Statement of Changes In Equity</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/latestreport">Latest Quarterly Report</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/segmentalanalysis">Segmental Analysis</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/financialinformation/ratioanalysis">Ratio Analysis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Management Analysis</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/managementanalysis/chairmanstatement">Chairman's Statement</a></li>

                                                <li><a href="http://bursa.ock.net.my/investorrelations/managementanalysis/reviewoperations">Review Of Operations</a></li>

                                                <li><a href="http://bursa.ock.net.my/investorrelations/managementanalysis/pastperformance">Past Performance Review</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">News Centre</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/newscentre/bursaannouncements">Bursa Announcements</a></li>
                                                <li><a href="http://medianews.ock.net.my/news_centre_latest_media_news">Media News</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Reports</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/reports/annualreports#all">Annual Reports</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/reports/annualauditedaccounts#all">Annual Audited Accounts</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/reports/quarterlyreports">Quarterly Reports</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/reports/circulars">Circulars</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/reports/prospectus">Prospectus</a></li>
                                                <li><a href="http://bursa.ock.net.my/investorrelations/reports/analystreports">Analyst Reports</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Investor Tools</a>
                                        	<ul>
                                            	<li><a href="http://bursa.ock.net.my/investorrelations/investortools/newsalerts">News Alert</a></li>
                                                <li><a href="http://ock.net.my/calculator">Price Gain / Loss Calculator</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="http://bursa.ock.net.my/investorrelations/eventcalendar">Event Calendar</a></li>
                                    </ul>
                                </li> 
                                <li><a href="http://cms.ock.net.my/create_vacancy">CAREERS</a></li>                                                    
                          		<li><a href="#">CONTACT US</a>
                                	<ul>
                                       <li><a href="http://bursa.ock.net.my/contactus">Contact Us</a></li>
                                       <li><a href="http://bursa.ock.net.my/contactus">Enquiry</a></li>
                                       <li><a href="http://bursa.ock.net.my/regionaloffices">Regional Offices</a></li>
                                    </ul>
                              </li>
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
                    <p>Full Turnkey Solutions for Telecom Client.</p>
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
                                <i class="icon-headphones"></i> +(603) 5565 9688  <i class="icon-envelope"></i> <a href="mailto:enquiry@myock.com"> enquiry@myock.com</a> <i class="icon-map-marker"></i> No. 18, Jalan Jurunilai U1/20, Seksyen U1, HICOM Glenmarie Industrial Park, 40150 Shah Alam, Selangor, Malaysia                        </li>
                         <li>&copy; 2015 OCK Group Berhad (955915-M). All Rights Reserved. <a href="http://www.webqom.com/web_design.html" target="_blank">Web Design Malaysia</a> &amp; <a href="http://www.webqom.com/web_hosting.html" target="_blank">Web Hosting Malaysia</a></li>       
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