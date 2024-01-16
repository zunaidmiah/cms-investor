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
     <link rel="apple-touch-icon" sizes="57x57" href="frontend/img/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="frontend/img/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="frontend/img/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="frontend/img/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="frontend/img/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="frontend/img/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="frontend/img/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="frontend/img/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="frontend/img/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="frontend/img/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="frontend/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="frontend/img/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="frontend/img/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="frontend/img/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

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

                background-image: url(http://cms.fareastholdingsbhd.com/uploads/banners/<?php echo $banner ?>);
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
                                <!--<li><a href="{{ URL::to('/') }}">HOME</a>                                </li>-->
                                <li><a href="http://cms.fareastholdingsbhd.com/">HOME</a>                                </li>
                                <li>
                                	<a href="#">COMPNAY</a>
                                	<ul>                                  
                                        <li><a href="http://cms.fareastholdingsbhd.com/profile">Corporate Profile</a></li>
                                        <li><a href="http://cms.fareastholdingsbhd.com/structure">Corporate Structure</a></li>
                                        <!--<li><a href="http://cms.fareastholdingsbhd.com/boardcharter">Board Charter</a></li>-->
                                        <li><a href="http://cms.fareastholdingsbhd.com/create_vacancy">Careers</a></li>  
                                        <li><a href="http://cms.fareastholdingsbhd.com/pages/news_events">CSR &amp; Company Bulletin</a></li>
                                        <li><a href="#">Links</a>
                                            <ul>
                                               <li><a href="http://www.mpob.gov.my/" target="_blank">Related Palm Oil Agencies</a></li>
                                               <li><a href="http://mpk.gov.my/" target="_blank">Pahang State Government Agencies</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">SUSTAINABILITY</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Sustainability_Policy.pdf" target="_blank">Sustainable Palm Oil Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Environmental_Protection.pdf" target="_blank">Environmental Protection &amp; Biological Diversity Policy</a></li>
												<li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Equality_Gender_Policy.pdf" target="_blank">Policy of Equality &amp; Gender</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Food_Safety_Policy.pdf" target="_blank">Food Safety Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Quality_Policy.pdf" target="_blank">Quality Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Safety_Health_Policy.pdf" target="_blank">Safety &amp; Health Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Safety_Policy.pdf" target="_blank">Safety Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Slope_and_River_Policy.pdf" target="_blank">Slope &amp; River Protection Policy</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/sustainability/Social_Policy.pdf" target="_blank">Social Policy</a></li>
                                                <li><a href="">Certification</a>
                                                	<ul>
                                                    	<li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/certificates/SGS_Certificate.pdf" target="_blank">SGS Certificate</a></li>
                                                        <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/certificates/Burueau_Veritas_Certification.pdf" target="_blank">Bureau Veritas Certification</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="#">GOVERNANCE</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/chairmanstatement">Corporate Governance</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/reviewoperations">Board Charter</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporategovernance">Whistle Blower Policy</a></li>
                                                <li><a href="#" target="_blank">Terms of Reference - Board Nomination Committee</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/frontend/img/governance/TOR_AUDIT_COMMITTEE_FINAL_2019.pdf" target="_blank">Terms of Reference - Audit and Risk Management Committee</a></li>

                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/pastperformance">Past Performance Review</a></li>-->
                                            </ul>
                                        </li>
                                <!--<li><a href="#">SERVICES</a>
                                	<ul>
                                        <li><a href="http://cms.fareastholdingsbhd.com/telecommunication">Telecommunications Network Services</a></li>

                                        <li><a href="http://cms.fareastholdingsbhd.com/trading">Trading of Telecommunication &amp; IT Products</a></li>

                                        <li><a href="http://cms.fareastholdingsbhd.com/greentech">Green Technology &amp; Solar</a></li>

                                        <li><a href="http://cms.fareastholdingsbhd.com/engineeringworks">M&amp;E Engineering Works</a></li>

                                        
                                    </ul>
                                </li>
                                <li><a href="http://cms.fareastholdingsbhd.com/clients">CLIENTS</a></li>-->
                                 <li>
                                    <a href="http://bursa.fareastholdingsbhd.com/">INVESTOR RELATIONS</a>
                                    <ul>                                  
                                        <li><a href="#">Corporate Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/general">Statutory Information</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/directorprofile">Board of Directors</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/keymanagemnet">Management Team</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/ourproperties">Audit and Risk Management Committee</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/oursubsidiaries">Our Subsidiaries</a></li>-->
                                            </ul>
                                        </li>
                                        <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporategovernance">Whistle Blower Policy</a></li>-->
                                        <li><a href="#">Estate Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/ipostatistics">Estate Location</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/competitiveadvantages">Estate Profile</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/riskfactors">Risk Factors</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/utilizationproceeds">Utilisation of Proceeds</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/industryoverview">Industry Overview</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Share Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/priceticker">Price Ticker</a></li>
                                                <li><a href="http://charts.fareastholdingsbhd.com/">Stock Charts</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/pricevolume">Price &amp; Volume</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/shareholdingsanalysis">Analysis of Shareholdings</a></li>-->
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/topshareholders">Shareholders</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/frontentitlement">Entitlements</a></li>-->
                                        <li><a href="#">Financial Information</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialhighlights">Financial Statistics</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/comprehensiveincome">Statements of Comprehensive Income</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialposition">Statements of Financial Position</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/cashflowstatement">Cash Flow Statement</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/equitychanges">Statement of Changes In Equity</a></li>-->
                                                
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/segmentalanalysis">Highlights</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/ratioanalysis">Production Statistics</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/latestreport">Key Audit Matters</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">News Centre</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/newscentre/bursaannouncements">Bursa Announcements</a></li>
                                                <li><a href="http://medianews.fareastholdingsbhd.com/news_centre_latest_media_news">Corporate News</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Reports</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/annualreports#all">Annual Reports</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/annualauditedaccounts#all">Annual Audited Accounts</a></li>-->
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/quarterlyreports">Quarterly Reports</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/circulars">Circulars</a></li>-->
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/prospectus">AGM/EGM/MSWG</a></li>
                                                <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/analystreports">Analyst Reports</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Investor Tools</a>
                                        	<ul>
                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/investortools/newsalerts">News Alert</a></li>
                                                <li><a href="http://cms.fareastholdingsbhd.com/calculator">Price Gain / Loss Calculator</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/eventcalendar">AGM/EGM/MSWG</a></li>-->
                                    </ul>
                                </li>               
                          		<li><a href="#">CONTACT US</a>
                                	<ul>
                                       <li><a href="http://bursa.fareastholdingsbhd.com/contactus">Contact Us</a></li>
                                       <li><a href="http://bursa.fareastholdingsbhd.com/contactus">Enquiry</a></li>
                                       <!--<li><a href="http://bursa.fareastholdingsbhd.com/regionaloffices">Regional Offices</a></li>-->
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
                    <p>Oil Palm Plantation Investment Holdings</p>
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
                                <i class="icon-headphones"></i> +(609) 514 1936 <i class="icon-envelope"></i> <a href="mailto:fareast@fareh.po.my"> fareast@fareh.po.my</a> <i class="icon-map-marker"></i> Level 23, Menara Zenith, Jalan Putra Square 6, 25200 Kuantan, Pahang Darul Makmur, Malaysia                          </li>
                         <li>&copy; 2018 Far East Holdings Berhad (14809-W). All Rights Reserved. <a href="http://www.webqom.com/web_design.html" target="_blank">Web Design Malaysia</a> &amp; <a href="http://www.webqom.com/web_hosting.html" target="_blank">Web Hosting Malaysia</a> </li>       
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