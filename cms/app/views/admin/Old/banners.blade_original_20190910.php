@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Banners</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Banners &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Sub Page Banners - Listing</li>
          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Sub Page Banners <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
              @if (Session::has('message'))
              <div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>{{ Session::get('message') }}</p>
              </div>
              @endif
              @if (Session::has('error_message'))
              <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>{{ Session::get('error_message') }}</p>
              </div>
              @endif
              
              <div class="pull-left"> Last updated: <span class="text-blue">

              {{ date("d F Y",strtotime($lastUpdated)) }} @ {{ date("g:i A",strtotime($lastUpdated)) }}

              </span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              
              
              <!-- End portlet-->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Sub Page Banners Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-montage" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selectednot" data-toggle="modal" class="deleteid" rel="{{url();}}/banners/deleteselected" rev="modal-delete-selected">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
          <div class="tools"> 
                    <i class="fa fa-chevron-up"></i> 
                  </div>
                  <!--Modal Add New Montage start-->
                  <div id="modal-add-montage" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Banner</h4>
                        </div>
                        <div class="modal-body">
                        
                          <div class="form">
                            {{ Form::open(array('name'=>'montages_add_form','id'=>'montages_add_form','url' => 'banners',"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
                             
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    {{ Form::checkbox('status', '1',true);}}
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Title </label>
                                <div class="col-md-6">
                                  
                                   {{ Form::text('title', Input::old('title'), array('class' => 'form-control validate[required]','placeholder' => 'Title'))}}
                                </div>
                               
                              </div>
                              
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload Banner Image <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                    {{ Form::file('Banner_image', ['class' => 'validate[required]']);}}
                                    <br/>
                                    <span class="help-block">(Image dimension: 1700 (min.) x 400 pixels, JPEG/GIF/PNG only, Max. 1MB) </span>
                                    <span>Please do not use Banner Image name banner5.jpg</span> </div>
                                </div>
                              </div>
                               <div class="form-group">
                                  <label for="inputFirstName" class="col-md-3 control-label">Apply to Pages <span class='require'>*</span></label>
                                  <div class="col-md-6">
                                  
                                    <select name="pages[]" multiple="multiple" class="form-control validate[required]" style="height: 350px;">
                                    <optgroup label="fareastholdingsbhd.com">
                                      <option value="">-About Us</option>
                                        <option value="1">&nbsp; --Corporate Profile</option>
                                        <option value="2">&nbsp; --Vision &amp; Mission</option> 
                                        <option value="3">&nbsp; --Board of Directors</option>
                                        <option value="4">&nbsp; --Corporate Structure</option>
                                        <option value="5">&nbsp; --Milestone</option>
                                        <option value="6">&nbsp; --Achievements</option>
                                        <option value="7">&nbsp; --Board Charter</option>
                                         

                                        <option value="">-CORE BUSINESS</option>
                                        <option value="9">&nbsp; --Telecommunications Network Services</option> 
                                        <option value="10">&nbsp; --Trading of Telco &amp; IT Products</option> 
                                        <option value="11">&nbsp; --Green Technology &amp; Solar</option> 
                                        <option value="12">&nbsp; --M&amp;E Engineering Works</option> 

                                        <option value="13">-CLIENTS</option>
                                        

                                        <option value="">-Investor Tools</option>
                                        <option value="15">&nbsp; --Price Gain / Loss Calculator</option>

                                        
                                    </optgroup>
                                    <optgroup label="cms.fareastholdingsbhd.com">
                                        <option value="8">-News &amp; Events</option>
                                        <option value="14">-CAREERS</option>
                                    </optgroup>
                                    

                                    <optgroup label="medianews.fareastholdingsbhd.com">

                                        <option value="18">-news_centre_latest_media_news</option>
                                        <option value="19">-news_centre_latest_media_news_details</option>

                                    </optgroup>

                                    <optgroup label="bursa.fareastholdingsbhd.com">
                                       <option value="62">-Home</option>
                                        <option value="">-Corporate Information</option>
                                        <option value="20">&nbsp; --General</option>
                                        <option value="21">&nbsp; --Director's Profile</option>
                                        <option value="22">&nbsp; --Key Management Team</option>
                                        <option value="23">&nbsp; --Our Properties</option>
                                        <option value="24">&nbsp; --Our Subsidiaries</option>
                                        <option value="26">-Corporate Governance</option>
                                        <option value="">-IPO Centre</option>
                                        <option value="27">&nbsp; --IPO Statistics</option>
                                        <option value="28">&nbsp; --Competitive Advantages</option>
                                        <option value="29">&nbsp; --Risk Factors</option>
                                        <option value="30">&nbsp; --Utilisation of Proceeds</option>
                                        <option value="31">&nbsp; --Industry Overview</option>
                                        <option value="">-Share Information</option>
                                        <option value="32">&nbsp; --Price Ticker</option>
                                        <option value="33">&nbsp; --Stock Charts</option>
                                        <option value="34">&nbsp; --Price &amp; Volume</option>
                                        <option value="35">&nbsp; --Analysis of Shareholdings</option>
                                        <option value="36">&nbsp; --Top 30 Shareholders</option>
                                        <option value="37">-Entitlements</option>
                                        <option value="">-Financial Information</option>
                                        <option value="38">&nbsp; --Financial Highlights</option>
                                        <option value="39">&nbsp; --Comprehensive Income</option>
                                        <option value="40">&nbsp; --Financial Position</option>
                                        <option value="41">&nbsp; --Cash Flow Statement</option>
                                        <option value="42">&nbsp; --Statement of Changes In Equity</option>
                                        <option value="43">&nbsp; --Latest Quarterly Report</option>
                                        <option value="44">&nbsp; --Segmental Analysis</option>
                                        <option value="45">&nbsp; --Ratio Analysis</option>
                                        <option value="">-Management Analysis</option>
                                        <option value="46">&nbsp; --Chairman's Statement</option>
                                        <option value="47">&nbsp; --Review Of Operations</option>
                                        <option value="48">&nbsp; --Past Performance Review</option>

                                        <option value="">-News Centre</option>
                                        <option value="49">&nbsp; --Bursa Announcements</option>
                                        <option value="">-Bursa Announcements details</option>

                                        <option value="105">&nbsp; --investorrelations/frontadditionallisting</option>
                                        <option value="106">&nbsp; --investorrelations/frontadditionallistingdetail</option>
                                        <option value="107">&nbsp; --investorrelations/frontentitlement</option>
                                        <option value="108">&nbsp; --investorrelations/frontentitlementdetail</option>
                                        <option value="109">&nbsp; --investorrelations/frontinvestoralert</option>
                                        <option value="110">&nbsp; --investorrelations/frontinvestoralertdetail</option>
                                        <option value="111">&nbsp; --investorrelations/frontlistingcircular</option>
                                        <option value="112">&nbsp; --investorrelations/frontlistingcirculardetail</option>
                                        <option value="113">&nbsp; --investorrelations/fronttradingright</option>
                                        <option value="114">&nbsp; --investorrelations/fronttradingrightdetail</option>

                                        <option value="115">&nbsp; --investorrelations/frontfinanciallisting</option>
                                        <option value="116">&nbsp; --investorrelations/frontfinanciallistingdetail</option>
                                        <option value="117">&nbsp; --investorrelations/frontgeneralannouncementlisting</option>
                                        <option value="118">&nbsp; --investorrelations/frontgeneralannouncementdetail</option>
                                        <option value="119">&nbsp; --investorrelations/frontgeneralmeetinglisting</option>
                                        <option value="120">&nbsp; --investorrelations/frontgeneralmeetingdetail</option>
                                        <option value="121">&nbsp; --investorrelations/frontspecialannouncementlisting</option>
                                        <option value="122">&nbsp; --investorrelations/frontspecialannouncementdetail</option>


                                        <option value="123">&nbsp; --investorrelations/directorinterest</option>
                                        <option value="124">&nbsp; --investorrelations/directorinterestdetail</option>
                                        <option value="125">&nbsp; --investorrelations/shareholderinterest</option>
                                        <option value="126">&nbsp; --investorrelations/shareholderdetail</option>
                                        <option value="127">&nbsp; --investorrelations/interestshareholderlist</option>
                                        <option value="128">&nbsp; --investorrelations/interestshareholderdetail</option>
                                        <option value="129">&nbsp; --investorrelations/personceasing</option>
                                        <option value="130">&nbsp; --investorrelations/personceasingdetail</option>


                                        <option value="131">&nbsp; --investorrelations/auditcommittee</option>
                                        <option value="132">&nbsp; --investorrelations/auditcommitteedetail</option>
                                        <option value="133">&nbsp; --investorrelations/boardroom</option>
                                        <option value="134">&nbsp; --investorrelations/boardroomdetail</option>

                                        <option value="135">&nbsp; --investorrelations/chiefexecutiveofficer</option>
                                        <option value="136">&nbsp; --investorrelations/chiefexecutiveofficerdetail</option>
                                        <option value="137">&nbsp; --investorrelations/principalofficer</option>
                                        <option value="138">&nbsp; --investorrelations/principalofficerdetail</option>
                                        <option value="139">&nbsp; --investorrelations/addresslisting</option>
                                        <option value="140">&nbsp; --investorrelations/addressdetail</option>
                                        <option value="141">&nbsp; --investorrelations/compsectretarylisting</option>
                                        <option value="142">&nbsp; --investorrelations/compsectretarydetail</option>
                                        <option value="143">&nbsp; --investorrelations/registrarlist</option>
                                        <option value="144">&nbsp; --investorrelations/registrardetail</option>

                                        <option value="145">&nbsp; --investorrelations/nominationcommittee</option>
                                        <option value="146">&nbsp; --investorrelations/nominationcommitteedetail</option>
                                        <option value="147">&nbsp; --investorrelations/resale</option>
                                        <option value="148">&nbsp; --investorrelations/resaledetail</option>
                                        <option value="149">&nbsp; --investorrelations/immediateannouncement</option>
                                        <option value="150">&nbsp; --investorrelations/immediateannouncementdetail</option>
                                        <option value="151">&nbsp; --investorrelations/companypursuant</option>
                                        <option value="152">&nbsp; --investorrelations/companypursuantdetail</option>
                                        <option value="153">&nbsp; --investorrelations/sharecompanypursuant</option>
                                        <option value="154">&nbsp; --investorrelations/sharecompanypursuantdetail</option>

                                        


                                        <option value="">-Reports</option>
                                        <option value="51">&nbsp; --Annual Reports</option>
                                        <option value="52">&nbsp; --Annual Audited Accounts</option>
                                        <option value="53">&nbsp; --Quarterly Reports</option>
                                        <option value="54">&nbsp; --Circulars</option>
                                        <option value="55">&nbsp; --Prospectus</option>
                                        <option value="56">&nbsp; --Analyst Reports</option>

                                        <option value="">-Investor Tools</option>
                                        <option value="57">&nbsp; --News Alert</option>

                                        <option value="58">-Event Calendar</option>

                                        <option value="">-CONTACT US</option>

                                        <!--<option value="100">&nbsp; --Contact us</option>
                                        <option value="101">&nbsp; --Enquiry</option>-->
                                       
                                        <option value="61">&nbsp; --Regional Offices</option>

                                    </optgroup>

                                    <optgroup label="charts.fareastholdingsbhd.com">

                                        <option value="17">-Home</option>

                                    </optgroup>


                                        

                                     </select>
                                    
                                   </div>
                                 </div>
                              
                              
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8"> 

                                
                                {{ Form::button(
                                                'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}


                                &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                             {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END MODAL Add New Montage-->


                  <!--Modal delete selected items start-->
                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                         
                          <div class="form-actions">
                            <div class="col-md-offset-4 col-md-8"> <a href="#"  class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete selected items end -->
                  <!--Modal delete all items start-->
                  <div id="modal-delete-all" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
                        </div>
                        <div class="modal-body">
                          <div class="form-actions">

                          {{ Form::open(array('url' => 'banners/deleteall', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }}

                            <div class="col-md-offset-4 col-md-8"> 


                           

                            {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}



                            <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                             {{ Form::close() }} 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete all items end -->
                </div>
                <div class="portlet-body">
                  <div class="form-inline pull-left">
                    <div class="form-group">
                        @if($cntarray1 != 0 )
                   
                    {{ Form::open(array('url' => Request::url(),'class'=> 'form-horizontal','method' => 'get')) }}
  {{ Form::select('noperpage1', $cntarray1, Input::get('noperpage1'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
   {{ Form::close() }}
         
        
                      &nbsp;
                      <label class="control-label">Records per page</label>
                       @endif
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <br/>
                  <br/>
                  <table class="table table-hover table-striped" id="sortable">
                    <thead>
                      <tr>
                        <th width="1%"><input type="checkbox" class="wholecheck"/></th>
                        <th>#</th>
                        <th><a style="color:black" href="javascript::void(0)">Status</a></th>
                        <th><a style="color:black" href="javascript::void(0)">Title</a></th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $k=1;?>
                    
                    @foreach ($banners as $ban)
                      <tr>
                        
                        <td><input type="checkbox" class="chkNumber" name="del[]" value="{{$ban->id}}"/></td>
                        <td>{{$k}}</td>
                        <td><span class="label label-sm @if($ban->status == 1) label-success @else label-danger @endif">@if($ban->status == 1) Active @else Inactive @endif</span></td>
                        <td>{{$ban->title}}</td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-montage-{{$ban->id}}" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$ban->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                          <!--Modal Edit Montage start-->

                          
                          <div id="modal-edit-montage-{{$ban->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-wide-width">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                  <h4 id="modal-login-label2" class="modal-title">Edit Banner Image</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="form">
                                    {{ Form::open(array('url' => 'banners/upd', 'method' => 'post', 'class' => 'form-horizontal','files' => true)) }} 
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Status</label>
                                        <div class="col-md-6">
                                          <div data-on="success" data-off="primary" class="make-switch">
                                           {{Form::hidden('status',0)}}
              {{Form::checkbox('status',1,$ban->status,array('id'=>'status','class' => 'form-control'))}}
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Title </label>
                                        <div class="col-md-6">
                                         
                                          {{Form::text('title', $ban->title ,array('id'=>'title','class' => 'form-control'))}}
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Upload Banner Image <span class='require'>*</span></label>
                                        <div class="col-md-9">
                                          <div class="text-15px margin-top-10px">
                                            <img src="{{url().'/uploads/banners/'.$ban->banner}}" alt="" class="img-responsive"><br/>

                                            


                                            {{ Form::file('Banner_image');}}
                                            <br/>
                                            <span class="help-block">(Image dimension: 1700 (min.) x 400 pixels, JPEG/GIF/PNG only, Max. 1MB) </span>
                                            <span>Please do not use Banner Image name banner5.jpg</span> </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="inputFirstName" class="col-md-3 control-label">Apply to Pages <span class='require'>*</span></label>
                                          <div class="col-md-6">
                                          

<?php  

$pages = DB::table('page_banner')->where('banner_id', $ban->id)->get();
$pageArray=[];
foreach($pages as $page)
{
  $pageArray[]=$page->page_id;
}
//var_dump($pageArray);




 ?>

                                           <select name="pages[]" multiple="multiple" class="form-control" style="height: 350px;">



                                        <optgroup label="fareastholdingsbhd.com">
                                      <option value="">-About Us</option>
                                        <option {{ in_array(1,$pageArray)?'selected':'' }} value="1">&nbsp; --Corporate Profile</option>
                                        <option {{ in_array(2,$pageArray)?'selected':'' }} value="2">&nbsp; --Vision &amp; Mission</option> 
                                        <option {{ in_array(3,$pageArray)?'selected':'' }} value="3">&nbsp; --Board of Directors</option>
                                        <option {{ in_array(4,$pageArray)?'selected':'' }} value="4">&nbsp; --Corporate Structure</option>
                                        <option {{ in_array(5,$pageArray)?'selected':'' }} value="5">&nbsp; --Milestone</option>
                                        <option {{ in_array(6,$pageArray)?'selected':'' }} value="6">&nbsp; --Achievements</option>
                                        <option {{ in_array(7,$pageArray)?'selected':'' }} value="7">&nbsp; --Board Charter</option>
                                       

                                        <option value="">-CORE BUSINESS</option>
                                        <option {{ in_array(9,$pageArray)?'selected':'' }} value="9">&nbsp; --Telecommunications Network Services</option> 
                                        <option {{ in_array(10,$pageArray)?'selected':'' }} value="10">&nbsp; --Trading of Telco &amp; IT Products</option> 
                                        <option {{ in_array(11,$pageArray)?'selected':'' }} value="11">&nbsp; --Green Technology &amp; Solar</option> 
                                        <option {{ in_array(12,$pageArray)?'selected':'' }} value="12">&nbsp; --M&amp;E Engineering Works</option> 

                                        <option {{ in_array(13,$pageArray)?'selected':'' }} value="13">-CLIENTS</option>
                                        

                                        <option  value="">-Investor Tools</option>
                                        <option {{ in_array(15,$pageArray)?'selected':'' }} value="15">&nbsp; --Price Gain / Loss Calculator</option>

                                        
                                    </optgroup>

                                    <optgroup label="cms.fareastholdingsbhd.com">
                                     <option {{ in_array(8,$pageArray)?'selected':'' }} value="8">-News &amp; Events</option> 
                                        <option {{ in_array(14,$pageArray)?'selected':'' }} value="14">-CAREERS</option>
                                    </optgroup>


                                    

                                    <optgroup label="medianews.fareastholdingsbhd.com">

                                        <option {{ in_array(18,$pageArray)?'selected':'' }} value="18">-news_centre_latest_media_news</option>
                                        <option {{ in_array(19,$pageArray)?'selected':'' }} value="19">-news_centre_latest_media_news_details</option>

                                    </optgroup>

                                    <optgroup label="bursa.fareastholdingsbhd.com">
                                        <option {{ in_array(62,$pageArray)?'selected':'' }} value="62">-Home</option>
                                        <option value="">-Corporate Information</option>
                                        <option {{ in_array(20,$pageArray)?'selected':'' }} value="20">&nbsp; --General</option>
                                        <option {{ in_array(21,$pageArray)?'selected':'' }} value="21">&nbsp; --Director's Profile</option>
                                        <option {{ in_array(22,$pageArray)?'selected':'' }} value="22">&nbsp; --Key Management Team</option>
                                        <option {{ in_array(23,$pageArray)?'selected':'' }} value="23">&nbsp; --Our Properties</option>
                                        <option {{ in_array(24,$pageArray)?'selected':'' }} value="24">&nbsp; --Our Subsidiaries</option>
                                        <option {{ in_array(26,$pageArray)?'selected':'' }} value="26">-Corporate Governance</option>
                                        <option value="">-IPO Centre</option>
                                        <option {{ in_array(27,$pageArray)?'selected':'' }} value="27">&nbsp; --IPO Statistics</option>
                                        <option {{ in_array(28,$pageArray)?'selected':'' }} value="28">&nbsp; --Competitive Advantages</option>
                                        <option {{ in_array(29,$pageArray)?'selected':'' }} value="29">&nbsp; --Risk Factors</option>
                                        <option {{ in_array(30,$pageArray)?'selected':'' }} value="30">&nbsp; --Utilisation of Proceeds</option>
                                        <option {{ in_array(31,$pageArray)?'selected':'' }} value="31">&nbsp; --Industry Overview</option>
                                        <option value="">-Share Information</option>
                                        <option {{ in_array(32,$pageArray)?'selected':'' }} value="32">&nbsp; --Price Ticker</option>
                                        <option {{ in_array(33,$pageArray)?'selected':'' }} value="33">&nbsp; --Stock Charts</option>
                                        <option {{ in_array(34,$pageArray)?'selected':'' }} value="34">&nbsp; --Price &amp; Volume</option>
                                        <option {{ in_array(35,$pageArray)?'selected':'' }} value="35">&nbsp; --Analysis of Shareholdings</option>
                                        <option {{ in_array(36,$pageArray)?'selected':'' }} value="36">&nbsp; --Top 30 Shareholders</option>
                                        <option {{ in_array(37,$pageArray)?'selected':'' }} value="37">-Entitlements</option>
                                        <option  value="">-Financial Information</option>
                                        <option {{ in_array(38,$pageArray)?'selected':'' }} value="38">&nbsp; --Financial Highlights</option>
                                        <option {{ in_array(39,$pageArray)?'selected':'' }} value="39">&nbsp; --Comprehensive Income</option>
                                        <option {{ in_array(40,$pageArray)?'selected':'' }} value="40">&nbsp; --Financial Position</option>
                                        <option {{ in_array(41,$pageArray)?'selected':'' }} value="41">&nbsp; --Cash Flow Statement</option>
                                        <option {{ in_array(42,$pageArray)?'selected':'' }} value="42">&nbsp; --Statement of Changes In Equity</option>
                                        <option {{ in_array(43,$pageArray)?'selected':'' }} value="43">&nbsp; --Latest Quarterly Report</option>
                                        <option {{ in_array(44,$pageArray)?'selected':'' }} value="44">&nbsp; --Segmental Analysis</option>
                                        <option {{ in_array(45,$pageArray)?'selected':'' }} value="45">&nbsp; --Ratio Analysis</option>
                                        <option  value="">-Management Analysis</option>
                                        <option {{ in_array(46,$pageArray)?'selected':'' }} value="46">&nbsp; --Chairman's Statement</option>
                                        <option {{ in_array(47,$pageArray)?'selected':'' }} value="47">&nbsp; --Review Of Operations</option>
                                        <option {{ in_array(48,$pageArray)?'selected':'' }} value="48">&nbsp; --Past Performance Review</option>

                                        <option value="">-News Centre</option>
                                        <option {{ in_array(49,$pageArray)?'selected':'' }} value="49">&nbsp; --Bursa Announcements</option>
                                        <option value="">-Bursa Announcements details</option>


                                        <option {{ in_array(105,$pageArray)?'selected':'' }} value="105">&nbsp; --investorrelations/frontadditionallisting</option>
                                        <option {{ in_array(106,$pageArray)?'selected':'' }} value="106">&nbsp; --investorrelations/frontadditionallistingdetail</option>
                                        <option {{ in_array(107,$pageArray)?'selected':'' }} value="107">&nbsp; --investorrelations/frontentitlement</option>
                                        <option {{ in_array(108,$pageArray)?'selected':'' }} value="108">&nbsp; --investorrelations/frontentitlementdetail</option>
                                        <option {{ in_array(109,$pageArray)?'selected':'' }} value="109">&nbsp; --investorrelations/frontinvestoralert</option>
                                        <option {{ in_array(110,$pageArray)?'selected':'' }} value="110">&nbsp; --investorrelations/frontinvestoralertdetail</option>
                                        <option {{ in_array(111,$pageArray)?'selected':'' }} value="111">&nbsp; --investorrelations/frontlistingcircular</option>
                                        <option {{ in_array(112,$pageArray)?'selected':'' }} value="112">&nbsp; --investorrelations/frontlistingcirculardetail</option>
                                        <option {{ in_array(113,$pageArray)?'selected':'' }} value="113">&nbsp; --investorrelations/fronttradingright</option>
                                        <option {{ in_array(114,$pageArray)?'selected':'' }} value="114">&nbsp; --investorrelations/fronttradingrightdetail</option>

                                        <option {{ in_array(115,$pageArray)?'selected':'' }} value="115">&nbsp; --investorrelations/frontfinanciallisting</option>
                                        <option {{ in_array(116,$pageArray)?'selected':'' }} value="116">&nbsp; --investorrelations/frontfinanciallistingdetail</option>
                                        <option {{ in_array(117,$pageArray)?'selected':'' }} value="117">&nbsp; --investorrelations/frontgeneralannouncementlisting</option>
                                        <option {{ in_array(118,$pageArray)?'selected':'' }} value="118">&nbsp; --investorrelations/frontgeneralannouncementdetail</option>
                                        <option {{ in_array(119,$pageArray)?'selected':'' }} value="119">&nbsp; --investorrelations/frontgeneralmeetinglisting</option>
                                        <option {{ in_array(120,$pageArray)?'selected':'' }} value="120">&nbsp; --investorrelations/frontgeneralmeetingdetail</option>
                                        <option {{ in_array(121,$pageArray)?'selected':'' }} value="121">&nbsp; --investorrelations/frontspecialannouncementlisting</option>
                                        <option {{ in_array(122,$pageArray)?'selected':'' }} value="122">&nbsp; --investorrelations/frontspecialannouncementdetail</option>


                                        <option {{ in_array(123,$pageArray)?'selected':'' }} value="123">&nbsp; --investorrelations/directorinterest</option>
                                        <option {{ in_array(124,$pageArray)?'selected':'' }} value="124">&nbsp; --investorrelations/directorinterestdetail</option>
                                        <option {{ in_array(125,$pageArray)?'selected':'' }} value="125">&nbsp; --investorrelations/shareholderinterest</option>
                                        <option {{ in_array(126,$pageArray)?'selected':'' }} value="126">&nbsp; --investorrelations/shareholderdetail</option>
                                        <option {{ in_array(127,$pageArray)?'selected':'' }} value="127">&nbsp; --investorrelations/interestshareholderlist</option>
                                        <option {{ in_array(128,$pageArray)?'selected':'' }} value="128">&nbsp; --investorrelations/interestshareholderdetail</option>
                                        <option {{ in_array(129,$pageArray)?'selected':'' }} value="129">&nbsp; --investorrelations/personceasing</option>
                                        <option {{ in_array(130,$pageArray)?'selected':'' }} value="130">&nbsp; --investorrelations/personceasingdetail</option>


                                        <option {{ in_array(131,$pageArray)?'selected':'' }} value="131">&nbsp; --investorrelations/auditcommittee</option>
                                        <option {{ in_array(132,$pageArray)?'selected':'' }} value="132">&nbsp; --investorrelations/auditcommitteedetail</option>
                                        <option {{ in_array(133,$pageArray)?'selected':'' }} value="133">&nbsp; --investorrelations/boardroom</option>
                                        <option {{ in_array(134,$pageArray)?'selected':'' }} value="134">&nbsp; --investorrelations/boardroomdetail</option>

                                        <option {{ in_array(135,$pageArray)?'selected':'' }} value="135">&nbsp; --investorrelations/chiefexecutiveofficer</option>
                                        <option {{ in_array(136,$pageArray)?'selected':'' }} value="136">&nbsp; --investorrelations/chiefexecutiveofficerdetail</option>
                                        <option {{ in_array(137,$pageArray)?'selected':'' }} value="137">&nbsp; --investorrelations/principalofficer</option>
                                        <option {{ in_array(138,$pageArray)?'selected':'' }} value="138">&nbsp; --investorrelations/principalofficerdetail</option>
                                        <option {{ in_array(139,$pageArray)?'selected':'' }} value="139">&nbsp; --investorrelations/addresslisting</option>
                                        <option {{ in_array(140,$pageArray)?'selected':'' }} value="140">&nbsp; --investorrelations/addressdetail</option>
                                        <option {{ in_array(141,$pageArray)?'selected':'' }} value="141">&nbsp; --investorrelations/compsectretarylisting</option>
                                        <option {{ in_array(142,$pageArray)?'selected':'' }} value="142">&nbsp; --investorrelations/compsectretarydetail</option>
                                        <option {{ in_array(143,$pageArray)?'selected':'' }} value="143">&nbsp; --investorrelations/registrarlist</option>
                                        <option {{ in_array(144,$pageArray)?'selected':'' }} value="144">&nbsp; --investorrelations/registrardetail</option>

                                        <option {{ in_array(145,$pageArray)?'selected':'' }} value="145">&nbsp; --investorrelations/nominationcommittee</option>
                                        <option {{ in_array(146,$pageArray)?'selected':'' }} value="146">&nbsp; --investorrelations/nominationcommitteedetail</option>
                                        <option {{ in_array(147,$pageArray)?'selected':'' }} value="147">&nbsp; --investorrelations/resale</option>
                                        <option {{ in_array(148,$pageArray)?'selected':'' }} value="148">&nbsp; --investorrelations/resaledetail</option>
                                        <option {{ in_array(149,$pageArray)?'selected':'' }} value="149">&nbsp; --investorrelations/immediateannouncement</option>
                                        <option {{ in_array(150,$pageArray)?'selected':'' }} value="150">&nbsp; --investorrelations/immediateannouncementdetail</option>
                                        <option {{ in_array(151,$pageArray)?'selected':'' }} value="151">&nbsp; --investorrelations/companypursuant</option>
                                        <option {{ in_array(152,$pageArray)?'selected':'' }} value="152">&nbsp; --investorrelations/companypursuantdetail</option>
                                        <option {{ in_array(153,$pageArray)?'selected':'' }} value="153">&nbsp; --investorrelations/sharecompanypursuant</option>
                                        <option {{ in_array(154,$pageArray)?'selected':'' }} value="154">&nbsp; --investorrelations/sharecompanypursuantdetail</option>



                                        <option value="">-Reports</option>
                                        <option {{ in_array(51,$pageArray)?'selected':'' }} value="51">&nbsp; --Annual Reports</option>
                                        <option {{ in_array(52,$pageArray)?'selected':'' }} value="52">&nbsp; --Annual Audited Accounts</option>
                                        <option {{ in_array(53,$pageArray)?'selected':'' }} value="53">&nbsp; --Quarterly Reports</option>
                                        <option {{ in_array(54,$pageArray)?'selected':'' }} value="54">&nbsp; --Circulars</option>
                                        <option {{ in_array(55,$pageArray)?'selected':'' }} value="55">&nbsp; --Prospectus</option>
                                        <option {{ in_array(56,$pageArray)?'selected':'' }} value="56">&nbsp; --Analyst Reports</option>

                                        <option value="">-Investor Tools</option>
                                        <option {{ in_array(57,$pageArray)?'selected':'' }} value="57">&nbsp; --News Alert</option>

                                        <option {{ in_array(58,$pageArray)?'selected':'' }} value="58">-Event Calendar</option>

                                        <option value="">-CONTACT US</option>

                                       <!--  <option {{ in_array(100,$pageArray)?'selected':'' }} value="100">&nbsp; --Contact us</option>

                                        <option {{ in_array(101,$pageArray)?'selected':'' }} value="101">&nbsp; --Enquiry</option> -->
                                       
                                        <option {{ in_array(61,$pageArray)?'selected':'' }} value="61">&nbsp; --Regional Offices</option>

                                    </optgroup>

                                    <optgroup label="charts.fareastholdingsbhd.com">

                                        <option {{ in_array(17,$pageArray)?'selected':'' }} value="17">-Home</option>

                                    </optgroup>




                                        

                                     </select>


                                           </div>
                                         </div>
                                      {{ Form::hidden('id',$ban->id) }}
                                      <div class="form-actions">
                                        <div class="col-md-offset-5 col-md-8"> 

<button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>


                                        </div>
                                      </div>
                                    {{Form::close()}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                         
                          <!--END MODAL Edit Montage-->
                            <!--Modal delete start-->

                            {{ Form::open(array('url' => 'deletebanner/'.$ban->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-{{$ban->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this banner? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#{{$ban->id}}:</strong> {{$ban->title}}<br/>
                                    <img src="{{url().'/uploads/banners/'.$ban->banner}}" alt="" class="img-responsive">
                                    </p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> 


                                      {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}



                                      <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 

                                      




                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                           {{ Form::close() }}
                          <!-- modal delete end -->
                           
                        </td>
                      </tr>
                       <?php $k++;?>
                       @endforeach
                      
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">

                    Showing {{ $banners->getFrom() }} to {{ $banners->getTo() }} of {{ $banners->getTotal() }} entries</p>
                    {{ $banners->links() }}
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <!-- End porlet -->
              
              
            </div>
          </div>
        </div>
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                  <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>
@stop
@section('scripts')
<script>
  
 $('.deleteid').click(function () {
       var page = $(this).attr('rel');
       var idloc = $(this).attr('rev');
       if ($('.chkNumber:checked').length) {
          var chkId = '';
          $('.chkNumber:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
        //  alert(chkId);
        $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div></form>') 
        }
        else {
          alert('Nothing Selected');
         
        }
       
      
    });

  $('.wholecheck').change(function () {
    if ($(this).prop('checked')) {
    $('.chkNumber').prop('checked', true);
    }
    else {
        $('.chkNumber').prop('checked', false);
    }
});
$('.wholecheck').trigger('change');


</script>


@stop
