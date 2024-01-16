 <div class="nav_logo animated fadeInDown delay1">            
                <div class="container">
                    <div class="row-fluid">

                        <!-- Logo-->
                        <div class="span3 logo">
                            <a href="{{ URL::to('/') }}" title="Back to Home">                            
                                <img src="{{ URL::asset('assets/img/index/logo.png')}}" alt="Far East Holdings Berhad">                            </a>                      
                        </div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">
                                <li><a href="{{ URL::to('/') }}">HOME</a>                                </li>
                                <li>
                                	<a href="#">COMPANY</a>
                                	<ul>                                  
                                        <li><a href="{{ URL::to('profile') }}">Corporate Profile</a></li>
                                        <li><a href="{{ URL::to('structure') }}">Corporate Structure</a></li>
                                        <li><a href="{{ URL::to('create_vacancy') }}">Careers</a></li> 
                                        <!--<li><a href="{{ URL::to('board') }}">Board of Directors</a></li>
                                        <li><a href="{{ Request::path() }}">Board Charter</a></li>-->
                                        <li><a href="{{ URL::to('/pages/news_events') }}">Company Bulletin, CSR &amp; Training</a></li>
                                   		<li><a href="#">Links</a>
                                            <ul>
                                               @foreach($links as $link)
                                               <li><a href="{{ $link->link_url }}" target="_blank">{{ strip_tags($link->link_name) }}</a></li>
                                               @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#">SUSTAINABILITY</a>
                                	<ul>
                                    	
                                    	
                                    <li><a href="#">Grievance Procedure</a>
                                          <ul>
                                          
                                              <li><a href="{{ URL::to('bursa/grievancereportslisting') }}">Grievance Report</a></li>
                                                <li><a href="{{ URL::to('bursa/grievanceform') }}">Submit Grievance Report</a></li>
              
                                             </ul>
                                         </li> 
                                    	
                                    	
                                    	<li><a href="#">Policies</a>
                                        	<ul>
                                            	
                                                <li><a href="{{ URL::to('bursa/sustainability/palm-oil-policy') }}">Sustainable Palm Oil Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/Environmental-protection-biological-diversity-policy') }}">Environmental Protection &amp; Biological Diversity Policy</a></li>
												<li><a href="{{ URL::to('bursa/sustainability/equality-gender-policy') }}">Policy of Equality &amp; Gender</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/food-safety-policy') }}">Food Safety Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/quality-policy') }}">Quality Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/safety-health-policy') }}">Safety &amp; Health Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/safety-policy') }}">Safety Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/slope-river-protection-policy') }}">Slope &amp; River Protection Policy</a></li>
                                                <li><a href="{{ URL::to('bursa/sustainability/social-policy') }}">Social Policy</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="bursa/sustainability/certification-policy">Certification</a></li>
                                                <!--<li><a href="">Certification</a>
                                                	<ul>
                                                    	<li><a href="{{ URL::to('bursa/img/certificates/SGS_Certificate.pdf') }}" target="_blank">SGS Certificate</a></li>
                                                        <li><a href="{{ URL::to('bursa/frontend/img/certificates/Burueau_Veritas_Certification.pdf') }}" target="_blank">Bureau Veritas Certification</a></li>
                                                    </ul>
                                                </li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">GOVERNANCE</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/corporategovernance') }}">Corporate Governance</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/reviewoperations') }}">Board Charter</a></li>
                                                <li><a href="#">Policies</a>
                                        			<ul>
                                                        <li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/chairmanstatement') }}">Whistle Blower Policy</a></li>
                                                        <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/equitychanges') }}">Anti-Bribery &amp; Anti-Corruption Policy</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Terms of Reference</a>
                                        			<ul>
                                                        <li><a href="{{ URL::to('bursa/sustainability/board-nomination-committe') }}">Nomination Committee</a></li>
                                                       
         <li><a href="{{ URL::to('bursa/sustainability/tor-risk-management-committee') }}">Risk Management Committee</a></li>
                                                        <li><a href="{{ URL::to('bursa/sustainability/tor-audit-management-committee') }}">Audit Committee</a></li>
                                                        <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/oursubsidiaries') }}">Remuneration Committee</a></li>
                                                    </ul>
												</li>

                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/managementanalysis/pastperformance') }}">Past Performance Review</a></li>-->
                                            </ul>
                                        </li>
                                <!--<li><a href="#">SERVICES</a>
                                	<ul>
                                        <li><a href="{{ URL::to('telecommunication') }}">Telecommunications Network Services</a></li>

                                        <li><a href="{{ URL::to('trading') }}">Trading of Telecommunication &amp; IT Products</a></li>

                                        <li><a href="{{ URL::to('greentech') }}">Green Technology &amp; Solar</a></li>

                                        <li><a href="{{ URL::to('engineeringworks') }}">M&amp;E Engineering Works</a></li>

                                        
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('clients') }}">CLIENTS</a></li>-->
                                 <li>
                                    <a href="{{ URL::to('/') }}">INVESTOR RELATIONS</a>
                                    <ul>                                  
                                        <li><a href="#">Corporate Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/general') }}">Statutory Information</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/directorprofile') }}">Board of Directors</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/keymanagemnet') }}">Management Team</a></li>
                                                

                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">Board Committees</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/financialinformation/cashflowstatement') }}">Nomination Committee</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/risk_management_committee') }}">Risk Management Committee</a></li>
                                          		<li><a href="{{ URL::to('bursa/investorrelations/corporateinformation/ourproperties') }}">Audit Committee</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/remuneration_committee') }}">Remuneration Committee</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">Estate Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/ipocentre/ipostatistics') }}">Estate Location</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/competitiveadvantages') }}">Estate Profile</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/ipocentre/riskfactors') }}">Risk Factors</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/utilizationproceeds') }}">Utilisation of Proceeds</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/ipocentre/industryoverview') }}">Industry Overview</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Share Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/shareinformation/priceticker') }}">Price Ticker</a></li>
                                                <li><a href="{{ URL::to('charts') }}">Stock Charts</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/shareinformation/pricevolume') }}">Price &amp; Volume</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/shareinformation/shareholdingsanalysis') }}">Analysis of Shareholdings</a></li>-->
                                                <li><a href="{{ URL::to('bursa/investorrelations/shareinformation/topshareholders') }}">Shareholders</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="{{ URL::to('bursa/investorrelations/frontentitlement') }}">Entitlements</a></li>-->
                                        <li><a href="#">Financial Information</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/financialinformation/financialhighlights') }}">Financial Statistics</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/comprehensiveincome') }}">Statements of Comprehensive Income</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/financialposition') }}">Statements of Financial Position</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/financialinformation/cashflowstatement') }}">Cash Flow Statement</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/equitychanges') }}">Statement of Changes In Equity</a></li>-->
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/segmentalanalysis') }}">Highlights</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/ratioanalysis') }}">Production Statistics</a></li>
                                                <li><a href="{{ URL::to('bursa/investorrelations/financialinformation/latestreport') }}">Key Audit Matters</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">News Centre</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/newscentre/bursaannouncements') }}">Bursa Announcements</a></li>
                                                <li><a href="{{ URL::to('media_news/news_centre_latest_media_news') }}">Corporate News</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Reports</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/reports/annualreports') }}">Annual Reports</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/reports/annualauditedaccounts#all') }}">Annual Audited Accounts</a></li>-->
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/quarterlyreports') }}">Quarterly Reports</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/reports/circulars') }}">Circulars</a></li>-->
                                                <li><a href="{{ URL::to('bursa/investorrelations/reports/prospectus') }}">AGM/EGM/MSWG</a></li>
                                                <!--<li><a href="{{ URL::to('bursa/investorrelations/reports/analystreports') }}">Analyst Reports</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Investor Tools</a>
                                        	<ul>
                                            	<li><a href="{{ URL::to('bursa/investorrelations/investortools/newsalerts') }}">News Alert</a></li>
                                                <li><a href="{{ URL::to('calculator') }}">Price Gain / Loss Calculator</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="{{ URL::to('bursa/investorrelations/eventcalendar') }}">Company Bulletin</a></li>-->
                                    </ul>
                                </li> 
                
                          		<li><a href="{{ URL::to('bursa/contactus') }}">CONTACT US</a>
                                	<!--<ul>
                                       <li><a href="{{ URL::to('bursa/contactus') }}">Contact Us</a></li>
                                       <li><a href="{{ URL::to('bursa/contactus') }}">Enquiry</a></li>
                                       <li><a href="{{ URL::to('bursa/regionaloffices') }}">Regional Offices</a></li>
                                    </ul>-->
                                </li>
                                
                            </ul>
                            <!-- End Menu-->
                        </nav>
                        <!-- End Nav-->
                    </div>
                </div>
          </div>