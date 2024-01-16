@extends('layouts.front_without_banner')
@section('content') 


        
 <!-- Slide -->
    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="banner_subpage5"></div>
    <!-- InstanceEndEditable -->
    <!-- Info section Title-->
<!-- InstanceBeginEditable name="EditRegion2" -->
    <div class="section_title1">
      <div class="container">
        <div class="row-fluid animated fadeInUp delay1">
          <div class="span5">
            <h1>Corporate Information</h1>
          </div>
          <div class="span7">
            <p>Full Turnkey Solutions for Telecom Client.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- InstanceEndEditable -->
<!-- End Header-->        
            
            
  <!-- InstanceBeginEditable name="EditRegion1" -->
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Financial Information</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Financial Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Latest Quarterly Report - Listing</li>
          </ol>
        </div>
        <!-- InstanceEndEditable -->
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Latest Quarterly Report <i class="fa fa-angle-right"></i> Listing</h2>
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
              
              <div class="pull-left margin-top-10px">
              	Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span>
              </div>
              <div class="pull-right"> 
              	<a href="#" class="btn btn-red btn-lg">Update PDF Report &nbsp;<i class="fa fa-refresh"></i></a> 
              </div>
              <div class="clearfix"></div>
              <p></p>
              
              <div class="portlet">
                 <div class="portlet-header">
                    <div class="caption">Page Info</div><br/>
                    <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                    <div class="tools">
                       <i class="fa fa-chevron-up"></i>
                    </div>
                 </div>
                 <div class="portlet-body">
                    <div contenteditable="true">
                       <h1>Latest Quarterly Report</h1>
                    </div>
                 </div>
     	      </div>
              
              <div class="portlet">
                 <div class="portlet-header">
                    <div class="caption">Page Content</div><br/>
                    <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                    <div class="tools">
                       <i class="fa fa-chevron-up"></i>
                    </div>
                 </div>
                 <div class="portlet-body">
                    <div contenteditable="true">
                       <h2 class="red-title">Latest Quarterly Report</h2>
                    </div>
                 </div>
     	      </div>
              
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#viewpdf" data-toggle="tab">View PDF</a></li>
              </ul>
              
              <div id="myTabContent" class="tab-content">
              	<div id="viewpdf" class="tab-pane fade in active"> 
                  <div class="portlet">
                    <div class="portlet-header"> 
                        <a href="#" data-target="#modal-add-pdf" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                        <!--Modal Add New PDF start-->
                                    <div id="modal-add-pdf" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Add New PDF</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control"></textarea>  
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Add New PDF-->
                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary">Delete</button>
                          <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                          <ul role="menu" class="dropdown-menu">
                            <li><a href="#" data-target="#modal-delete-selected" data-toggle="modal">Delete selected item(s)</a></li>
                            <li class="divider"></li>
                            <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                          </ul>
                        </div>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                      <!--Modal delete selected items start-->
                        <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                              </div>
                              <div class="modal-body">
                                <p><strong>#6:</strong> 30 June, 2014 - 2014 Q2 Report</p>
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
                                <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete all items? </h4>
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
                      <div class="pull-right">Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span></div>
                      <div class="clearfix"></div>
                      <br/>
                      <br/>
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th width="1%"><input type="checkbox"/></th>
                            <th>#</th>
                            <th>Status</th>
                            <th>Date Created</th>
                            <th>Reprot Title</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>6</td>
                            <td><span class="label label-sm label-danger">Inactive</span></td>
                            <td>30 June, 2014</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q2_30-06-2014.pdf" target="_blank">2014 Q2 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-6" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-6" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> 
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-6" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2014 Q2 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="30 June, 2014"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q2_30-06-2014.pdf" target="_blank">OCK_QR_Q2_30-06-2014.pdf</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-6" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#6:</strong> 2014 Q2 Report</p>
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
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>5</td>
                            <td><span class="label label-sm label-danger">Inactive</span></td>
                            <td>31 Mar, 2014</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q1_31-03-2014.pdf" target="_blank">2014 Q1 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-5" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-5" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-5" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2014 Q1 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="31 Mar, 2014"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q1_31-03-2014.pdf" target="_blank">OCK_QR_Q1_31-03-2014</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-5" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#5:</strong> 2014 Q1 Report</p>
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
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>4</td>
                            <td><span class="label label-sm label-danger">Inactive</span></td>
                            <td>31 Dec, 2013</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q4_31-12-2013.pdf" target="_blank">2013 Q4 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-4" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-4" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-4" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2013 Q4 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="31 Dec, 2013"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q4_31-12-2013.pdf" target="_blank">OCK_QR_Q4_31-12-2013.pdf</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-4" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#4:</strong> 2013 Q4 Report</p>
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
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>3</td>
                            <td><span class="label label-sm label-success">Active</span></td>
                            <td>30 Sept, 2013</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q3_30-09-2013.pdf" target="_blank">2013 Q3 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-3" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-3" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-3" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2013 Q3 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="30 Sept, 2013"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q3_30-09-2013.pdf" target="_blank">OCK_QR_Q3_30-09-2013.pdf</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-3" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#3:</strong> 2013 Q3 Report</p>
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
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>2</td>
                            <td><span class="label label-sm label-success">Active</span></td>
                            <td>30 June, 2013</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q2_30-06-2013.pdf" target="_blank">2013 Q2 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-2" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-2" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-2" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2013 Q2 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="30 June, 2013"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q2_30-06-2013.pdf" target="_blank">OCK_QR_Q2_30-06-2013.pdf</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-2" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#2:</strong> 2013 Q2 Report</p>
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
                          <tr>
                            <td><input type="checkbox"/></td>
                            <td>1</td>
                            <td><span class="label label-sm label-success">Active</span></td>
                            <td>31 Mar, 2013</td>
                            <td><a href="../img/quarterly_reports/OCK_QR_Q1_31-03-2013.pdf" target="_blank">2013 Q1 Report</a></td>
                            <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-pdf-1" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                <!--Modal Edit PDF start-->
                                    <div id="modal-edit-pdf-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                    <h4 id="modal-login-label" class="modal-title">Edit PDF</h4></div>
                                                <div class="modal-body">
                                                    <div class="form">
                                                        <form class="form-horizontal">
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Status</label>
                                                                <div class="col-md-9">
                                                                    <div data-on="success" data-off="primary" class="make-switch"><input type="checkbox" checked="checked"/></div>    
                                                                </div>  
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <textarea id="inputContent" rows="2" class="form-control">2013 Q1 Report</textarea>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                                                <div class="col-md-5">
                                                                    <div class="input-group">
                                                                        <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="31 Mar, 2013"/>
                                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                    </div>
                                                                    
                                                                 </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Upload PDF <span class='require'>*</span></label>
                                                                <div class="col-md-9">
                                                                    <a href="../img/quarterly_reports/OCK_QR_Q1_31-03-2013.pdf" target="_blank">OCK_QR_Q1_31-03-2013.pdf</a>
                                                                    <div class="text-15px margin-top-10px"><input id="exampleInputFile1" type="file"/></div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-actions">
                                                                <div class="col-md-offset-4 col-md-8">
                                                                   <a href="#" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></a>&nbsp;
                                                                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--END MODAL Edit PDF-->
                                
                                <!--Modal delete start-->
                                <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this report? </h4>
                                      </div>
                                      <div class="modal-body">
                                        <p><strong>#1:</strong> 2013 Q1 Report</p>
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
                            <td colspan="7"></td>
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
                </div>
                <!-- End tab view pdf -->
              </div>
              <!-- End tab content -->
             
            </div>
          </div>
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->
        <!-- End content info-->


@stop
        