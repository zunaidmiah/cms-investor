<nav id="topbar" role="navigation" style="margin-bottom: 0;" class="navbar navbar-default navbar-static-top">
          <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            <div id="logo" href="#" class="navbar-brand">{{ HTML::image('admin/images/logo_web88.png') }}</div>
               
          </div>
            
            	<div class="topbar-main">
                	<a id="logo" href="#" class="navbar-brand">{{ HTML::image('admin/images/logo.jpg') }}</a>
                    <a id="menu-toggle" href="#" class="btn hidden-xs"><i class="fa fa-bars"></i></a>
                    
                <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                    <div class="input-icon right"><a href="#"><i class="fa fa-search"></i></a><input type="text" placeholder="Search here..." class="form-control"/></div>
                </form>
                <ul class="nav navbar-top-links navbar-right">
                
                    <li class="dropdown"><a data-toggle="dropdown" href="#" class="dropdown-toggle">{{ HTML::image('admin/images/profile/image_hock.jpg', '', array('class'=>'img-responsive img-circle')) }}&nbsp;
                        Support Webqom
                        &nbsp;<span class="caret"></span></a>
                  <ul class="dropdown-menu dropdown-user pull-right animated bounceInLeft">
                            <li>
                                <div class="navbar-content">
                                    <div class="row">
                                        <div class="col-md-5 col-xs-5">{{ HTML::image('admin/images/profile/image_hock.jpg', '', array('class'=>'img-responsive img-circle')) }}

                                            <p class="text-center mtm">
                                            	<a href="#" class="change-avatar">
                                                <small>Change Avatar</small>
                                                </a></p>
                                      </div>
                                        <div class="col-md-7 col-xs-5"><span>Support Webqom</span>

                                            <p class="text-muted small">support@webqom.com</p>

                                            <div class="divider"></div>
                                            <a href="#" class="btn btn-primary btn-sm">View Profile</a></div>
                                    </div>
                                </div>
                                <div class="navbar-footer">
                                    <div class="navbar-footer-content">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6"><a href="#" class="btn btn-default btn-sm" data-target="#modal-change-password" data-toggle="modal">Change Password</a></div>
                                            <div class="col-md-6 col-xs-6"><a href="logout" class="btn btn-default btn-sm pull-right">Sign Out</a></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                      </ul>
                  </li>
                </ul>
          </div>
        </nav>
        <!--Modal Change Password start-->
                <div id="modal-change-password" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label" class="modal-title">Change Password</h4></div>
                            <div class="modal-body">
                                <div class="form">
                                    <form class="form-horizontal" action="changePassword" method="post">
                                        
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">New Password</label>

                                            <div class="col-md-8">
                                                <div class="input-icon"><i class="fa fa-key"></i> <input id="password" type="password" name="newPassword" placeholder="New Password" class="form-control"/><span class="text-10px">(Password length should be between 6-12 characters)</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                        	<label for="password" class="control-label col-md-4">Confirm New Password</label>

                                            <div class="col-md-8">
                                                <div class="input-icon"><i class="fa fa-key"></i> <input id="password" name="Cpassword" type="password" placeholder="Confirm New Password" class="form-control"/><span class="text-10px">(Password length should be between 6-12 characters)</span>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8">
                                                <button  class="btn btn-red" type="submit">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp;
                                              <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!--END MODAL CHANGE PASSWORD-->
        
        <?php  if(isset($msg)){ ?>
            
        <script>
            document.ready(function(){
                alert('Password Changed Successfully');
            })
        </script> 
            
        <?php }
        ?>