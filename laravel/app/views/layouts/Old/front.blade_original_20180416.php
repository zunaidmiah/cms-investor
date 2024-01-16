<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    
  <title>Media News</title>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Your styles -->
	<link media="screen" type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/css/style.css"/>

    <!-- tabs js / css-->
    <link media="all" type="text/css" rel="stylesheet" href="{{ URL::to('/') }}/css/tabs.css"/>
	<script src="{{ URL::to('/') }}/js/tab/jquery-1.7.1.min.js" type="text/javascript"></script> 
    <script src="{{ URL::to('/') }}/js/tab/jquery.hashchange.min.js" type="text/javascript"></script>
    <script src="{{ URL::to('/') }}/js/tab/jquery.easytabs.min.js" type="text/javascript"></script>
    <!-- tabs js / css-->

     <!-- Favicons
    ================================================== -->


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- styles for IE -->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="css/ie/ie.css" type="text/css" media="screen" />
    <![endif]-->

    <style>
        .banner_subpage5 {

                background-image: url(http://cms.fareastholdingsbhd.com/uploads/banners/{{$banner}});
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
                        <div class="span3 logo">
                            <a href="http://cms.fareastholdingsbhd.com/" title="Back to Home">                            
                                <img src="../../../../img/index/logo.png" alt="OCK Group Berhad">                            </a>                        </div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">

                                <li><a href="http://cms.fareastholdingsbhd.com/">HOME</a>                                </li>

                                <li>

                                	<a href="#">ABOUT US</a>

                                	<ul>                                  

                                        <li><a href="http://fareastholdingsbhd.com/profile">Corporate Profile</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/mission">Vision &amp; Mission</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/board">Board of Directors</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/structure">Corporate Structure</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/milestone">Milestone</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/achievement">Achievements</a></li>
                                        <li><a href="http://fareastholdingsbhd.com/boardcharter">Board Charter</a></li>

                                        <li><a href="http://cms.fareastholdingsbhd.com/pages/news_events">News &amp; Events</a></li>

                                    </ul>

                                </li>

                                <li><a href="#">CORE BUSINESS</a>

                                	<ul>                                  

                                         <li><a href="http://fareastholdingsbhd.com/telecommunication">Telecommunications Network Services</a></li>

                                        <li><a href="http://fareastholdingsbhd.com/trading">Trading of Telecommunication &amp; IT Products</a></li>

                                        <li><a href="http://fareastholdingsbhd.com/greentech">Green Technology &amp; Solar</a></li>

                                        <li><a href="http://fareastholdingsbhd.com/engineeringworks">M&amp;E Engineering Works</a></li>

                                    </ul>

                                </li>

                                <li><a href="http://www.fareastholdingsbhd.com/clients">CLIENTS</a></li>

                                 <li>

                                    <a href="http://bursa.fareastholdingsbhd.com/">INVESTOR RELATIONS</a>

                                    <ul>                                  

                                        <li><a href="#">Corporate Information</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/general">General</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/directorprofile">Director's Profile</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/keymanagemnet">Key Management Team</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/ourproperties">Our Properties</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporateinformation/oursubsidiaries">Our Subsidiaries</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/corporategovernance">Corporate Governance</a></li>

                                        <li><a href="#">IPO Centre</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/ipostatistics">IPO Statistics</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/competitiveadvantages">Competitive Advantages</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/riskfactors">Risk Factors</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/utilizationproceeds">Utilisation of Proceeds</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/ipocentre/industryoverview">Industry Overview</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#">Share Information</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/priceticker">Price Ticker</a></li>

                                                <li><a href="http://charts.fareastholdingsbhd.com/">Stock Charts</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/pricevolume">Price &amp; Volume</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/shareholdingsanalysis">Analysis of Shareholdings</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/shareinformation/topshareholders">Top 30 Shareholders</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/frontentitlement">Entitlements</a></li>

                                        <li><a href="#">Financial Information</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialhighlights">Financial Highlights</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/comprehensiveincome">Comprehensive Income</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/financialposition">Financial Position</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/cashflowstatement">Cash Flow Statement</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/equitychanges">Statement of Changes In Equity</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/latestreport">Latest Quarterly Report</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/segmentalanalysis">Segmental Analysis</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/financialinformation/ratioanalysis">Ratio Analysis</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#">Management Analysis</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/chairmanstatement">Chairman's Statement</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/reviewoperations">Review Of Operations</a></li>

                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/managementanalysis/pastperformance">Past Performance Review</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#">News Centre</a>

                                        	<ul>


                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/newscentre/bursaannouncements">Bursa Announcements</a></li>

                                                <li><a href="http://medianews.fareastholdingsbhd.com/news_centre_latest_media_news">Media News</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#">Reports</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/annualreports#all">Annual Reports</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/annualauditedaccounts#all">Annual Audited Accounts</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/quarterlyreports">Quarterly Reports</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/circulars">Circulars</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/prospectus">Prospectus</a></li>
                                                <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/reports/analystreports">Analyst Reports</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="#">Investor Tools</a>

                                        	<ul>

                                            	<li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/investortools/newsalerts">News Alert</a></li>

                                                <li><a href="http://fareastholdingsbhd.com/calculator">Price Gain / Loss Calculator</a></li>

                                            </ul>

                                        </li>

                                        <li><a href="http://bursa.fareastholdingsbhd.com/investorrelations/eventcalendar">Event Calendar</a></li>

                                    </ul>

                                </li> 

                                <li><a href="http://cms.fareastholdingsbhd.com/create_vacancy">CAREERS</a></li>                                                    

                          		<li><a href="#">CONTACT US</a>

                                	<ul>

                                       <li><a href="http://bursa.fareastholdingsbhd.com/contactus">Contact Us</a></li>
                                       <li><a href="http://bursa.fareastholdingsbhd.com/contactus">Enquiry</a></li>
                                       <li><a href="http://bursa.fareastholdingsbhd.com/regionaloffices">Regional Offices</a></li>

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
            
            <!-- Dynamic banners edited-->
            
            <div class="banner_subpage5"></div>
            <!-- Info section Title-->
        
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>Media News</h1>
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

                <li><a href="http://cms.fareastholdingsbhd.com/">Home</a></li>

                <li>/</li>

                <li><a href="http://bursa.fareastholdingsbhd.com/">Investor Relations</a></li>

                <li>/</li>

                <li>News Centre</li>

                <li>/</li>

                <li>Latest Media News</li>
              </ul>
            </div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info">

            @yield('content')        

          <!-- Info title-->
		  <!--<div class="row-fluid info_title">
 				<br/>
                <div class="info_vertical">
                    <h2><span>Our Clients</span></h2>
                    <p>"We bring a personal and effective approach to every project we work on, which is why our clients love us and why they keep coming back."</p>
                </div>
                <br/>
                <div class="vertical_line"><div class="circle_top"></div></div>

                <i class="icon-group left"></i>            </div>-->
            <!-- End Info title-->
           
            <!-- clients-->
            <!--<section class="info_resalt border_top">
            	
              <div class="container">
               <div class="row-fluid">  
                <div class="sponsors" id="sponsors">                
                    <ul class="slides">
                       <li>
                          <a href="#"  class="tooltip_hover" title="Digi"><img src="../../../../img/logo/digi.png" alt="Digi"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="U Mobile"><img src="../../../../img/logo/umobile.png" alt="U Mobile"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Maxis"><img src="../../../../img/logo/maxis.png" alt="Maxis"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Celcom"><img src="../../../../img/logo/celcom.png" alt="Celcom"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Ericsson"><img src="../../../../img/logo/ericsson.png" alt="Ericsson"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="NEC"><img src="../../../../img/logo/nec.png" alt="NEC"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Alcatel Lucent"><img src="../../../../img/logo/alcatel_lucent.png" alt="Alcatel Lucent"></a>                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Huawei"><img src="../../../../img/logo/huawei.png" alt="Huawei"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="ZTE"><img src="../../../../img/logo/zte.png" alt="ZTE"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="P1"><img src="../../../../img/logo/p1.png" alt="P1"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="yes"><img src="../../../../img/logo/yes.png" alt="yes"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="nsn"><img src="../../../../img/logo/nsn.png" alt="nsn"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Smart"><img src="../../../../img/logo/smart.png" alt="Smart"></a>                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Axiata"><img src="../../../../img/logo/axiata.png" alt="Axiata"></a>                       </li>                                       
                    </ul> 
                </div>
              </div>  
             </div>  
            </section>  -->
            <!-- End clients--> 
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
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <!-- jQuery ui-->    
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script>
        <!--Nav-->
        <script type="text/javascript" src="../../../../js/nav/tinynav.js"></script> 
        <script type="text/javascript" src="../../../../js/nav/superfish.js"></script>                                             
        <!--Totop-->
        <script type="text/javascript" src="../../../../js/totop/jquery.ui.totop.js" ></script>  
        <!--Slide-->
        <script type="text/javascript" src="../../../../js/slide/camera.js" ></script>      
        <script type='text/javascript' src='../../../../js/slide/jquery.easing.1.3.min.js'></script>   
        <!--flexsilider-->
        <script type="text/javascript" src="../../../../js/carousel/jquery.flexslider.js"></script>    
        <!--Ligbox--> 
        <script type="text/javascript" src="../../../../js/fancybox/jquery.fancybox-1.3.1.js"></script>  
        <!--Scrollama--> 
        <script type="text/javascript" src="../../../../js/scrollama/TweenMax.min.js"></script>
        <script type="text/javascript" src="../../../../js/scrollama/jquery.superscrollorama.js"></script>    
        <!--Gallery Grid--> 
        <script type="text/javascript" src="../../../../js/gallery/modernizr.custom.26633.js"></script>
        <script type="text/javascript" src="../../../../js/gallery/jquery.gridrotator.js"></script>     
        <!--Minislider Team-->         
        <script type="text/javascript" src="../../../../js/team/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="../../../../js/team/jquery.catslider.js"></script> 
        <!--Filters-->
        <script type="text/javascript" src="../../../../js/filters/filters.js" ></script>                            
        <!-- Bootstrap.js-->
        <script type="text/javascript" src="../../../../js/bootstrap/bootstrap.js"></script>
        <!--fUNCTIONS-->
        <script type="text/javascript" src="../../../../js/jquery-func.js"></script>
        <!-- ======================= End JQuery libs =========================== -->
        <!-- CUSTOM OCK JS -->
        {{HTML::script('js/custom_ock.js')}}
        
        <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new
		Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		
		   ga('create', 'UA-79192288-1', 'auto');
		   ga('send', 'pageview');
		
		</script>
        
  </body>
</html>