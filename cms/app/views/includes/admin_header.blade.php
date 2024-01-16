<div>
  <!--BEGIN TO TOP--><a id="totop" href="#"><i class="fa fa-angle-up"></i></a><!--END BACK TO TOP-->
    <div id="wrapper"><!--BEGIN TOPBAR-->  
  <nav id="topbar" role="navigation" style="margin-bottom: 0;" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                  <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
              <a id="logo" href="http://www.webqom.com/web88.html" target="_blank" class="navbar-brand"><img src="{{ URL::asset('assets/images/logo_web88.png') }}"></a>          </div>
              
                <div class="topbar-main">
                    <a id="logo" href="#" class="navbar-brand"><img src="{{ URL::asset('assets/images/logo.jpg') }}"></a>
                      <a id="menu-toggle" href="#" class="btn hidden-xs"><i class="fa fa-bars"></i></a>
                      
                  <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                      <div class="input-icon right"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control"/></div>
                  </form>
                  <ul class="nav navbar-top-links navbar-right">
                  
                      <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle"><img src='{{ Session::get("profilepic") !== null ? asset(Session::get("profilepic")):URL::asset("assets/images/profile/image_hock.jpg") }}' alt="" class="img-responsive img-circle"/>&nbsp;
                          
                          &nbsp;<span class="caret"></span></a>
            <ul class="dropdown-menu dropdown-user pull-right animated bounceInLeft">
                              <li>
                                  <div class="navbar-content">
                                      <div class="row">
                                          <div class="col-md-5 col-xs-5"><img src='{{ Session::get("profilepic") !== null ? asset(Session::get("profilepic")):URL::asset("assets/images/profile/image_hock.jpg") }}' alt="" class="img-responsive img-circle"/>
  
                                              <p class="text-center mtm">
                                                <a href="#" data-target="#modal-change-avatar" data-toggle="modal" class="change-avatar">
                                                  <small>Change Avatar</small>                                                </a></p>
                                        </div>
                                          <div class="col-md-7 col-xs-5"><span></span>
  
                                              <p class="text-muted small"></p>
  
                                              <div class="divider"></div>
                                              <!--<a href="#" class="btn btn-primary btn-sm">View Profile</a>-->
                                          </div>
                                      </div>
                                  </div>
                                  <div class="navbar-footer">
                                      <div class="navbar-footer-content">
                                          <div class="row">
                                              <div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-sm" data-target="#modal-change-password" data-toggle="modal">Change Password</a></div>
                                              <div class="col-md-6 col-xs-6"><a href="{{ URL::to('adminLogout') }}" class="btn btn-default btn-sm pull-right">Sign Out</a></div>
                                          </div>
                                      </div>
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
                                        <form class="form-horizontal">
                                          <div class="alert  alert-dismissable hide" id="alertdiv">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <p id="upload_msg"></p>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-4 control-label">Upload Avatar Image </label>
                                            <div class="col-md-8">
                                              <div class="text-15px margin-top-10px"> 
                                                <img src='{{ Session::get("profilepic") !== null ? asset(Session::get("profilepic")):URL::asset("assets/images/profile/image_hock.jpg") }}' alt="Avatar" class="img-responsive"><br/>
                                                  <input id="avatarfile" name="avatarfile" type="file" accept="image/*" />
                                                <br/>
                                                  <span class="help-block">(Image dimension: 100 x 100 pixels, JPEG/GIF/PNG only, Max. 2MB) </span> </div>
                                            </div>
                                          </div>
                                          
                                          <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <button type="button" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Uploading Image" class="btn btn-red" id="upload_file">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        </form>
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
      <?php  $user = Session::get('user'); ?>
                                      {{ Form::open(array('class'=> 'form-horizontal', 'action' => array('AdminController@changepassword', $user->id))) }}
                      <input type="hidden" name="auth_id" value="{{ $user->id }}" >
                                          <div class="form-group">
                                            <label for="password" class="control-label col-md-4">New Password</label>
  
                                              <div class="col-md-8">
                                                <div class="input-icon"><i class="fa fa-key"></i>{{ Form::password('password', array('pattern'=> '.{6,12}', 'class'=> 'form-control', 'id'=> 'password', 'placeholder'=> 'New Password')); }}<span class="text-10px">(Password length should be between 6-12 characters)</span>                                                </div>
                                              </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label for="password" class="control-label col-md-4">Confirm New Password</label>
  
                                              <div class="col-md-8">
                                                <div class="input-icon"><i class="fa fa-key"></i>{{ Form::password('conf_password', array('class'=> 'form-control', 'id'=> 'conf_password', 'placeholder'=> 'Confirm New Password')); }} <span class="text-10px">(Password length should be between 6-12 characters)</span>                                                </div>
                                              </div>
                                          </div>
                                          <div class="form-actions">
                                              <div class="col-md-offset-4 col-md-8">
                        {{ Form::submit('Save', array('class'=> 'btn btn-red')) }}
                                                &nbsp;
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
          <nav id="sidebar" role="navigation" class="navbar-default navbar-static-side">
              <div class="sidebar-collapse menu-scroll">
                  <ul id="side-menu" class="nav">
                      <li class="clock"><strong id="get-date"></strong>
  
                          <div class="digital-clock">
                              <div id="getHours" class="get-time"></div>
                              <span>:</span>
  
                              <div id="getMinutes" class="get-time"></div>
                              <span>:</span>
  
                              <div id="getSeconds" class="get-time"></div>
                          </div>
                      </li>
                      <li class="sidebar-heading"><h4>Main Menu</h4></li>
                      <li @if(Route::getCurrentRoute()->getPath()=='dashboard') class="active" @endif ><a href="{{URL::to('/dashboard')}}"><i class="fa fa-laptop fa-fw"></i><span class="menu-title">Dashboard</span></a></li>
                      <li @if(Route::getCurrentRoute()->getPath()=='index_edit') class="active" @endif><a href="{{URL::to('/index_edit')}}"><i class="fa fa-home fa-fw"></i><span class="menu-title">Index Page</span></a> </li>
                      <li @if(Route::getCurrentRoute()->getPath()=='news_events_list') class="active" @endif><a href="{{URL::to('/news_events_list')}}"><i class="glyphicon glyphicon-camera fa-fw"></i><span class="menu-title">Company Bulletin, CSR &amp; Training</span></a> </li>
                      <li><a href="#"><i class="fa fa-briefcase fa-fw"></i><span class="menu-title">Careers</span><span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li @if(Route::getCurrentRoute()->getPath()=='career_vac_edit') class="active" @endif><a href="{{URL::to('/career_vac_edit')}}">Vacancies Listing</a></li>
                              <li @if(Route::getCurrentRoute()->getPath()=='careers_online_applicants_list') class="active" @endif><a href="{{URL::to('/careers_online_applicants_list')}}">Online Applicants Listing</a></li>
                              <li @if(Route::getCurrentRoute()->getPath()=='career') class="active" @endif><a href="{{URL::to('/career')}}">Careers Page</a></li>
  
  
                          </ul>
                      </li>
                      <li class="sidebar-heading"><h4>Banners</h4></li>
                      <li @if(Route::getCurrentRoute()->getPath()=='banners') class="active" @endif><a href="#"><i class="fa fa-briefcase fa-fw"></i><span class="menu-title">Banners</span><span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li @if(Route::getCurrentRoute()->getPath()=='banners') class="active" @endif><a href="{{URL::to('/banners')}}">Sub Page Banners Listing</a></li>
                          </ul>
                      </li>
                      <li class="sidebar-heading"><h4>CMS Pages</h4></li>
                      <!--<li @if(Route::getCurrentRoute()->getPath()=='bod') class="active" @endif><a href="{{ url('/bod') }}"><i class="fa fa-pencil fa-fw"></i><span class="menu-title">Board of Directors</span></a> </li>-->
                    
                      <li  class="{{ Request::is('CoreSub/*') ? 'active' : '' }}"><a href="#"><i class="fa fa-briefcase fa-fw"></i><span class="menu-title">Core Business</span><span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                              <li class="{{ Request::is('CoreSub/core_pdib') ? 'active' : '' }}"><a href="{{URL::to('/CoreSub/core_pdib')}}">Building & Civil Works</a></li>
                              <li class="{{ Request::is('CoreSub/core_sb') ? 'active' : '' }}"><a href="{{URL::to('/CoreSub/core_sb')}}">Hospitality</a></li>
                              <li class="{{ Request::is('CoreSub/core_lafmb') ? 'active' : '' }}"><a href="{{URL::to('/CoreSub/core_lafmb')}}">Property Development & Investment</a></li>
                          </ul>
                      </li>
                      <li @if(Route::getCurrentRoute()->getPath()=='CorporateStructure') class="active" @endif><a href="{{ url('/CorporateStructure') }}"><i class="fa fa-pencil fa-fw"></i><span class="menu-title">Corporate Structure</span></a> </li>
                      <li @if(Route::getCurrentRoute()->getPath()=='contact-tracing') class="active" @endif><a href="{{ url('/contact-tracing') }}"><i class="fa fa-pencil fa-fw"></i><span class="menu-title">Contact Tracing Form Listing</span></a> </li>
                      <li @if(Route::getCurrentRoute()->getPath()=='corporate-profile') class="active" @endif><a href="{{ url('/corporate-profile') }}"><i class="fa fa-pencil fa-fw"></i><span class="menu-title">Corporate Profile</span></a> </li>

                      <li @if(Route::getCurrentRoute()->getPath()=='links') class="active" @endif><a href="{{ url('/links') }}"><i class="fa fa-link"></i><span class="menu-title">Links</span></a> </li>

                      <li @if(Route::getCurrentRoute()->getPath()=='IndexPopUp') class="active" @endif><a href="{{ url('/IndexPopUp') }}"><i class="fa fa-pencil fa-fw"></i><span class="menu-title">Index Pop Up</span></a> </li>

                      <li @if(Route::getCurrentRoute()->getPath()=='ceo-message') class="active" @endif><a href="{{ url('/ceo/ceomessage') }}"><i class="fa fa-envelope"></i><span class="menu-title">CEO Message</span></a></li>
                      
                      
                  </ul>
            </div>
      </nav>
          <!--END SIDEBAR MENU-->
      <script> var password = document.getElementById("password")
    , confirm_password = document.getElementById("conf_password");
  
  function validatePassword(){
    if((password.length < 6)&&(password.length > 12)) {
      password.setCustomValidity("(Password length should be between 6-12 characters");
    } else {
      password.setCustomValidity('');
    }
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity('');
    }
  }
  
  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;</script>