<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
  
    <title>Stock Charts</title>
  
<meta name='robots' content='noindex,nofollow'>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel='stylesheet' href='frontend/assets/new/css/core/reset.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/core/wordpress.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/modulobox.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/menus/left-align-menu.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/themify-icons.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/tooltipster.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/core/demo.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/loftloader/assets/css/loftloader.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/lib/animations/animations.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/css/frontend.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/avante-elementor/assets/css/swiper.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/avante-elementor/assets/css/justifiedGallery.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/avante-elementor/assets/css/flickity.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/avante-elementor/assets/css/avante-elementor.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/avante-elementor/assets/css/avante-elementor-responsive.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/core/responsive.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/lib/font-awesome/css/fontawesome.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/lib/font-awesome/css/solid.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/lib/font-awesome/css/regular.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/js/plugins/elementor/assets/lib/font-awesome/css/brands.min.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/style.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/elementor/global.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/elementor/pagebuilder.css' type='text/css' media='all'>
    <link rel='stylesheet' href='frontend/assets/new/css/elementor/bootstrap.min.css' type='text/css' media='all'>



    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">
<link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


   

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


     <style>
        .banner_subpage5 {

                background-image: url('uploads/banners/{{$banner}}');
                background-repeat: no-repeat;
                background-position: center top;
                height: 400px;
                width: 100%;
            
        }
    </style>
</head>
  <body data-rsssl="1" class="home page-template-default page page-id-4074 theme-avante woocommerce-no-js menu-transparent lightbox-black leftalign footer-reveal elementor-default elementor-page elementor-page-4074"> 
        
     <div id="loftloader-wrapper" class="pl-imgloading" data-show-close-time="15000">
        <div class="loader-inner">
            <div id="loader">
                <div class="imgloading-container">
                    <span style="background-image: url(frontend/assets/new/images/index/loading_logo.jpg);"></span>
                </div>
                <img alt="loader image" src="frontend/assets/new/images/index/loading_logo.jpg">
            </div>
        </div>
        <div class="loader-section section-fade">
        </div>
        <div class="loader-close-button" style="display: none;">
            <span class="screen-reader-text">Close</span>
        </div>
    </div><!-- end loftloader wrapper -->
    
    <div id="perspective" style="">
        <!-- Begin mobile menu -->
        <a id="btn-close-mobile-menu" href="javascript:;"></a>
        <div class="mobile-menu-wrapper">
            <div class="mobile-menu-content">
                <div class="menu-main-menu-container">
                    <ul id="mobile_main_menu" class="mobile-main-nav">
                        <li class="menu-item current-menu-item menu-item-home"><a href="<?php echo 'cms'; ?>">Home</a></li>
                        <li class="menu-item menu-item-has-children"><a href="#">Company</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="<?php echo 'cms/ceomessage'; ?>">CEO's Message</a></li>
				<li class="menu-item"><a href="<?php echo 'cms/profile'; ?>">Corporate Profile</a></li>
                                <li class="menu-item"><a href="<?php echo 'cms/structure'; ?>">Corporate Structure</a></li>
                                <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/directorprofile'; ?>">Board of Directors</a></li>
                                <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/keymanagemnet'; ?>">Key Senior Management</a></li>
                                <!--<li class="menu-item"><a href="#">Careers</a></li>-->
                            </ul>
                        </li>
						<li class="menu-item menu-item-has-children"><a href="#">Core Business</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="<?php echo 'cms/core_sub/core_pdib'; ?>">Property Development &amp; Infrastructure</a></li>
                                <li class="menu-item"><a href="<?php echo 'cms/core_sub/core_sb'; ?>">Strategic Business</a></li>
                                <li class="menu-item"><a href="<?php echo 'cms/core_sub/core_lafmb'; ?>">Land, Asset &amp; Facility Management</a></li>
                            </ul>
                        </li>
						<li class="menu-item menu-item-has-children"><a href="#">Governance</a>
                        	<ul class="sub-menu">
                            	<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporategovernance'; ?>">Corporate Governance</a></li>
                            	<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/reviewoperations'; ?>">Board Charter</a></li>
							    <li class="menu-item"><a href="#">Policies</a>
									<ul class="sub-menu">
                                    	<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/sustainabilitypolicy'; ?>">Sustainability Policy</a></li>
                            			<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/whistleblowerpolicy'; ?>">Whistle Blower Policy</a></li>
                            			<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/equitychanges'; ?>">Anti-Corruption & Bribery Policy</a></li>
                                    </ul>
								 </li>
                            	 <li class="menu-item"><a href="#">Terms of Reference</a>
									 <ul class="sub-menu">
                                     	<li class="menu-item"><a href="<?php echo 'bursa/sustainability/tor-audit-management-committee'; ?>">Audit Committee</a></li>
                            		 	<li class="menu-item"><a href="<?php echo 'bursa/sustainability/tor-risk-management-committee'; ?>">Risk Management Committee</a></li>
                            			<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/oursubsidiaries'; ?>">Remuneration Committee</a></li>
										<li class="menu-item"><a href="<?php echo 'bursa/sustainability/board-nomination-committe'; ?>">Nomination Committee</a></li>
                                   	</ul>
								</li>
								<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/cbce'; ?>">Code of Business Conduct & Ethics</a></li>
                        	</ul>
                       </li>
                       <li class="megamenu col4 menu-item menu-item-has-children"><a href="<?php echo 'bursa/'; ?>">Investor Relations</a>
                        <ul class="sub-menu">
                            <!--<li class="menu-item menu-item-has-children"><a href="#">Corporate Information</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Statutory Information</a></li>
                                    <li class="menu-item"><a href="board_of_directors.html">Board of Directors</a></li>
                                    <li class="menu-item"><a href="key_management_team.html">Key Senior Management</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">Board Committees</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">Nomination Committee</a></li>
                                    <li class="menu-item"><a href="#">Risk Management Committee</a></li>
                                    <li class="menu-item"><a href="#">Audit Committee</a></li>
                                    <li class="menu-item"><a href="#">Remuneration Committee</a></li>
                                </ul>
                            </li>-->
                            <li class="menu-item menu-item-has-children"><a href="#">Share Information</a>
                                <ul class="sub-menu">
                                    <!--<li class="menu-item"><a href="#">Price Ticker</a></li>-->
                                    <li class="menu-item"><a href="<?php echo '/'; ?>">Stock Charts</a></li>
                                    <!--<li class="menu-item"><a href="#">Price & Volume</a></li>
                                    <li class="menu-item"><a href="#">Shareholder</a></li>-->
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children"><a href="#">Financial Information</a>
                            	<ul class="sub-menu">
                               		<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/financialhighlights'; ?>">Financial Statistics</a></li>
                                	<!--<li class="menu-item"><a href="#">Statements of Comprehensive Income</a></li>
                                	<li class="menu-item"><a href="#">Statements of Financial Position</a></li>-->
                                	<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/segmentalanalysis'; ?>">Highlights</a></li>
                                	<!--<li class="menu-item"><a href="#">Production Statistics</a></li>
									<li class="menu-item"><a href="#">Key Audit Matters</a></li>-->
                            	</ul>
                            </li>
			    			<li class="menu-item menu-item-has-children"><a href="#">News Centre</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/newscentre/bursaannouncements'; ?>">Bursa Announcements</a></li>
                                    <!--<li class="menu-item"><a href="#">Corporate News</a></li>-->
                                </ul>
                            </li>
			    			<li class="menu-item menu-item-has-children"><a href="#">Reports</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/annualreports#all'; ?>">Annual Reports</a></li>
                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/quarterlyreports'; ?>">Quarterly Reports</a></li>
                    				<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/prospectus'; ?>">AGM/EGM/MSWG</a></li>
                                </ul>
                            </li>
			   				<!--<li class="menu-item menu-item-has-children"><a href="#">Investor Tools</a>
                                <ul class="sub-menu">
                                    <li class="menu-item"><a href="#">News Alert</a></li>
                                    <li class="menu-item"><a href="#">Price Gain/Loss Calculator</a></li>
                                </ul>
                            </li>-->
                        	</ul>
                        </li>
                        <li class="menu-item menu-item-has-children"><a href="<?php echo 'bursa/contactus'; ?>">Contact Us</a>
                            <ul class="sub-menu">
                                <li class="menu-item"><a href="<?php echo 'bursa/contactus'; ?>">Contact Us Info</a></li>
                                <li class="menu-item"><a href="<?php echo 'cms/create_vacancy'; ?>">Careers</a></li>
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <!-- End mobile menu -->
        <!-- Begin template wrapper -->
        <div id="wrapper" class="hasbg transparent">
            <div id="elementor-header" class="main-menu-wrapper">
                <div data-elementor-type="wp-post" data-elementor-id="3141" class="elementor elementor-3141" data-elementor-settings="[]">
                    <div class="elementor-inner">
                        <div class="elementor-section-wrap">
                            <!--<section class="elementor-element elementor-element-29ca933 elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"  data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">
                                    <div class="elementor-element elementor-element-74ee551 elementor-column elementor-col-50 elementor-top-column"  data-element_type="column" >
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-01f3d0b elementor-icon-list--layout-inline elementor-mobile-align-center elementor-tablet-align-center elementor-widget elementor-widget-icon-list"  data-element_type="widget"  data-widget_type="icon-list.default">
                                                    <div class="elementor-widget-container">
                                                        <ul class="elementor-icon-list-items elementor-inline-items">
                                                            <li class="elementor-icon-list-item">
                                                            <span class="elementor-icon-list-icon">
                                                            <i aria-hidden="true" class="fas fa-phone-alt"></i></span>
                                                            <span class="elementor-icon-list-text">+605-501-9888</span>
                                                            
                                                            </li>
                                                            <li class="elementor-icon-list-item">
                                                            <a href="mailto:info@majuperak.com.my"><span class="elementor-icon-list-icon">
                                                            <i aria-hidden="true" class="far fa-envelope"></i></span>
                                                            <span class="elementor-icon-list-text">info@majuperak.com.my</span>
                                                            </a>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-16c268c elementor-hidden-tablet elementor-hidden-phone elementor-column elementor-col-50 elementor-top-column"  data-element_type="column" >
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-f2226e3 elementor-widget__width-auto elementor-hidden-phone elementor-align-left elementor-mobile-align-center elementor-widget elementor-widget-button"  data-element_type="widget"  data-widget_type="button.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                                            <span class="elementor-button-content-wrapper">
                                                            <span class="elementor-button-icon elementor-align-icon-left">
                                                            <i aria-hidden="true" class="far fa-comment"></i></span>
                                                            <span class="elementor-button-text">Enquiry</span>
                                                            </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </section>-->
                            <section class="elementor-element elementor-element-4398f8f elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"  data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                            <div class="elementor-container elementor-column-gap-no">
                                <div class="elementor-row">
                                    <div class="elementor-element elementor-element-f49fd9c elementor-column elementor-col-50 elementor-top-column"  data-element_type="column" >
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-419171e elementor-widget elementor-widget-image" >
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-image">
                                                            <a data-elementor-open-lightbox="" href="<?php echo 'cms'; ?>">
                                                            <img src="frontend/assets/new/images/index/logo.png" width="228" height="54" class="attachment-full size-full" alt="Majuperak Holdings Berhad"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="elementor-element elementor-element-60aa1ba elementor-column elementor-col-50 elementor-top-column"  data-element_type="column" >
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-bdc46b3 elementor-widget__width-auto elementor-hidden-tablet elementor-hidden-phone elementor-widget elementor-widget-avante-navigation-menu"  data-element_type="widget"  data-widget_type="avante-navigation-menu.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="themegoods-navigation-wrapper menu_style1">
                                                            <div class="menu-main-menu-container">
                                                                <ul id="nav_menu40" class="nav">
                                                                    <li class='menu-item current-menu-item'><a href="<?php echo 'cms'; ?>">Home</a></li>

                                                                <li class='menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children arrow'><a href="#">Company</a>
                                                                <ul class="sub-menu">
								   <li class="menu-item"><a href="<?php echo 'cms/ceomessage'; ?>">CEO's Message</a></li>	                                                                    
  								   <li class="menu-item"><a href="<?php echo 'cms/profile'; ?>">Corporate Profile</a></li>
			    					    							<li class="menu-item"><a href="<?php echo 'cms/structure'; ?>">Corporate Structure</a></li>
								    								<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/directorprofile'; ?>">Board of Directors</a></li>
                                			            			<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/keymanagemnet'; ?>">Key Senior Management</a></li>
			    					    							<!--<li class="menu-item"><a href="#">Careers</a></li>-->
                                                                </ul>
                                                                </li>
																<li class='menu-item menu-item-has-children arrow'><a href="#">Core Business</a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item"><a href="<?php echo 'cms/core_sub/core_pdib'; ?>">Property Development &amp; Infrastructure</a></li>
                            											<li class="menu-item"><a href="<?php echo 'cms/core_sub/core_sb'; ?>">Strategic Business</a></li>
                            											<li class="menu-item"><a href="<?php echo 'cms/core_sub/core_lafmb'; ?>">Land, Asset &amp; Facility Management</a></li>
                                                                    </ul>
                                                                 </li>
								 								 <li class="menu-item menu-item-has-children arrow"><a href="#">Governance</a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporategovernance'; ?>">Corporate Governance</a></li>
                                                                        <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/reviewoperations'; ?>">Board Charter</a></li>
                                                                		<li class="menu-item"><a href="#">Policies</a>
									    									<ul class="sub-menu">
                                                                        		<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/sustainabilitypolicy'; ?>">Sustainability Policy</a></li>
                            													<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/whistleblowerpolicy'; ?>">Whistle Blower Policy</a></li>
                            													<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/equitychanges'; ?>">Anti-Corruption & Bribery Policy</a></li>
                                                                   	    	</ul>
																		</li>
                            											<li class="menu-item"><a href="#">Terms of Reference</a>
									    									<ul class="sub-menu">
                                                                        		<li class="menu-item"><a href="<?php echo 'bursa/sustainability/tor-audit-management-committee'; ?>">Audit Committee</a></li>
                            													<li class="menu-item"><a href="<?php echo 'bursa/sustainability/tor-risk-management-committee'; ?>">Risk Management Committee</a></li>
                            													<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/corporateinformation/oursubsidiaries'; ?>">Remuneration Committee</a></li>
																				<li class="menu-item"><a href="<?php echo 'bursa/sustainability/board-nomination-committe'; ?>">Nomination Committee</a></li>
                                                                   	    	</ul>
																		</li>
																		<li class="menu-item"><a href="<?php echo 'bursa/investorrelations/managementanalysis/cbce'; ?>">Code of Business Conduct & Ethics</a></li>
                        				  	    					</ul>
                        					 					</li>
                                                                 
                                                                 <li class="menu-item menu-item-has-children arrow"><a href="<?php echo 'bursa/'; ?>">Investor Relations</a>
                        					    					<ul class="sub-menu">
                                                                    <!--<li class="menu-item menu-item-has-children"><a href="#">Corporate Information</a>
                                                                        <ul class="sub-menu">
                                                                        <li class="menu-item"><a href="#">Statutory Information</a></li>
                                                                        <li class="menu-item"><a href="board_of_directors.html">Board of Directors</a></li>
                                                                        <li class="menu-item"><a href="key_management_team.html">Key Senior Management</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li class="menu-item menu-item-has-children"><a href="#">Board Committees</a>
                                                                    <ul class="sub-menu">
                                                                    <li class="menu-item"><a href="#">Nomination Committee</a></li>
                                                                    <li class="menu-item"><a href="#">Risk Management Committee</a></li>
                                                                    <li class="menu-item"><a href="#">Audit Committee</a></li>
                                                                    <li class="menu-item"><a href="#">Remuneration Committee</a></li>
                                                                    </ul>
                                                                </li>-->
                                                                <li class="menu-item menu-item-has-children"><a href="#">Share Information</a>
                                                                    <ul class="sub-menu">
                                                                    <!--<li class="menu-item"><a href="#">Price Ticker</a></li>-->
                                                                    <li class="menu-item"><a href="<?php echo '/'; ?>">Stock Charts</a></li>
                                                                    <!--<li class="menu-item"><a href="#">Price & Volume</a></li>
                                                                    <li class="menu-item"><a href="#">Shareholder</a></li>-->
                                                                    </ul>
                                                                </li>
                                                                <li class="menu-item menu-item-has-children"><a href="#">Financial Information</a>
                                                                    <ul class="sub-menu">
                                                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/financialhighlights'; ?>">Financial Statistics</a></li>
                                                                    <!--<li class="menu-item"><a href="#">Statements of Comprehensive Income</a></li>
                                                                    <li class="menu-item"><a href="#">Statements of Financial Position</a></li>-->
                                                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/financialinformation/segmentalanalysis'; ?>">Highlights</a></li>
                                                                    <!--<li class="menu-item"><a href="#">Production Statistics</a></li>
                                                                    <li class="menu-item"><a href="#">Key Audit Matters</a></li>-->
                                                                    </ul>
                                                                </li>
			    												<li class="menu-item menu-item-has-children"><a href="#">News Centre</a>
                                                                    <ul class="sub-menu">
                                                                    <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/newscentre/bursaannouncements'; ?>">Bursa Announcements</a></li>
                                                                    <!--<li class="menu-item"><a href="#">Corporate News</a></li>-->
                                                                    </ul>
                            									</li>
			    												<li class="menu-item menu-item-has-children"><a href="#">Reports</a>
                                                                    <ul class="sub-menu">
                                                                        <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/annualreports#all'; ?>">Annual Reports</a></li>
                                                                        <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/quarterlyreports'; ?>">Quarterly Reports</a></li>
                                                                        <li class="menu-item"><a href="<?php echo 'bursa/investorrelations/reports/prospectus'; ?>">AGM/EGM/MSWG</a></li>
                                                                    </ul>
                            									</li>
			    												<!--<li class="menu-item menu-item-has-children"><a href="#">Investor Tools</a>
                                                                    <ul class="sub-menu">
                                                                    	<li class="menu-item"><a href="#">News Alert</a></li>
                                                                    	<li class="menu-item"><a href="#">Price Gain/Loss Calculator</a></li>
                                                                    </ul>
                            									</li>-->
                        					    			</ul>
                        								</li>
                        								<li class='menu-item menu-item-has-children arrow'><a href="<?php echo 'bursa/contactus'; ?>">Contact Us</a>
                                                        	<ul class="sub-menu">
                                                            	<li class="menu-item"><a href="<?php echo 'bursa/contactus'; ?>">Contact Us Info</a></li>
                            									<li class="menu-item"><a href="<?php echo 'cms/create_vacancy'; ?>">Careers</a></li>
                                                             </ul>
                                                        </li>
								 						<li class='menu-item'><a href="#"></a>
                                                                    <ul class="sub-menu">
                              
                                                                    </ul>
                                                         </li>
								 						<li class='menu-item'><a href="#"></a>
                                                                    <ul class="sub-menu">
                              
                                                                    </ul>
                                                        </li>
                                                                 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <!--<div class="elementor-element elementor-element-4639a93 elementor-widget__width-auto elementor-widget elementor-widget-avante-search"  data-element_type="widget"  data-widget_type="avante-search.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="avante-search-icon">
                                                            <a data-open="tg_search_4639a93" href="javascript:;"><i aria-hidden="true" class="fas fa-search"></i></a>
                                                        </div>
                                                        <div id="tg_search_4639a93" class="avante-search-wrapper">
                                                            <div class="avante-search-inner">
                                                                <form id="tg_search_form_4639a93" class="tg_search_form autocomplete_form" method="get" action="#" data-result="autocomplete_4639a93" data-open="tg_search_4639a93">
                                                                    <div class="input-group">
                                                                        <input id="s" name="s" placeholder="Search for anything" autocomplete="off" value="">
                                                                        <span class="input-group-button">
                                                                        <button aria-label="Search for anything" type="submit"><i aria-hidden="true" class="fas fa-search"></i></button>
                                                                        </span>
                                                                    </div>
                                                                    <br class="clear">
                                                                    <div id="autocomplete_4639a93" class="autocomplete" data-mousedown="false">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                                                <div class="elementor-element elementor-element-fbb8940 elementor_mobile_nav elementor-widget__width-auto elementor-hidden-desktop elementor-view-default elementor-widget elementor-widget-icon"  data-element_type="widget"  data-widget_type="icon.default">
                                                    <div class="elementor-widget-container">
                                                        <div class="elementor-icon-wrapper">
                                                            <a class="elementor-icon" href="javascript:;">
                                                            <i aria-hidden="true" class="fas fa-ellipsis-v"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Begin content -->
            <div id="page-content-wrapper" class="">
                <div class="inner">

		    <!-- Begin main content -->
                    <div class="inner-wrapper">
                        <div class="sidebar-content fullwidth">
                            <div data-elementor-type="wp-page" data-elementor-id="5733" class="elementor elementor-5733" data-elementor-settings="[]">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section class="elementor-element elementor-element-3fa2ab8 elementor-section-stretched elementor-section-height-min-height elementor-section-boxed elementor-section-height-default elementor-section-items-middle elementor-section elementor-top-section" data-id="3fa2ab8" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;,&quot;shape_divider_bottom&quot;:&quot;arrow&quot;}">
                                        <div class="elementor-background-overlay">
                                        </div>
                                        <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 700 10" preserveaspectratio="none">
                                            <path class="elementor-shape-fill" d="M350,10L340,0h20L350,10z"></path>
                                            </svg>
                                        </div>
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-40e67d2 elementor-column elementor-col-50 elementor-top-column" data-id="40e67d2" data-element_type="column" data-settings="{&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_is_smoove&quot;:&quot;false&quot;,&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-743f879 elementor-widget__width-auto elementor-widget-mobile__width-inherit elementor-widget elementor-widget-heading" data-id="743f879" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_duration&quot;:1000,&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h1 class="elementor-heading-title elementor-size-default">Share Information</h1>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-8ed8d57 elementor-widget elementor-widget-text-editor" data-id="8ed8d57" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_duration&quot;:1000,&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="text-editor.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-text-editor elementor-clearfix">
                                                                        <div class="lqd-lines split-unit lqd-unit-animation-done">
                                                                            MHB Group will strive to contribute to the socio-economic growth and development in Perak.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        </section>
                                        
                                        
                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="comment_disable_clearer">
                            </div>
                        </div>
                    </div>
                    <!-- End main content -->  

		    

		    <!-- Begin main content -->
                    <div class="inner-wrapper">
                        <div class="sidebar-content fullwidth">
                            <div data-elementor-type="wp-page" data-elementor-id="4903" class="elementor elementor-4903" data-elementor-settings="[]">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        
									

					<section class="elementor-element elementor-element-db5be31 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="db5be31" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
	                                   	
					<div class="elementor-container elementor-column-gap-default">
                                        <div class="elementor-row">
                                            <div class="elementor-element elementor-element-ff8784c elementor-column elementor-col-100 elementor-top-column" data-id="ff8784c" data-element_type="column" data-settings="{&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_is_smoove&quot;:&quot;false&quot;,&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}">
                                                <div class="elementor-column-wrap elementor-element-populated">
                                                    <div class="elementor-widget-wrap">
                                                        
                                                        <div class="elementor-element elementor-element-7c720c1 elementor-widget__width-inherit elementor-widget-mobile__width-inherit elementor-widget elementor-widget-heading" data-id="7c720c1" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_duration&quot;:1000,&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default">Stock Charts</h2>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-element elementor-element-35793f8 elementor-widget elementor-widget-avante-blog-posts" data-id="35793f8" data-element_type="widget" data-settings="{&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_is_smoove&quot;:&quot;false&quot;,&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="avante-blog-posts.default">
                                                            <div class="elementor-widget-container">
                                                                
							    								<h2 class="text-yellow">Daily Chart</h2>
								
							    								<div>Technical Indicator:
                                                                    <select name="select" id="title">
                                                                       <option>-- Loading --</option>
                                                                    </select>
                                    				        	</div>


                                                                <br class="clear">
								        
																<div id="container" style="height: 500px;"></div>

									
	
							 
                                                            </div><!--elementor-widget-container-->
                                                        </div><!--elementor-element-35793f8-->
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </section>

                                        
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                    <!-- End main content -->              

                    

                    <!-- Begin main content -->
                    <div class="inner-wrapper">
                        <div class="sidebar-content fullwidth">
                            <div data-elementor-type="wp-page" data-elementor-id="5733" class="elementor elementor-5733" data-elementor-settings="[]">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        
					
                                        <section class="elementor-element elementor-element-7d9ca15 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-id="7d9ca15" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;gradient&quot;}">
                                        <div class="elementor-container elementor-column-gap-default">
                                            <div class="elementor-row">
                                                <div class="elementor-element elementor-element-db61246 elementor-column elementor-col-66 elementor-top-column" data-id="db61246" data-element_type="column" data-settings="{&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_is_smoove&quot;:&quot;false&quot;,&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-300be92 elementor-widget__width-inherit elementor-widget-tablet__width-inherit elementor-widget elementor-widget-heading" data-id="300be92" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_duration&quot;:1000,&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h2 class="elementor-heading-title elementor-size-default">We appreciate your valuable feedback</h2>
                                                                </div>
                                                            </div>
                                                            <div class="elementor-element elementor-element-b3e5ceb elementor-widget__width-inherit elementor-widget-tablet__width-inherit elementor-widget elementor-widget-heading" data-id="b3e5ceb" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_duration&quot;:1000,&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-heading-title elementor-size-default">
                                                                        Contact us today.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="elementor-element elementor-element-2457074 elementor-column elementor-col-33 elementor-top-column" data-id="2457074" data-element_type="column" data-settings="{&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_is_smoove&quot;:&quot;false&quot;,&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}">
                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                        <div class="elementor-widget-wrap">
                                                            <div class="elementor-element elementor-element-95affe0 elementor-align-right elementor-mobile-align-center elementor-widget elementor-widget-button" data-id="95affe0" data-element_type="widget" data-settings="{&quot;avante_ext_is_smoove&quot;:&quot;true&quot;,&quot;avante_ext_smoove_disable&quot;:&quot;769&quot;,&quot;avante_ext_smoove_rotatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-90,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:40,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:-140,&quot;sizes&quot;:[]},&quot;avante_ext_is_scrollme&quot;:&quot;false&quot;,&quot;avante_ext_smoove_duration&quot;:400,&quot;avante_ext_smoove_scalex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_scaley&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatey&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_rotatez&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_translatex&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewx&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_skewy&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:0,&quot;sizes&quot;:[]},&quot;avante_ext_smoove_perspective&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1000,&quot;sizes&quot;:[]},&quot;avante_ext_is_parallax_mouse&quot;:&quot;false&quot;,&quot;avante_ext_is_infinite&quot;:&quot;false&quot;}" data-widget_type="button.default">
                                                                <div class="elementor-widget-container">
                                                                    <div class="elementor-button-wrapper">
                                                                        <a href="<?php echo 'bursa/contactus'; ?>" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                        <span class="elementor-button-content-wrapper">
                                                                        <span class="elementor-button-icon elementor-align-icon-right">
                                                                        <i aria-hidden="true" class="fas fa-long-arrow-alt-right"></i></span>
                                                                        <span class="elementor-button-text">Get In Touch</span>
                                                                        </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="comment_disable_clearer">
                            </div>
                        </div>
                    </div>
                    <!-- End main content -->
			
                </div>
            </div>


        </div>
        <div id="footer-wrapper">
            <div data-elementor-type="wp-post" data-elementor-id="3274" class="elementor elementor-3274" data-elementor-settings="[]">
                <div class="elementor-inner">
                    <div class="elementor-section-wrap">

                        <section class="elementor-element elementor-element-e77192c elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section"  data-element_type="section">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-element elementor-element-42a9251 elementor-column elementor-col-100 elementor-top-column"  data-element_type="column" >
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-5b308e6 elementor-shape-circle elementor-widget__width-auto elementor-widget elementor-widget-social-icons"  data-element_type="widget"  data-widget_type="social-icons.default">
                                                <div class="elementor-widget-container">
                                                    <div class="elementor-social-icons-wrapper">
                                                        <a href="https://www.facebook.com/MajuPerak-Holdings-Berhad-104841991374593" class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-repeater-item-10f63aa" target="_blank">
                                                        <span class="elementor-screen-only">Facebook</span>
                                                        <i class="fab fa-facebook"></i></a>
                                                        <a href="https://www.instagram.com/majuperak_official/" class="elementor-icon elementor-social-icon elementor-social-icon-instagram elementor-repeater-item-fbe6ab2" target="_blank">
                                                        <span class="elementor-screen-only">Instagram</span>
                                                        <i class="fab fa-instagram"></i></a>
							<a href="https://www.linkedin.com/company/majuperakholdingsberhad" class="elementor-icon elementor-social-icon elementor-social-icon-linkedin elementor-repeater-item-a9fc5ce" target="_blank">
                                                        <span class="elementor-screen-only">Linkedin</span>
                                                        <i class="fab fa-linkedin"></i></a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-01821a2 elementor-widget elementor-widget-heading"  data-element_type="widget"  data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <span class="elementor-heading-title elementor-size-default">Copyright 2020 Majuperak Holdings Berhad (585389-X). All Rights Reserved. <a href="http://www.webqom.com/web_design.html" target="_blank">Web Design Malaysia</a> &amp; <a href="http://www.webqom.com/web_hosting.html" target="_blank">Web Hosting Malaysia</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <a id="go-to-top" href="javascript:;"><span class="ti-arrow-up"></span></a>
    </div><!-- end perspective -->


   
   

  </body>

<script type='text/javascript' src='frontend/assets/new/js/jquery.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/imagesloaded.min.js'></script>
<!--<script type='text/javascript' src='frontend/assets/new/js/masonry.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/jquery.lazy.js'></script>-->

<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/modulobox.js'></script>
<!--<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/jquery.parallax-scroll.js'></script>-->
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/jquery.smoove.js'></script>
<!--<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/parallax.js'></script>-->
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/jquery.sticky-kit.min.js'></script>
   <script type="text/javascript" src="http://code.highcharts.com/stock/highstock.js"></script>
   <script src="vendors/charts/exporting.js"></script>

   <script src="vendors/charts/technical-indicators.src.js"></script>
<script src="frontend/js/chart.js"></script>
<!--<script type='text/javascript'>
    jQuery(function($) {
        jQuery("#page-content-wrapper .sidebar-wrapper").stick_in_parent({
            offset_top: 100
        });
        if (jQuery(window).width() < 768 || is_touch_device()) {
            jQuery("#page-content-wrapper .sidebar-wrapper").trigger("sticky_kit:detach");
        }
    });
</script>
<script type='text/javascript'>

        var tgAjax = {
            "ajaxurl": "",
            "ajax_nonce": "9b0db167ee"
        };

    </script>-->
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/avante-elementor.js'></script>
<!--<script type='text/javascript' src='frontend/assets/new/js/ui/core.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/ui/effect.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/tweenmax.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/waypoints.min.js'></script>-->
<script type='text/javascript' src='frontend/assets/new/js/jquery.stellar.min.js'></script>
<!--<script type='text/javascript'>

        var avantePluginParams = {
            "backTitle": "Back"
        };

    </script>-->
<script type='text/javascript' src='frontend/assets/new/js/core/custom_plugins.js'></script>
<script type='text/javascript'>

        var avanteParams = {
            "menulayout": "leftalign",
            "fixedmenu": "1",
            "footerreveal": "1",
            "headercontent": "content",
            "lightboxthumbnails": "thumbnail",
            "lightboxtimer": "7000"
        };
   
    </script>
<script type='text/javascript' src='frontend/assets/new/js/core/custom.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/jquery.tooltipster.min.js'></script>
<!--<script type='text/javascript'>
        jQuery(function($) {
            jQuery(".demotip").tooltipster({
                position: "left",
                multiple: true,
                theme: "tooltipster-shadow",
                delay: 0
            });
        });
    </script>-->
<script type='text/javascript' src='frontend/assets/new/js/plugins/loftloader/assets/js/loftloader.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/webfont.js'></script>
<script type='text/javascript'>
        WebFont.load({
            google: {
                families: ['Roboto:400,500', 'Cabin:700,600']
            }
        });
    </script>
<!--<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/lib/jquery-numerator/jquery-numerator.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/flickity.pkgd.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/tilt.jquery.js'></script>-->
<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/js/frontend-modules.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/avante-elementor/assets/js/momentum-slider.js'></script>
<!--<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/lib/swiper/swiper.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/ui/position.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/lib/dialog/dialog.min.js'></script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/lib/waypoints/waypoints.min.js'></script>-->

<script type='text/javascript'>
        var elementorFrontendConfig = {
            "environmentMode": {
                "edit": false,
                "wpPreview": false
            },
            "is_rtl": false,
            "breakpoints": {
                "xs": 0,
                "sm": 480,
                "md": 768,
                "lg": 1025,
                "xl": 1440,
                "xxl": 1600
            },
            "version": "2.8.2",
            "urls": {
                "assets": "js//plugins//elementor//assets//"
            },
            "settings": {
                "page": [],
                "general": {
                    "elementor_global_image_lightbox": "yes"
                },
                "editorPreferences": []
            },
            "post": {
                "id": 4074,
                "title": "Home 1",
                "excerpt": ""
            }
        };
    </script>
<script type='text/javascript' src='frontend/assets/new/js/plugins/elementor/assets/js/frontend.min.js'></script>


   
</html>