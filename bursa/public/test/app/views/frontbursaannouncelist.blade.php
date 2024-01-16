@extends('layouts.front')
@section('content')

          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>Latest Bursa Announcements</span></h2>
              <div class="clearfix"></div>
              
              <!-- note to programmer: the order of the announcement is from top (the latest) to bottom (the oldest) -->
              <div class="row-fluid">
                <div class="span12">
                  <table class="table table-striped">
                  	<colgroup><col width="1">
                	<col width="1">
                    <col>
                    <col>
                    
                    </colgroup><thead>
                      <tr>
                        <th>No.</th>
                        <th>Announcement Date</th>
                        <th>Company</th>
                        <th>Title</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach ($announcelists as $k => $announcelist)
                      <tr>
                         <td>{{ $k+1 }}</td>
                         <td>{{ $announcelist->date_of_publishing }}</td>
                         <td>OCK GROUP BERHAD</td>
                         <td><a href="{{ url() }}/investorrelations/newscentre/bursaannouncements/{{ $announcelist->id }}">{{ $announcelist->title }}</a></td>
                      </tr>
                    
                      @endforeach
                                    
                    </tbody>
                    <tfoot>
                    	<tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tfoot>
                  </table> 
                  
                  
                </div>
                   
              </div>                    
                   
            </div>
            <i class="icon-bullhorn right"></i>
          </div>
          <!-- End Info white -->
          
          <!-- Info Resalt-->
          <div class="info_resalt border_bottom">
            <div class="container">
            
             <h2 class="red-title pull-left"><span>Summary Table For</span></h2>
              <div class="clearfix"></div> 
              <div class="row-fluid">  	 
              	 <div class="span6">
					<ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_financial_summary.html">Financial Results Summary</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_changes_in_audit_committee_boardroom_principal_officer_summary.html">Change in Audit Committee / Boardroom / Principal Officer Summary</a></li>
                    </ul>                 
                 </div>
                 <div class="span6">
					<ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_entitlements_summary.html">Entitlements Summary</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_changes_in_shareholdings_summary.html">Changes in Shareholdings Summary</a></li>
                    </ul>                 
                 </div> 
                                
                 
              </div>
              <div class="clearfix"></div> 
              
            </div>
          </div>
          <!-- End Info Resalt-->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>Type of Announcements / News</span></h2>
              <div class="clearfix"></div>

              <div class="row-fluid">
                <div class="span6">
                   <ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_additional_listing_announcement.html">Additional Listing Announcement</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_entitlements.html">Entitlements</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_investor_alert.html">Investor Alert</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_listing_circulars.html">Listing Circulars</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_trading_rights.html">Trading of Rights Announcement</a></li>
                    </ul> 	
                </div>  
                
                <div class="span6">
                   <ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_financial_results.html">Financial Results</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_general_announcement.html">General Announcement</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_general_meetings.html">General Meetings</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_special_announcements.html">Special Announcements</a></li>
                    </ul> 	
                </div> 
                <div class="clearfix"></div>
     
              </div> 
              
              <h5 class="margin_top_10px">Changes in Shareholdings</h5>
              <div class="row-fluid">
              	 
                 <div class="span6">
                   <ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_director_interest.html">Changes in Director's Interest (S135)</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_substantial_shareholder_interest.html">Changes in Substantial Shareholder's Interest (29B)</a></li>
                    </ul> 	
                </div>
                
                <div class="span6">
                   <ul class="list icons">
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_interest_substantial_shareholder.html">Notice of Interest Substantial Shareholder (29A)</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_person_ceasing.html">Notice of Person Ceasing (29C)</a></li>
                    </ul> 	
                </div>
                
              </div> 
              
              <h5 class="margin_top_10px">Changes of Corporate Information</h5>
              <div class="row-fluid">
              	 
                 <div class="span6">
                   <ul class="list icons">
                      <li><i class="icon-ok"></i> <a href="news_centre_bursa_changes_in_audit_committee.html">Changes in Audit Committee</a></li>
                      <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_boardroom.html">Change in Boardroom</a></li>
                      <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_ceo.html">Change in Chief Executive Officer</a></li>
                      <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_principal_officer.html">Change in Principal Officer</a></li>
                      
                    </ul> 	
                </div>
                
                <div class="span6">
                   <ul class="list icons">
                     <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_address.html">Change of Address</a></li>
                     <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_company_secretary.html">Change of Company Secretary</a></li>
                     <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_registrar.html">Change of Registrar</a></li>
                    </ul> 	
                </div>
                
              </div>
              
              
              <h5 class="margin_top_10px">Shares Buy Back</h5>
              <div class="row-fluid">
              	 
                 <div class="span6">
                   <ul class="list icons">
                    	<li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_resale_cancellation_treasury_shares.html">Notice of Resale/Cancellation of Treasury Share - Immediate Announcement</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_immediate_announcement.html">Notice of Shares Buy Back - Immediate Announcement</a></li>
                    </ul> 	
                </div>
                
                <div class="span6">
                   <ul class="list icons">
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_28A.html">Notice of Shares Buy Back by a Company Pursuant to Form 28A</a></li>
                        <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_28B.html">Notice of Shares Buy Back by a Company Pursuant to Form 28B</a></li>
                    </ul> 	
                </div>
                
              </div>  
                               
                   
            </div>
            <i class="icon-bullhorn right"></i>
          </div>
          <!-- End Info white -->
                 
		
@stop