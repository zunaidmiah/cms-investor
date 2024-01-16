 <!-- Nav-->
                        <nav class="span9">
                            <!-- Menu-->
                            <ul id="menu" class="sf-menu">
                                <!--<li><a href="{{ URL::to('cms') }}">HOME</a>                                </li>-->
                                <li><a href="{{ URL::to('cms') }}">HOME</a>                                </li>
                                <li><a href="#">COMPANY</a>
                                  <ul>                                                      
                                      <li><a href="{{ URL::to('/cms/profile') }}">Corporate Profile</a></li>                    
                                        <li><a href="{{ URL::to('/cms/structure') }}">Corporate Structure</a></li>
                                        <!--<li><a href="{{ URL::to('/cms/boardcharter') }}">Board Charter</a></li>-->
                                        <li><a href="{{ URL::to('/cms/create_vacancy') }}">Careers</a></li>  
                                        <li><a href="{{ URL::to('/cms/pages/news_events') }}">Company Bulletin, CSR &amp; Trainings</a></li>
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
                                              <li><a href="{{url('grievancereportslisting')}}">Grievance Report</a></li>
                                              <!--<li><a href="{{url('grievanceform')}}">Submit Grievance Report</a></li>-->
              
                                             </ul>
                                         </li> 


                                      <li><a href="#">Policies</a>
                                          <ul>
                                              <li><a href="{{url('/')}}/sustainability/palm-oil-policy">Sustainable Palm Oil Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/protection-biological-policy">Environmental Protection &amp; Biological Diversity Policy</a></li>
                        <li><a href="{{url('/')}}/sustainability/equality-gender-policy">Policy of Equality &amp; Gender</a></li>
                        
                                                
                                                
                                                
                                                
                                                <li><a href="{{url('/')}}/sustainability/food-safety-policy">Food Safety Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/quality-policy">Quality Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/safety-health-policy">Safety &amp; Health Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/safety-policy">Safety Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/slope-river-protection-policy">Slope &amp; River Protection Policy</a></li>
                                                <li><a href="{{url('/')}}/sustainability/social-policy">Social Policy</a></li>
                                             </ul>
                                         </li>    
                                                <li><a href="{{url('/')}}/sustainability/certification-policy">Certification</a></li>

                                                {{-- <li><a href="">Certification</a>
                                                  <ul>                            <li><a href="{{url('/')}}/frontend/img/certificates/SGS_Certificate.pdf">SGS Certificate</a></li>
                                                        <li><a href="{{  URL::to('frontend/img/certificates/Burueau_Veritas_Certification.pdf') }}">Bureau Veritas Certification</a></li>
                                                    </ul>
                                                </li> --}}

                                            </ul>
                                        </li>
                                        <li><a href="#">GOVERNANCE</a>
                                          <ul>                         
                                              <li><a href="{{url('/')}}/investorrelations/corporategovernance">Corporate Governance</a></li>
                                                
                                                <li><a href="{{url('/')}}/investorrelations/managementanalysis/board_charter">Board Charter</a></li>
                                                <li><a href="#">Policies</a>
                                              <ul>
                                                        <li><a href="{{url('/')}}/investorrelations/managementanalysis/whistleblower">Whistle Blower Policy</a></li>
                                                        <li><a href="{{url('/')}}/investorrelations/financialinformation/antibribery_anticorruption">Anti-Bribery &amp; Anti-Corruption Policy</a></li>
														<li><a href="{{url('/')}}/investorrelations/managementanalysis/directorsfitandproperpolicy">Directors Fit and Proper Policy</a></li>
                                                    </ul>
                                                </li>
                                               
                                                <li><a href="#">Terms of Reference</a>
                                              <ul>  
                                                        <li><a href="{{url('/')}}/sustainability/tor-board-nomination-committee">TOR Board Nomination Committee</a></li>
                                                        <li><a href="{{url('/')}}/sustainability/tor-risk-management-committee">TOR Risk Management Committee</a></li>
                                                        <li><a href="{{url('/')}}/sustainability/tor-audit-management-committee">TOR Audit Committee</a></li>
                                                        <li><a href="{{url('/')}}/investorrelations/corporateinformation/tor-remuneration-committee">TOR Remuneration Committee</a></li>
                                                    </ul>
                                                </li>

                                                <!--<li><a href="{{ URL::to('investorrelations/managementanalysis/pastperformance') }}">Past Performance Review</a></li>-->
                                            </ul>
                                        </li>
                                <!--<li><a href="#">SERVICES</a>
                                  <ul>
                                        <li><a href="{{ URL::to('cms/telecommunication') }}">Telecommunications Network Services</a></li>

                                        <li><a href="{{ URL::to('cms/trading') }}">Trading of Telecommunication &amp; IT Products</a></li>

                                        <li><a href="{{ URL::to('cms/greentech') }}">Green Technology &amp; Solar</a></li>

                                        <li><a href="{{ URL::to('cms/engineeringworks') }}">M&amp;E Engineering Works</a></li>

                                        
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('cms/clients') }}">CLIENTS</a></li>-->
                                 <li>
                                    <a href="{{ URL::to('/') }}">INVESTOR RELATIONS</a>
                                    <ul>                             
                                        <li><a href="#">Corporate Information</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/corporateinformation/general') }}">Statutory Information</a></li>
                                                <li><a href="{{ URL::to('investorrelations/corporateinformation/directorprofile') }}">Board of Directors</a></li>
                                                <li><a href="{{ URL::to('investorrelations/corporateinformation/keymanagemnet') }}">Management Team</a></li>
                                                
                                                
                                                
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">Board Committees</a>
                                          <ul>
                                              
                                                <li><a href="{{url('/')}}/investorrelations/financialinformation/b_nominationcommittee">Nomination Committee</a></li>
                                                <li><a href="{{ url('investorrelations/financialinformation/b_risk_mgtcommittee') }}">Risk Management Committee</a></li>
                                                <li><a href="{{url('/')}}/investorrelations/corporateinformation/b_audit_mgtcommittee">Audit Committee</a></li>
                                                <li><a href="{{ url('investorrelations/financialinformation/b_remuneration_mgtcommittee') }}">Remuneration Committee</a></li>
                                            </ul>
                                        </li>
      
                                        <li><a href="#">Estate Information</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/ipocentre/estate_location') }}">Estate Location</a></li>
                                                <li><a href="{{ URL::to('investorrelations/ipocentre/estate_profile') }}">Estate Profile</a></li>
                                                <!--<li><a href="{{ URL::to('investorrelations/ipocentre/riskfactors') }}">Risk Factors</a></li>
                                                <li><a href="{{ URL::to('investorrelations/ipocentre/utilizationproceeds') }}">Utilisation of Proceeds</a></li>
                                                <li><a href="{{ URL::to('investorrelations/ipocentre/industryoverview') }}">Industry Overview</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Share Information</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/shareinformation/priceticker') }}">Price Ticker</a></li>
                                                <li><a href="{{ URL::to('charts') }}">Stock Charts</a></li>
                                                <li><a href="{{ URL::to('investorrelations/shareinformation/pricevolume') }}">Price &amp; Volume</a></li>
                                                <!--<li><a href="{{ URL::to('investorrelations/shareinformation/shareholdingsanalysis') }}">Analysis of Shareholdings</a></li>-->
                                                <li><a href="{{ URL::to('investorrelations/shareinformation/topshareholders') }}">Shareholders</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="{{ URL::to('investorrelations/frontentitlement') }}">Entitlements</a></li>-->
                                        <li><a href="#">Financial Information</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/financialinformation/financialhighlights') }}">Financial Statistics</a></li>
                                                <li><a href="{{ URL::to('investorrelations/financialinformation/comprehensiveincome') }}">Statements of Comprehensive Income</a></li>
                                                <li><a href="{{ URL::to('investorrelations/financialinformation/financialposition') }}">Statements of Financial Position</a></li>
                                                                                              
                                                <li><a href="{{ URL::to('investorrelations/financialinformation/segmentalanalysis') }}">Highlights</a></li>
                                                <li><a href="{{ URL::to('investorrelations/financialinformation/ratioanalysis') }}">Production Statistics</a></li>
                                                <li><a href="{{ URL::to('investorrelations/financialinformation/latestreport') }}">Key Audit Matters</a></li>
                                            </ul>
                                        </li>
                                        
                                        <li><a href="#">News Centre</a>
                                          <ul>
                                              <li><a href="{{url()}}/investorrelations/newscentre/bursaannouncements">Bursa Announcements</a></li>
                                                <li><a href="{{ URL::to('media_news/news_centre_latest_media_news') }}">Corporate News</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Reports</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/reports/annualreports#all') }}">Annual Reports</a></li>
                                                <!--<li><a href="{{ URL::to('investorrelations/reports/annualauditedaccounts#all') }}">Annual Audited Accounts</a></li>-->
                                                <li><a href="{{ URL::to('investorrelations/reports/quarterlyreports') }}">Quarterly Reports</a></li>
                                                <!--<li><a href="{{ URL::to('investorrelations/reports/circulars') }}">Circulars</a></li>-->
                                                <li><a href="{{ URL::to('investorrelations/reports/agm_egm_mswg') }}">AGM/EGM/MSWG</a></li>
                                                <!--<li><a href="{{ URL::to('investorrelations/reports/analystreports') }}">Analyst Reports</a></li>-->
                                            </ul>
                                        </li>
                                        <li><a href="#">Investor Tools</a>
                                          <ul>
                                              <li><a href="{{ URL::to('investorrelations/investortools/newsalerts') }}">News Alert</a></li>
                                                <li><a href="{{ URL::to('cms/calculator') }}">Price Gain / Loss Calculator</a></li>
                                            </ul>
                                        </li>
                                        <!--<li><a href="{{ URL::to('investorrelations/eventcalendar') }}">Events Listing</a></li>-->
                                    </ul>
                                </li> 
                                               
                              <li><a href="{{ URL::to('contactus') }}">CONTACT US</a>
                                  <!--<ul>
                                       <li><a href="{{  URL::to('contactus') }}">Contact Us</a></li>
                                       <li><a href="{{  URL::to('contactus') }}">Enquiry</a></li>
                                       <li><a href="{{  URL::to('regionaloffices') }}">Regional Offices</a></li>
                                    </ul>-->
                                </li>
                                
                            </ul>
                            <!-- End Menu-->
                        </nav>
                        <!-- End Nav-->