@extends('layouts.admin1')
@section('content')
        <!--END SIDEBAR MENU--><!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
      
          <!-- InstanceBeginEditable name="EditRegion1" -->
          <div class="page-header-breadcrumb">
            <div class="page-heading hidden-xs">
              <h1 class="page-title">Bursa Announcements</h1>
            </div>
            <ol class="breadcrumb page-breadcrumb">
              <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
              <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
              <li>News Centre &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
              <li><a href="news_centre_bursa_announcements_list.html">Bursa Announcements</a> &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
              <li class="active">Entitlements - Listing</li>
            </ol>
          </div>
          <!-- InstanceEndEditable -->
          <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
          <!-- InstanceBeginEditable name="EditRegion2" -->
          <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Entitlements <i class="fa fa-angle-right"></i> Listing</h2>
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
              
              <div class="pull-left margin-top-10px"> Last updated: <span class="text-blue">15 Sept, 2014 @ 12.00PM</span> </div>
              <div class="pull-right"> <a href="#" class="btn btn-red btn-lg">Update Announcement &nbsp;<i class="fa fa-refresh"></i></a> </div>
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
                       <h1>Bursa Announcements</h1>
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
                       <h2 class="red-title pull-left"><span>Entitlements</span></h2>
                       <div class="clearfix"></div> 
                    </div>              
                 </div>
                 <!-- end portlet body -->
                    
              </div>
              <!-- End portlet -->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Entitlements Announcements Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-announcement" data-toggle="modal" class="btn btn-success">Add New Announcement &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
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
                  <!--Modal Add New announcement start-->
                  <div id="modal-add-announcement" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Announcement</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            <form class="form-horizontal">
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    <input type="checkbox" checked="checked"/>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Company <span class='require'>*</span></label>
                                <div class="col-md-6">
                                  <input type="text" class="form-control" id="inputContent" value="OCK GROUP BERHAD">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                <div class="col-md-6">
                                  <textarea name="inputContent" rows="2" class="form-control" id="inputContent"></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Announcement Date <span class='require'>*</span></label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                    <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy"/>
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Content</label>
                                <div class="col-md-9"> 
                                	note to programmer: please follow 100% front end style, including the list style in fckeditor.
                                   <p class="text-blue margin-top-10px border-bottom">You can add content by clicking the text below.</p>
                                     
                                   <div class="table-responsive">
                                       <div contenteditable="true">
                                       		<table class="table table-striped margin_top">
                                            <col />
                                            <col />
                        
                                            <tbody>
                                              <tr>
                                                 <td><strong>Admission Sponsor</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Sponsor</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>EX-date</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement Date</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement Time</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement Subject</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement Description</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Financial Year End</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Share transfer book &amp; register of members will be </strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Registrar's Name, Address, Telephone No</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Payment Date</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>a. Securities transferred into the Depositor's Securities Account before 4:00 pm in respect of transfers</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>b. Securities deposited into the Depositor's Securities Account before 12:30 pm in respect of securities exempted from mandatory deposit</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>c. Securities bought on the Exchange on a cum entitlement basis according to the Rules of the Exchange</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Number of new shares/securities issued (units) (If applicable)</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement Indicator</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Currency</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                              <tr>
                                                 <td><strong>Entitlement in Currency</strong></td>
                                                 <td>Please fill in content</td>
                                              </tr>
                                                               
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                          </table> 
                                       </div>
                                   </div>
                                   <!-- end table responsive -->
                                   
                                   <div contenteditable="true">
                                   		<p>Remarks: Please fill in content.</p>  
                                   </div>
                                   
								   <!-- Info Resalt-->
                                  <div class="info_resalt border_bottom">
                                      <div class="row-fluid">
                                        <div class="col-lg-12">
                                          <div contenteditable="true">
                                          	<h2 class="red-title"><span>Announcement Info</span></h2>
                                          </div>
                                          <div contenteditable="true">
                                              <div class="alert alert-error">
                                                  <strong>Reference No:</strong> Please fill in reference no.  
                                              </div>
                                          </div>
                                        </div>      
                                      </div>
                                      
                                  </div>
                                  <!-- End Info Resalt-->
                                   
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
                  <!--END MODAL Add New announcement-->
                  <!--Modal delete selected items start-->
                  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                          <p><strong>#1:</strong> 02 May, 2013 - Final Dividend</p>
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
                        <th>Date</th>
                        <th>Company</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox"/></td>
                        <td>1</td>
                        <td><span class="label label-sm label-success">Active</span></td>
                        <td>02 May, 2013</td>
                        <td>OCK GROUP BERHAD</td>
                        <td>Final Dividend</td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-announcement" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-1" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            <!--Modal edit announcement start-->
                              <div id="modal-edit-announcement" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Announcement</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                        <form class="form-horizontal">
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-9">
                                              <div data-on="success" data-off="primary" class="make-switch">
                                                <input type="checkbox" checked="checked"/>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Company <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <input type="text" class="form-control" id="inputContent" value="OCK GROUP BERHAD">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <textarea name="inputContent" rows="2" class="form-control" id="inputContent">Final Dividend</textarea>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Announcement Date <span class='require'>*</span></label>
                                            <div class="col-md-5">
                                              <div class="input-group">
                                                <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value="02 May, 2013"/>
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputContent" class="col-md-3 control-label">Content</label>
                                            <div class="col-md-9"> 
                                                note to programmer: please follow 100% front end style, including the list style in fckeditor.
                                               <p class="text-blue margin-top-10px border-bottom">You can add content by clicking the text below.</p>
                                               
                                               <div class="table-responsive">
                                                   <div contenteditable="true">
                                                        <table class="table table-striped margin_top">
                                                        <col />
                                                        <col />
                                    
                                                        <tbody>
                                                          <tr>
                                                             <td><strong>Admission Sponsor</strong></td>
                                                             <td>Alliance Investment Bank Berhad</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Sponsor</strong></td>
                                                             <td>Same as above</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>EX-date</strong></td>
                                                             <td>07/06/2013</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement Date</strong></td>
                                                             <td>11/06/2013</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement Time</strong></td>
                                                             <td>05:00:00 PM</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement Subject</strong></td>
                                                             <td>Final Dividend</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement Description</strong></td>
                                                             <td>Final Single Tier Dividend of RM0.005 per ordinary share in respect of the financial year ended 31 December 2012</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Financial Year End</strong></td>
                                                             <td>31/12/2012</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Share transfer book &amp; register of members will be </strong></td>
                                                             <td>11/06/2013 to 11/06/2013 closed from (both dates inclusive) for the purpose of determining the entitlements</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Registrar's Name, Address, Telephone No</strong></td>
                                                             <td>Equiniti Services Sdn Bhd <br/>Level 8, Menara MIDF, 82, Jalan Raja Chulan, 50200 Kuala Lumpur <br/>Tel No.: +(603) 2166-0933</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Payment Date</strong></td>
                                                             <td>10/07/2013</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>a. Securities transferred into the Depositor's Securities Account before 4:00 pm in respect of transfers</strong></td>
                                                             <td>11/06/2013</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>b. Securities deposited into the Depositor's Securities Account before 12:30 pm in respect of securities exempted from mandatory deposit</strong></td>
                                                             <td></td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>c. Securities bought on the Exchange on a cum entitlement basis according to the Rules of the Exchange</strong></td>
                                                             <td></td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Number of new shares/securities issued (units) (If applicable)</strong></td>
                                                             <td></td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement Indicator</strong></td>
                                                             <td>Currency</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Currency</strong></td>
                                                             <td>Malaysian Ringgit (MYR)</td>
                                                          </tr>
                                                          <tr>
                                                             <td><strong>Entitlement in Currency</strong></td>
                                                             <td>0.005</td>
                                                          </tr>
                                                                           
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tfoot>
                                                      </table> 
                                                   </div>
                                               </div>
                                               <!-- end table responsive -->
                                               
                                               <div contenteditable="true">
                                                    <p>Remarks: The final dividend of RM0.005 per share under the single tier system for the financial year ended 31 December 2012 is subject to the shareholders' approval at the forthcoming Second Annual General Meeting OCK Group Berhad to be held on Monday, 27 May 2013.</p> 
                                               </div>
                                               
                                               <!-- Info Resalt-->
                                              <div class="info_resalt border_bottom">
                                                  <div class="row-fluid">
                                                    <div class="col-lg-12">
                                                      <div contenteditable="true">
                                                        <h2 class="red-title"><span>Announcement Info</span></h2>
                                                      </div>
                                                      <div contenteditable="true">
                                                          <div class="alert alert-error">
                                                              <strong>Reference No:</strong> CC-130502-2BBBF  
                                                          </div>
                                                      </div>
                                                    </div>      
                                                  </div>
                                                  
                                              </div>
                                              <!-- End Info Resalt-->
                                               
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
                              <!--END MODAL edit announcement-->
                            <!--Modal delete start-->
                            <div id="modal-delete-1" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this announcement? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#1:</strong> 02 May, 2013 - Final Dividend</p>
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
              
                      
                      
            </div>
          </div>
        </div>
@stop