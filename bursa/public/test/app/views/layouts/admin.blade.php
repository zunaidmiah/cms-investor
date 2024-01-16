<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body> 
<div>
<!--BEGIN TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
  <div id="wrapper"><!--BEGIN TOPBAR-->
        <nav id="topbar" role="navigation" style="margin-bottom: 0;" class="navbar navbar-default navbar-static-top">
          <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a id="logo" href="http://www.webqom.com/web88.html" target="_blank" class="navbar-brand">
              {{HTML::image('images/logo_web88.png','web88logo');}}
              </a>          </div>
            
            	<div class="topbar-main">
                	<a id="logo" href="http://www.yeelee.com.my" class="navbar-brand" target="_blank">
                            {{ HTML::image('images/logo.jpg','logo'); }}
                         
                    <a id="menu-toggle" href="#" class="btn hidden-xs"><i class="fa fa-bars"></i></a>
                    
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control"/></div>
                </form>
                <ul class="nav navbar-top-links navbar-right">
                
                    <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">
             @if( Auth::user()->avatar->url('thumb') == '')       
         {{HTML::image('images/profile/image_hock.jpg','Avatar',array( 'class' => 'img-responsive' ));}}
         @else
         {{HTML::image(Auth::user()->avatar->url('thumb'),'Avatar',array( 'class' => 'img-responsive' ));}}
         @endif
                      
                        {{ Auth::user()->name }}
                        &nbsp;<span class="caret"></span></a>
<ul class="dropdown-menu dropdown-user pull-right animated bounceInLeft">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5">
                                            @if( Auth::user()->avatar->url('thumb') == '')       
         {{HTML::image('images/profile/image_hock.jpg','Avatar',array( 'class' => 'img-responsive' ));}}
         @else
         {{HTML::image(Auth::user()->avatar->url('thumb'),'Avatar',array( 'class' => 'img-responsive' ));}}
         @endif
                                        

                                            <p class="text-center mtm">
                                            	<a href="#" data-target="#modal-change-avatar" data-toggle="modal" class="change-avatar">
                                                <small>Change Avatar</small>                                                </a></p>
                                      </div>
                                        <div class="col-md-7 col-xs-5"><span>{{ Auth::user()->name }}</span>

                                            <p class="text-muted small">{{ Auth::user()->username }}</p>

                                            <div class="divider"></div>
                                            <!--<a href="#" class="btn btn-primary btn-sm">View Profile</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-sm" data-target="#modal-change-password" data-toggle="modal">Change Password</a></div>
                                            <div class="col-md-6 col-xs-6"><a href="{{ url() }}/admin/logout" class="btn btn-default btn-sm pull-right">Sign Out</a></div>
                                        </div
                                    ></div>
                                </div>
                            </li>
                      </ul>
                  </li>
                </ul>
          </div>
</nav>
        <!--Modal Change Avatar start-->
                            <div id="modal-change-avatar" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Change Avatar</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form">
                                      
                                  {{ Form::open(array('url' => 'user/update', 'method' => 'post', 'class' => 'form-horizontal','files' => true)) }}      
                                        <div class="form-group">
                                          <label class="col-md-4 control-label">Upload Avatar Image </label>
                                          <div class="col-md-8">
                                            <div class="text-15px margin-top-10px"> 
     
         @if( Auth::user()->avatar->url('thumb') == '')       
         {{HTML::image('images/profile/image_hock.jpg','Avatar',array( 'class' => 'img-responsive' ));}}
         @else
         {{HTML::image(Auth::user()->avatar->url('thumb'),'Avatar',array( 'class' => 'img-responsive' ));}}
         @endif
<br/>
 {{Form::file('avatar', null,array('id'=>'exampleInputFile1'))}}                                                

                                              <br/>
                                                <span class="help-block">(Image dimension: 100 x 100 pixels, JPEG/GIF/PNG only, Max. 2MB) </span> </div>
                                          </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                        </div>
                                   {{ Form::close() }}
                                    </div>
                                  </div>
                                </div>
                              </div>
    </div>
                          <!--END MODAL Change Avatar-->
        <!--Modal Change Password start-->
                <div id="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Change Password</h4></div>
                            <div class="modal-body">
                                <div class="form">
  {{ Form::open(array('url' => 'admin/users/changepassword','name' => 'changepass','id' => 'changepass', 'class'=> 'form-horizontal','method' => 'post')) }}

                                        
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">New Password</label>

                                            <div class="col-md-8">
                                            	<div class="input-icon"><i class="fa fa-key"></i> 
      
 {{Form::password('password', array('id'=>'password1', 'class' => 'validate[required,minSize[6],maxSize[12]] form-control'))}}                              </div>

     
      <span class="text-10px">(Password length should be between 6-12 characters)</span>                                                </div>
                                          </div>
                                       
                                        
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">Confirm New Password</label>

                                            <div class="col-md-8">
                                            	<div class="input-icon"><i class="fa fa-key"></i> 
   {{Form::password('confirmpassword', array('id'=>'confirmpassword','class' => 'validate[required,equals[password1]] form-control'))}} 
            
            <span class="text-10px">(Password length should be between 6-12 characters)</span>                                                </div>
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8">
                                                <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp;
                                              <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>                                            </div>
                                        </div>
           {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
        <!--END MODAL CHANGE PASSWORD-->
        <!--END TOPBAR-->
        
        <!--BEGIN SIDEBAR MENU-->
       @include('includes.sidebar')
        <!--END SIDEBAR MENU--><!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
         <?php
               if(Request::segment(2) == 'general') {
               $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Corporate Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">General - Edit</li>';
               $title = "Corporate Information";
               }
               
               else if(Request::segment(2) == 'ourproperties') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Corporate Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Our Properties - Listing</li>';
               $title  = "Corporate Information";
               
               }
               
               else if(Request::segment(2) == 'oursubsidiaries') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Corporate Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Our Subsidiaries - Listing</li>';
               $title  = "Corporate Information";
               
               }
               
               else if(Request::segment(2) == 'keymanagement') {
                 $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Corporate Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Key Management Team - Listing</li>';
               $title  = "Corporate Information";
               
               }
               else if(Request::segment(2) == 'dirprofile') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Corporate Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Directors Profile - Listing</li>';
               $title  = "Corporate Information";
               
               }
                else if(Request::segment(2) == 'financialcomprehensive') {
                $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
           <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Comprehensive Income - Edit</li>';
               $title  = "Financial Information";
               
               }
               else if(Request::segment(2) == 'financialhighlights') {
                $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
           <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Financial Highlights - Edit</li>';
               $title  = "Financial Information";
               
               }
                else if(Request::segment(2) == 'evencalendar') {
                $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Event Calendar - Listing</li>';
               $title  = "Event Calendar";
               
               }
               else if(Request::segment(2) == 'annualreports') {
                $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Annual Reports - Listing</li>';
               $title  = "Reports";
               
               }
               else if(Request::segment(2) == 'financialratioanalysis') {
                $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Ratio Analysis - Edit</li>';
               $title  = "Financial Information";
               
               }
               else if(Request::segment(2) == 'irhome') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
                       <li class="active">Investor Relations Home - Edit</li>';
               $title  = "Investor Relations";
               
               }
                else if(Request::segment(2) == 'equity') {
             $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Statement of Changes in Equity - Edit</li>';
               $title  = "Financial Information";
               
               }
               else if(Request::segment(2) == 'financialquarterlyreport') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Latest Quarterly Report - Listing</li>';
               $title  = "Financial Information";
               
               }
                else if(Request::segment(2) == 'ipostatistics') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>IPO Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">IPO Statistics - Edit</li>';
               $title  = "IPO Centre";
               
               }
               else if(Request::segment(2) == 'ipocompetitive') {
                 $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>IPO Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Competitive Advantages - Edit</li>';
               $title  = "IPO Centre";
               
               }
                else if(Request::segment(2) == 'iporiskfactors') {
                $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>IPO Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Risk Factors - Edit</li>';
               $title  = "IPO Centre";
               
               }
               
                else if(Request::segment(2) == 'ipoutilisationproceeds') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>IPO Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Utilisation of Proceeds - Edit</li>';
               $title  = "IPO Centre";
               
               }
               else if(Request::segment(2) == 'ipoindustryoverview') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>IPO Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Industry Overview - Edit</li>';
               $title  = "IPO Centre";
               
               }
               else if(Request::segment(2) == 'priceticker') {
               $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Share Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Price Ticker - Edit</li>';
               $title  = "Share Information";
               
               }
               else if(Request::segment(2) == 'priceandvolume') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Share Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Price & Volume - Edit</li>';
               $title  = "Share Information";
               
               }
                else if(Request::segment(2) == 'shareholding') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Share Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Analysis of Shareholdings - Edit</li>';
               $title  = "Share Information";
               
               }
                else if(Request::segment(2) == 'topshareholders') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Share Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Top 30 Shareholders - Listing</li>';
               $title  = "Share Information";
               
               }
                else if(Request::segment(2) == 'entitlements') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Entitlements - Edit</li>';
               $title  = "Entitlements";
               
               }
               else if(Request::segment(2) == 'financialposition') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Financial Position - Edit</li>';
               $title  = "Financial Information";
               
               }
                else if(Request::segment(2) == 'flowstatements') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Cash Flow Statement - Edit</li>';
               $title  = "Financial Information";
               
               }
               else if(Request::segment(2) == 'financialinfosegmentalanalysis') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Segmental Analysis - Edit</li>';
               $title  = "Financial Information";
               
               }
                 else if(Request::segment(2) == 'managementchairmansstatement') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Management Analysis &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Chairman`s Statement - Edit</li>';
               $title  = "Management Analysis";
               
               }
               else if(Request::segment(2) == 'managementreviewoperations') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Management Analysis &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Review of Operations - Edit</li>';
               $title  = "Management Analysis";
               
               }
               else if(Request::segment(2) == 'managementpastperformancereview') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Management Analysis &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Past Performance Review - Edit</li>';
               $title  = "Management Analysis";
               
               }
                else if(Request::segment(2) == 'newscenter') {
              $bread = ' <li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>News Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Bursa Announcements - Listing</li>';
               $title  = "Bursa Announcements";
               
               }
                else if(Request::segment(2) == 'annualaudit') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Annual Audited Accounts - Listing</li>';
               $title  = "Reports";
               
               }
                else if(Request::segment(2) == 'quarterlyreports') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Quarterly Reports - Listing</li>';
               $title  = "Reports";
               
               }
               else if(Request::segment(2) == 'circularreports') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Circulars - Listing</li>';
               $title  = "Reports";
               
               }
                else if(Request::segment(2) == 'prospectusarreports') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Prospectus - Listing</li>';
               $title  = "Reports";
               
               }
               else if(Request::segment(2) == 'analystreports') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Reports &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Analyst Reports - Listing</li>';
               $title  = "Reports";
               
               }
               else if(Request::segment(2) == 'newsalert') {
              $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/irhome">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Tools &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">News Alert Subscribers - Listing</li>';
               $title  = "Investor Tools";
               
               }
                else if(Request::segment(2) == 'userslist') {
               $bread = '<li><i class="fa fa-home"></i>&nbsp;<a href="'.url().'/admin/dashboard">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li><li class="active">
Users - Listing</li>';
               $title = "User Management";
               
               }
               else
               {
                   $bread = '';
                   $title = '';
               }
              
               ?>
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">{{ $title }}</h1>
          </div>
          
           <ol class="breadcrumb page-breadcrumb">
              
           {{ $bread }}

          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
        {{ Session::get('message') }}
        @yield('content')
        </div>
        <!--END CONTENT-->
            
        <!--BEGIN FOOTER-->
       @include('includes.footer')
        <!--END FOOTER-->
      </div>
  <!--END PAGE WRAPPER--></div>
</div>
   @include('includes.scripts')
 </body>
</html>