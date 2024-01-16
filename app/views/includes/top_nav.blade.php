 <div class="nav_logo animated fadeInDown delay1">            
                <div class="container">
                    <div class="row-fluid">

                        <!-- Logo-->
                        <div class="span3 logo">
                            <a href="{{ URL::to('cms') }}" title="Back to Home">                            
                                <img src="{{ URL::asset('assets/img/index/logo.png')}}" alt="Far East Holdings Berhad (FEHB)">                            </a>                        </div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">
                                <li><a href="{{ URL::to('cms') }}">HOME</a>                                </li>
                                <li>
                                	<a href="#">ABOUT US</a>
                                	<ul>                                  
                                        <li><a href="{{ URL::to('cms/profile') }}">Corporate Profile</a></li>
                                        <li><a href="{{ URL::to('cms/mission') }}">Vision &amp; Mission</a></li>
                                        <li><a href="{{ URL::to('cms/board') }}">Board of Directors</a></li>
                                        <li><a href="{{ URL::to('cms/structure') }}">Corporate Structure</a></li>
                                        <li><a href="{{ URL::to('cms/milestone') }}">Milestone</a></li>
                                        <li><a href="{{ URL::to('cms/achievement') }}">Achievements</a></li>
                                        <li><a href="{{ URL::to('cms/boardcharter') }}">Board Charter</a></li>
                                        <li><a href="{{ URL::to('cms/pages/news_events') }}">News &amp; Events</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">CORE BUSINESS</a>
                                	<ul>
                                        <li><a href="{{ URL::to('cms/telecommunication') }}">Telecommunications Network Services</a></li>

                                        <li><a href="{{ URL::to('cms/trading') }}">Trading of Telco &amp; IT Products</a></li>

                                        <li><a href="{{ URL::to('cms/greentech') }}">Green Technology &amp; Solar</a></li>

                                        <li><a href="{{ URL::to('cms/engineeringworks') }}">M&amp;E Engineering Works</a></li>

                                        
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('cms/clients') }}">CLIENTS</a></li>
                                 <li>
                                    <a href="{{ URL::to('bursa') }}">INVESTOR RELATIONS</a>
                                    <ul>                                  
                                        <li><a href="#">Corporate Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/general') }}">General</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/directorprofile') }}">Director's Profile</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/keymanagemnet') }}">Key Management Team</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/ourproperties') }}">Our Properties</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/oursubsidiaries') }}">Our Subsidiaries</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ URL::to('bursa/investorrelations/corporategovernance') }}">Corporate Governance</a></li>
                                        <li><a href="#">IPO Centre</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/ipocentre/ipostatistics') }}">IPO Statistics</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/competitiveadvantages') }}">Competitive Advantages</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/riskfactors') }}">Risk Factors</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/utilizationproceeds') }}">Utilisation of Proceeds</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/industryoverview') }}">Industry Overview</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Share Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/shareinformation/priceticker') }}">Price Ticker</a></li>
                                                <li><a href="{{ URL::to('charts') }}">Stock Charts</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/shareinformation/pricevolume') }}">Price &amp; Volume</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/shareinformation/shareholdingsanalysis') }}">Analysis of Shareholdings</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/shareinformation/topshareholders') }}">Top 30 Shareholders</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ URL::to('bursa/investorrelations/frontentitlement') }}">Entitlements</a></li>
                                        <li><a href="#">Financial Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/financialinformation/financialhighlights') }}">Financial Highlights</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/comprehensiveincome') }}">Comprehensive Income</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/financialposition') }}">Financial Position</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/cashflowstatement') }}">Cash Flow Statement</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/equitychanges') }}">Statement of Changes In Equity</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/latestreport') }}">Latest Quarterly Report</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/segmentalanalysis') }}">Segmental Analysis</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/ratioanalysis') }}">Ratio Analysis</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Management Analysis</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/chairmanstatement') }}">Chairman's Statement</a></li>

                                                <li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/reviewoperations') }}">Review Of Operations</a></li>

                                                <li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/pastperformance') }}">Past Performance Review</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">News Centre</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/newscentre/bursaannouncements') }}">Bursa Announcements</a></li>
                                                <li><a href="{{ URL::to('media_news/news_centre_latest_media_news') }}">Media News</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Reports</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/reports/annualreports#all') }}">Annual Reports</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/annualauditedaccounts#all') }}">Annual Audited Accounts</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/quarterlyreports') }}">Quarterly Reports</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/circulars') }}">Circulars</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/prospectus') }}">Prospectus</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/analystreports') }}">Analyst Reports</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Investor Tools</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/investortools/newsalerts') }}">News Alert</a></li>
                                                <li><a href="{{ URL::to('cms/calculator') }}">Price Gain / Loss Calculator</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ URL::to('bursa/investorrelations/eventcalendar') }}">Event Calendar</a></li>
                                    </ul>
                                </li> 
                                <li><a href="{{ URL::to('cms/create_vacancy') }}">CAREERS</a></li>                 
                          		<li><a href="#">CONTACT US</a>
                                	<ul>
                                       <li><a href="{{ URL::to('bursa/contactus') }}">Contact Us</a></li>
                                       <li><a href="{{ URL::to('bursa/contactus') }}">Enquiry</a></li>
                                       <li><a href="{{ URL::to('bursa/regionaloffices') }}">Regional Offices</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- End Menu-->
                        </nav>
                        <!-- End Nav-->
                    </div>
                </div>
          </div>