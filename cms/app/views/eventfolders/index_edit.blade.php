@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
<div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Index</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Index - Edit</li>
          </ol>
        </div>
          
        <!--END PAGE HEADER & BREADCRUMB-->
        <!--BEGIN CONTENT-->
        {{ Form::open(array('url' => 'adminsavepage')) }}
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Index <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>
              <div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>The information has been saved/updated successfully.</p>
              </div>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                <p>The information has not been saved/updated. Please correct the errors.</p>
              </div>
              
              <div class="pull-left"> Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Content</div>
                  <br/>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body"> note to programmer: the below inline editor, please follow 100% css style in front end, inlcuding text, bullet style, icon style, text color, label style, and page layout etc...
                  
                <!-- Info title-->
                <div class="row-fluid info_title">
                    <div class="vertical_line">
                        <div class="circle_top"></div>
                    </div>
                  <div class="info_vertical">  
                    <div class="col-lg-6">
                        <div class="row-fluid">
                          <div contenteditable="true">
                          	<h2 class="red-title"><span>Driving Network Solution</span></h2>
                          </div>
                          <div contenteditable="true">
                          	<p>Established in 2000, OCK Group is principally involved in the provision of telecommunications network services. We are able to provide full turnkey services in that respect.</p> 
                          </div>
                        </div>
                    </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="vertical_line"></div>
    
                    <i class="icon-cogs right"></i>
                </div>
                <!-- End Info title-->
                  
                  
                <div class="clearfix"></div>
                <!-- Info Resalt-->
                <div class="info_resalt border_top">

                        <div class="row text-center service-process">
                            <div class="info_vertical">
                                <div contenteditable="true">
                                	<h2 class="red-title"><span>Core Business</span></h2>
                                </div>
                                <div contenteditable="true">
                                	<p>Network planning, design and optimization, network deployment, network operations and maintenance, energy management, infrastructure management, and other professional services.</p>
                                </div>
                            </div>
                            <br/>
                            <!-- Step 1 -->                        
                              <div class="col-lg-3">
                                  <div class="thumbnail">
                                    <div class="caption-head">
                                      
                                          <a href="#" data-placement="top" data-target="#modal-edit-core-business-1" data-toggle="modal" title="Edit">
                                              <em class="caption-icon icon-sitemap icon-big"></em>                            
                                              <h4 class="caption-title">Telco Network Services</h4>
                                          </a>
                                    </div>
                                  </div>
                              </div>                        
    
                            <!-- Step 2 -->                        
                              <div class="col-lg-3">
                                  <div class="thumbnail">
                                    <div class="caption-head">
                                       <a href="#" data-placement="top" data-target="#modal-edit-core-business-2" data-toggle="modal" title="Edit">
                                        <em class="caption-icon icon-laptop icon-big"></em>
                                        <h4 class="caption-title">Trading of Telco <br/>&amp; IT Products</h4>
                                       </a>
                                    </div>
                                  </div>
                              </div>                        
    
                            <!-- Step 3 -->
                            <div class="col-lg-3">
                                <div class="thumbnail">
                                  <div class="caption-head">
                                     <a href="#" data-placement="top" data-target="#modal-edit-core-business-3" data-toggle="modal" title="Edit"> 
                                      <em class="caption-icon icon-leaf icon-big"></em>
                                      <h4 class="caption-title">Green Technology <br/>&amp; Solar</h4>
                                     </a>
                                  </div>
                                </div>
                            </div>
    
                            <!-- Step 4 -->
                            <div class="col-lg-3">
                                <div class="thumbnail">
                                  <div class="caption-head">
                                     <a href="#" data-placement="top" data-target="#modal-edit-core-business-4" data-toggle="modal" title="Edit"> 
                                      <em class="caption-icon icon-wrench icon-big"></em>
                                      <h4 class="caption-title">M&amp;E Engineering Works</h4>
                                     </a>
                                  </div>                           
                                </div>
                            </div>                    
                        </div>
                        
                        
                        <!--Modal edit core business 1 start-->
                              <div id="modal-edit-core-business-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Core Business</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal">
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Icon <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="inputContent" value="icon-sitemap">
                                              <div class="help-block">Please refer here for more <a href="icons.html" target="_blank">icon options.</a></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <textarea name="inputContent" rows="2" class="form-control" id="inputContent">Telco Network Services</textarea>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Website URL </label>
                                            <div class="col-md-6">
                                              <div class="input-icon"><i class="fa fa-link"></i>
                                                  <input type="text" placeholder="http://" class="form-control" value="http://www.ock.com.my/services_telecommunications_network.html"/>
                                              </div>
                                            </div>
                                            
                                          </div>

                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL edit core business 1-->
                              
                              <!--Modal edit core business 2 start-->
                              <div id="modal-edit-core-business-2" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Core Business</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal" >
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Icon <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="inputContent" value="icon-laptop">
                                              <div class="help-block">Please refer here for more <a href="icons.html" target="_blank">icon options.</a></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <textarea name="inputContent" rows="2" class="form-control" id="inputContent">Trading of Telco <br/>&amp; IT Products</textarea>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Website URL </label>
                                            <div class="col-md-6">
                                              <div class="input-icon"><i class="fa fa-link"></i>
                                                  <input type="text" placeholder="http://" class="form-control" value="http://www.ock.com.my/services_trading_telecommunications_it.html"/>
                                              </div>
                                            </div>
                                            
                                          </div>
                                          
                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL edit core business 2-->
                              
                              <!--Modal edit core business 3 start-->
                              <div id="modal-edit-core-business-3" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Core Business</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal">
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Icon <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="inputContent" value="icon-leaf">
                                              <div class="help-block">Please refer here for more <a href="icons.html" target="_blank">icon options.</a></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <textarea name="inputContent" rows="2" class="form-control" id="inputContent">Green Technology <br/>&amp; Solar</textarea>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Website URL </label>
                                            <div class="col-md-6">
                                              <div class="input-icon"><i class="fa fa-link"></i>
                                                  <input type="text" placeholder="http://" class="form-control" value="http://www.ock.com.my/services_green_technology_solar.html"/>
                                              </div>
                                            </div>
                                            
                                          </div>

                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL edit core business 3-->
                              
                              <!--Modal edit core business 4 start-->
                              <div id="modal-edit-core-business-4" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Core Business</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal">
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Icon <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="inputContent" value="icon-wrench">
                                              <div class="help-block">Please refer here for more <a href="icons.html" target="_blank">icon options.</a></div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <textarea name="inputContent" rows="2" class="form-control" id="inputContent">M&amp;E Engineering Works</textarea>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Website URL </label>
                                            <div class="col-md-6">
                                              <div class="input-icon"><i class="fa fa-link"></i>
                                                  <input type="text" placeholder="http://" class="form-control" value="http://www.ock.com.my/services_me_engineering_works.html"/>
                                              </div>
                                            </div>
                                            
                                          </div>

                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL edit core business 4-->
                              <div class="clearfix"></div>
  
                </div>
                <!-- End Info Resalt-->
                
                
                
                </div>
                <!-- end portlet body-->
              </div>
              <!-- End portlet-->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Montage Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-montage" data-toggle="modal" class="btn btn-success">Add New Montage &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selected" data-toggle="modal">Delete selected item(s)</a></li>
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
                          <h4 id="modal-login-label2" class="modal-title">Add New Montage</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            <form class="form-horizontal">
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" checked="checked"/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group has-error">
                                <label class="col-md-3 control-label">Title </label>
                                <div class="col-md-6">
                                  <input id="text" type="text" class="form-control" placeholder="Banner 1">
                                </div>
                                <div class="col-md-3">
                                      <div class="popover popover-validator right">
                                        <div class="arrow"></div>
                                        <div class="popover-content">
                                          <p class="mbn">Title is empty!</p>
                                        </div>
                                      </div>
                                    </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Banner Text </label>
                                <div class="col-md-9">
                                	<div class="text-blue border-bottom">You can edit the content by clicking the text section below.</div>
                                  <div contenteditable="true">
                                  	 <div class="camera_caption fadeFromLeft">

                                        <div class="row-fluid">                                
                                                <h1 class="animated fadeInDown">Full Turnkey Solutions <br>for <span>Telecom Client</span>.</h1>
                                                <p class="animated fadeInUp">Network planning, design &amp; optimization, network deployment, network operations &amp; maintenance</p>
                                        </div>  
                                    </div>                                                                                         

                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload Banner <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                    <input id="exampleInputFile1" type="file"/>
                                    <br/>
                                    <span class="help-block">(Image dimension: min. 1700 x 1000 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Enable Explore More Button</label>
                                <div class="col-md-6">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" />
                                  </div>
                                  <div class="clearfix"></div>
								  note to programmer: the below URL link box is only appeared  when the above enable explore more button is on.
                                  <div class="input-icon margin-top-10px"><i class="fa fa-link"></i>
                                     <input type="text" placeholder="http://" class="form-control"/>
                                  </div>
                                </div>
                                
                                
                              </div>
                              
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                            </form>
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
                          <p><strong>#1:</strong> Banner 1</p>
                          <div class="form-actions">
                            <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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
                            <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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
                      <select name="select" class="form-control">
                        <option>10</option>
                        <option>20</option>
                        <option selected="selected">30</option>
                        <option>50</option>
                        <option>100</option>
                      </select>
                      &nbsp;
                      <label class="control-label">Records per page</label>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <br/>
                  <br/>
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th width="1%"><input type="checkbox"/></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox"/></td>
                        <td>1</td>
                        <td><span class="label label-sm label-success">Active</span></td>
                        <td>Banner 1</td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-montage" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                          <!--Modal Edit Montage start-->
                          <div id="modal-edit-montage" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-wide-width">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                  <h4 id="modal-login-label2" class="modal-title">Edit Montage</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="form">
                                    <form class="form-horizontal">
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Status</label>
                                        <div class="col-md-6">
                                          <div data-on="success" data-off="primary" class="make-switch">
                                            <input type="checkbox" checked="checked"/>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Title </label>
                                        <div class="col-md-6">
                                          <input id="text" type="text" class="form-control" placeholder="Banner 1" value="Banner 1">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Banner Text </label>
                                        <div class="col-md-9">
                                            <div class="text-blue border-bottom">You can edit the content by clicking the text section below.</div>
                                          <div contenteditable="true">
                                             <div class="camera_caption fadeFromLeft">
        
                                                <div class="row-fluid">                                
                                                        <h1 class="animated fadeInDown">Full Turnkey Solutions <br>for <span>Telecom Client</span>.</h1>
                                                        <p class="animated fadeInUp">Network planning, design &amp; optimization, network deployment, network operations &amp; maintenance</p>
                                                </div>  
                                            </div>                                                                                         
        
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Upload Banner <span class='require'>*</span></label>
                                        <div class="col-md-9">
                                          <div class="text-15px margin-top-10px">
                                          	<img src="../img/slide/slides/img1.jpg" alt="Banner" class="img-responsive"><br/>
                                            <input id="exampleInputFile1" type="file"/>
                                            <br/>
                                            <span class="help-block">(Image dimension: min. 1700 x 1000 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label class="col-md-3 control-label">Enable Explore More Button</label>
                                        <div class="col-md-6">
                                          <div data-on="success" data-off="primary" class="make-switch">
                                            <input type="checkbox" />
                                          </div>
                                          note to programmer: the below URL link box is only appeared  when the above enable explore more button is on.
                                          <div class="input-icon margin-top-10px"><i class="fa fa-link"></i>
                                             <input type="text" placeholder="http://" class="form-control" value="http://www.ock.com.my/services_telecommunications_network.html"/>
                                          </div>
                                          
                                        </div>
                                      </div>
                                      
                                      <div class="form-actions">
                                        <div class="col-md-offset-5 col-md-8"> <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--END MODAL Edit Montage-->
                            <!--Modal delete start-->
                            <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this banner? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#1:</strong> Banner 1</p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!-- modal delete end -->
                           
                        </td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">Showing 1 to 10 of 57 entries</p>
                    <ul class="pagination pagination mtm mbm">
                      <li class="disabled"><a href="#">&laquo;</a></li>
                      <li class="active"><a href="#">1</a></li>
<li><a href="#">2</a></li>
<li><a href="#">3</a></li>
<li><a href="#">4</a></li>
<li><a href="#">5</a></li>
<li><a href="#">&raquo;</a></li>
</ul>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <!-- End porlet -->
              
              <div class="form-actions none-bg"> 
                  {{ Form::submit('Save &amp; Preview', array('class' => 'btn btn-red')) }}&nbsp; {{ Form::submit('Save &amp; Publish', array('class' => 'btn btn-blue')) }}&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;</a> </div>
            </div>
          </div>
        </div>
        {{ Form::close() }}
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="images/logo_webqom.png" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>

@stop