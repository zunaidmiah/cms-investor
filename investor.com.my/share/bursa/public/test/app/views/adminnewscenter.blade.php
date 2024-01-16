@extends('layouts.admin')
@section('content')
  <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
               <h2>Bursa Announcements <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              
               <div class="pull-left margin-top-10px">
              	Last updated: <span class="text-blue">{{ date("d F Y",strtotime($page[0]->updated_at)) }} @ {{ date("g:i A",strtotime($page[0]->updated_at)) }}</span>
              </div>
              
             
              <div class="clearfix"></div>
              <p></p>
                {{ Form::open(array('url' => 'admin/page/savepage','class'=> 'form-horizontal','method' => 'post','name' => 'corporategeneral','id' => 'corporategeneral')) }} 
		   {{Form::hidden('preview','')}}
           {{Form::hidden('pageid',$page[0]->id)}}
           {{Form::hidden('type',$page[0]->type)}}

              <div class="portlet">
                 <div class="portlet-header">
                     <div class="caption">Page Info</div><br/>
                     <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                     <div class="tools">
                        <i class="fa fa-chevron-up"></i>
                     </div>
                 </div>
                 <div class="portlet-body">
				  <div contenteditable="true" id="page-title">
                  {{ $page[0]->page_title }}
                  </div>
                  {{ Form::textarea('page_title',$page[0]->page_title,array("id" => "textarea-page-title","class" => "hideThisField")) }}
                  
                 </div>
              </div>
              <div class="clearfix"></div>
       <div class="portlet-body"> 
                 
                  <!-- Info white-->
                  <div class="info_white1 border_bottom">

                      <h2 class="red-title pull-left"><span>Type of Announcements / News</span></h2>
                      <div class="clearfix"></div>
        
                      <div class="row-fluid">
                        <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_additional_listing_announcement_list.html">Additional Listing Announcement</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_entitlements_list.html">Entitlements</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_investor_alert_list.html">Investor Alert</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_listing_circulars_list.html">Listing Circulars</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_trading_rights_list.html">Trading of Rights Announcement</a></li>
                            </ul> 	
                        </div>  
                        
                        <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_financial_results_list.html">Financial Results</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_general_announcement_list.html">General Announcement</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_general_meetings_list.html">General Meetings</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_special_announcements_list.html">Special Announcements</a></li>
                            </ul> 	
                        </div> 
                        <div class="clearfix"></div>
             
                      </div> 
                      
                      <h5 class="margin_top_10px">Changes in Shareholdings</h5>
                      <div class="row-fluid">
                         
                         <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_director_interest_list.html">Changes in Director's Interest (S135)</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_substantial_shareholder_interest_list.html">Changes in Substantial Shareholder's Interest (29B)</a></li>
                            </ul> 	
                        </div>
                        
                        <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_interest_substantial_shareholder_list.html">Notice of Interest Substantial Shareholder (29A)</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_person_ceasing_list.html">Notice of Person Ceasing (29C)</a></li>
                            </ul> 	
                        </div>
                        
                      </div> 
                      
                      <h5 class="margin_top_10px">Changes of Corporate Information</h5>
                      <div class="row-fluid">
                         
                         <div class="span6">
                           <ul class="list icons">
                              <li><i class="icon-ok"></i> <a href="news_centre_bursa_changes_in_audit_committee_list.html">Changes in Audit Committee</a></li>
                              <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_boardroom_list.html">Change in Boardroom</a></li>
                              <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_ceo_list.html">Change in Chief Executive Officer</a></li>
                              <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_in_principal_officer_list.html">Change in Principal Officer</a></li>
                              
                            </ul> 	
                        </div>
                        
                        <div class="span6">
                           <ul class="list icons">
                             <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_address_list.html">Change of Address</a></li>
                             <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_company_secretary_list.html">Change of Company Secretary</a></li>
                             <li><i class="icon-ok"></i> <a href="news_centre_bursa_change_registrar_list.html">Change of Registrar</a></li>
                            </ul> 	
                        </div>
                        
                      </div>
                      
                      
                      <h5 class="margin_top_10px">Shares Buy Back</h5>
                      <div class="row-fluid">
                         
                         <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_resale_cancellation_treasury_shares_list.html">Notice of Resale/Cancellation of Treasury Share - Immediate Announcement</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_immediate_announcement_list.html">Notice of Shares Buy Back - Immediate Announcement</a></li>
                            </ul> 	
                        </div>
                        
                        <div class="span6">
                           <ul class="list icons">
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_28A_list.html">Notice of Shares Buy Back by a Company Pursuant to Form 28A</a></li>
                                <li><i class="icon-ok"></i> <a href="news_centre_bursa_notice_shares_buy_back_28B_list.html">Notice of Shares Buy Back by a Company Pursuant to Form 28B</a></li>
                            </ul> 	
                        </div>
                        
                      </div>  
                                       
                           

                    <i class="icon-bullhorn right"></i>
                  </div>
                  <!-- End Info white -->
                  
                  
                  
                </div>
                <!-- End portlet body -->
         
                  
               
                   <!-- End portlet -->

   <div class="form-actions none-bg"> <a href="javascript:void(0);" class="btn btn-red" onclick="Addsavepage('corporategeneral','');">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <button type="submit" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></button>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
					  
					  {{Form :: close()}}
            </div>
          </div>
        </div>
@stop