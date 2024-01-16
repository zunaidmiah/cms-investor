@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
    <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Careers</h1>
          </div>
          
          <!-- InstanceBeginEditable name="EditRegion1" -->
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Online Job Applicants - Listing</li>
          </ol>
          <!-- InstanceEndEditable --></div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Online Job Applicants <i class="fa fa-angle-right"></i> Listing</h2>
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
              <div class="pull-left"> Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span> </div>
              <div class="clearfix"></div>
              <p></p>
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Info</div>
                  <br/>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  <div contenteditable="true">
                    <h1>Online Job Applicants</h1>
                  </div>
                </div>
              </div>
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Online Job Applicants Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                 
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
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                          <p><strong>#1:</strong> Position Applied: Business Development Executive <br/>
                          						  Applicant Name: Hock Lim
                          </p>
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
                        <th>Date Applied</th>
                        <th>Applicant Name</th>
                        <th>Position Applied</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox"/></td>
                        <td>1</td>
                        <td><span class="label label-sm label-success">Active</span></td>
                        <td>31 Dec, 2013</td>
                        <td>Hock Lim</td>
                        <td>Business Development Executive</td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-view-details" data-toggle="modal" title="View Details"><span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            <!--Modal view details start-->
                            <div id="modal-view-details" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">View Applicant Details</h4>
                                  </div>
                                  <div class="modal-body">
    								  <form action="#" class="form-horizontal">
                                                    <div class="form-body pal">
                                                    	<h3 class="block-heading">Personal</h3>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputFirstName" class="col-md-4 control-label">First Name:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Hock</p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputLastName" class="col-md-4 control-label">Last Name:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Lim</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputEmail" class="col-md-4 control-label">Email:</label>

                                                                    <div class="col-md-8"><p class="form-control-static"><a href="mailto:hock@webqom.com">hock@webqom.com</a></p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="selGender" class="col-md-4 control-label">Contact Number:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">03 2203-0998</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputBirthday" class="col-md-4 control-label">Date of Birth:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">22 Mar, 1980</p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputPhone" class="col-md-4 control-label">Mobile Number:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">012-222-4562</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3 class="block-heading">Address</h3>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputAddress1" class="col-md-4 control-label">Address:</label>

                                                                    <div class="col-md-8">
                                                                    	<p class="form-control-static">B2-2-2, Solaris Dutamas, No. 1, Jalan Dutamas 1, 50480 Kuala Lumpur, Wilayah Persekutuan, Malaysia.</p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputAddress2" class="col-md-4 control-label">City:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Kuala Lumpur</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputStates" class="col-md-4 control-label">State:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Wilayah Persekutuan</p></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputCity" class="col-md-4 control-label">Post Code:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">50480</p></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputPostCode" class="col-md-4 control-label">Country:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Malaysia</p></div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                        <!-- education background start -->
                                                        <h3 class="block-heading">Education Background</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputPostCode" class="col-md-4 control-label">Education Level:</label>

                                                                    <div class="col-md-8"><p class="form-control-static">Professional Certificated/Degree/Master</p></div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- end education background-->
                                                        <!-- CV start -->
                                                        <h3 class="block-heading">Attached CV</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label for="inputPostCode" class="col-md-4 control-label">Applicant CV:</label>

                                                                    <div class="col-md-8">
                                                                    	<p class="form-control-static"><a href="#" target="_blank">use the uploaded cv file name</a></p></div>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- end CV-->
                                                        
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-5 col-md-8"> 
                                                        	<a href="#" data-dismiss="modal" class="btn btn-green">Close &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                                      </div>
                                                </form>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!--END MODAL view details-->
                            <!--Modal delete start-->
                            <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this applicant? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#1:</strong> Position Applied: Business Development Executive <br/>
                                    						Applicant Name: Hock Lim
                                    </p>
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
              <!-- end portlet -->
            </div>
          </div>
        </div>
        <!-- InstanceEndEditable -->
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
<div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="images/logo_webqom.png" alt="Webqom Technologies"></div>
                </div>
        </div>
    <!--END FOOTER--></div>
<!--END PAGE WRAPPER-->
@stop