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
              <li class="active">Financial Results - Listing</li>
            </ol>
          </div>
          <!-- InstanceEndEditable -->
          <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
          <!-- InstanceBeginEditable name="EditRegion2" -->
          <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Financial Results <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
               {{ Session::get('message') }}
              
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
                       <h2 class="red-title pull-left"><span>Financial Results</span></h2>
                       <div class="clearfix"></div> 
                    </div>              
                 </div>
                 <!-- end portlet body -->
                    
              </div>
              <!-- End portlet -->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Financial Results Announcements Listing</div>
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
					  {{ Form::open(array('url' => 'admin/inverstoralert/saveFinancial','class'=> 'form-horizontal','method' => 'post','files' => true)) }}
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Announcement</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            <form class="form-horizontal">
                              <div class="form-group">
                               <label class="col-md-4 control-label">Status</label>
                                <div class="col-md-8">
                                  <div  data-on="success" data-off="primary" class="make-switch">{{Form::checkbox('active', 1 ,array('id'=>'active','class' => 'form-control'))}}

                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Company <span class='require'>*</span></label>
                                <div class="col-md-6">
								{{ Form::text('company','',array('id' => 'company','class' => 'form-control', 'placeholder' => 'company name' )) }} 
                                 
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                <div class="col-md-6">
								{{ Form::textarea('title','',array('id' => 'title','class' => 'form-control', 'placeholder' => 'title','rows'=>2 )) }} 
                                 
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Announcement Date <span class='require'>*</span></label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                   {{Form::text('date','',array('id'=>'date','class' => 'datepicker-default form-control','data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy'))}}  
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Content</label>
                                <div class="col-md-9"> 
                                	note to programmer: please follow 100% front end style, including the list style in fckeditor.
                                   <p class="text-blue margin-top-10px border-bottom">You can add content by clicking the text below.</p>
                                   <div  onblur="return div_val1(this.id)" id="announcement_content" contenteditable="true">


                                   		Please fill in content here.
                                   
                                   		<p>Remarks: N/A.</p> 
                                   </div>
                                   <textarea name="textarea_announcement_content" id="textarea_announcement_content" style="display:none;"></textarea>
								   <!-- Info Resalt-->
                                  <div class="info_resalt border_bottom">
                                      <div class="row-fluid">
                                        <div class="col-lg-12">
                                          <div contenteditable="true">
                                          	<h2 class="red-title"><span>Announcement Info</span></h2>
                                          </div>
                                          <div id="reference" onblur="return div_val1(this.id)" contenteditable="true">
                                              <div class="alert alert-error">
                                                  <strong>Reference No:</strong> Please fill in reference no.  
                                              </div>
                                          </div>
											<textarea name="textarea_reference" id="textarea_reference" style="display:none;"></textarea>
                                        </div>      
                                      </div>
                                      
                                  </div>
                                  <!-- End Info Resalt-->
                                   
                                </div>
                              </div>
                              {{Form::hidden('type','Financial Result')}}
                              <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                           {{Form :: close()}}
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
                           <div class="col-md-offset-4 col-md-8"> {{ Form::open(array('url' => 'admin/deleteallinvestoralert', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }} {{Form::hidden('type','Financial Result')}}<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 
                                      {{ Form::close() }} </div>
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
         
                      <label class="control-label">Records per page</label>
                       @endif
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
                      <?php
					 $i=1;
					
					 foreach($accountlisting as $data){
					 ?>
                      <tr>
                         <td><input type="checkbox" class="chkNumber" value="{{$data->id}}"></td>
                        <td><?php echo $i; ?></td>
                        <td><?php  if($data->active==1){ ?><span class="label label-sm label-success">Active</span><?php }else{ ?><span class="label label-sm  btn-primary">Inactive</span> <?php } ?></td>
                        <td><?php echo $data->date_of_publishing;?></td>
                        <td><?php echo $data->company_name;?></td>
                        <td><?php echo $data->title;?></td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-announcement<?php echo $data->id;?>" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo $data->id;?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            <!--Modal edit announcement start-->
                              <div id="modal-edit-announcement<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Announcement</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form" onclick="checkbox_val()">
									   {{ Form::open(array('url' => 'admin/editinvestoralert','class'=> 'form-horizontal','method' => 'post','files' => true)) }}
                                        <form class="form-horizontal">
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-9">
                                              
                                                {{Form::checkbox('active', $data->active, $data->active ,array('id'=>'active','class' => 'form-control','onclick'=>'return checkbox_val(this.id)'))}}
                                              
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Company <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              {{ Form::text('company',$data->company_name,array('id' => 'company','class' => 'form-control', 'placeholder' => 'company name' )) }}
											   {{Form::hidden('id',$data->id)}}
											   {{Form::hidden('type','Financial Result')}}
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                             {{ Form::textarea('title',$data->title,array('id' => 'title','class' => 'form-control', 'placeholder' => 'title','rows'=>2 )) }} 
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Announcement Date <span class='require'>*</span></label>
                                            <div class="col-md-5">
                                              <div class="input-group">
                                                {{Form::text('date',$data->date_of_publishing,array('id'=>'date','class' => 'datepicker-default form-control','data-date-format' => 'dd/mm/yyyy', 'placeholder' => 'dd/mm/yyyy'))}}  
                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputContent" class="col-md-3 control-label">Content</label>
                                            <div class="col-md-9"> 
                                                note to programmer: please follow 100% front end style, including the list style in fckeditor.
                                               <p class="text-blue margin-top-10px border-bottom">You can add content by clicking the text below.</p>
                                               <div onblur="return div_val1(this.id)" id="announcement_content<?php echo $data->id;?>" contenteditable="true">
                                                   <?php echo $data->short_description;?> 
                                               </div>
                                               <textarea name="textarea_announcement_content" id="textarea_announcement_content<?php echo $data->id;?>" style="display:none;"><?php echo $data->short_description;?> </textarea>
                                               <!-- Info Resalt-->
                                              <div class="info_resalt border_bottom">
                                                  <div class="row-fluid">
                                                    <div class="col-lg-12">
                                                      <div>
                                                        <h2 class="red-title"><span>Announcement Info</span></h2>
                                                      </div>
                                                      <div onblur="return div_val1(this.id)"  id="reference_no<?php echo $data->id;?>" contenteditable="true">
                                                          <div class="alert alert-error">
                                                             <?php echo $data->reference_no;?> 
                                                          </div>
                                                      </div>
													  <textarea name="textarea_reference" id="textarea_reference_no<?php echo $data->id;?>" style="display:none;"><?php echo $data->reference_no;?> </textarea>
                                                    </div>      
                                                  </div>
                                                  
                                              </div>
                                              <!-- End Info Resalt-->
                                               
                                            </div>
                                          </div>
                                          <div class="form-actions">
                                            <div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                        {{ Form :: close()}} 
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--END MODAL edit announcement-->
                            <!--Modal delete start-->
                            <div id="modal-delete-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete Circular Listing? </h4>
                                  </div>
                                  <div class="modal-body">
                                     <p><strong>#{{$data->id}}:</strong> {{$data->title}}</p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> {{ Form::open(array('url' => 'admin/singledeleteinvestor', 'method' => 'post', 'name' => 'delete'.$data->id, 'id' => 'delete'.$data->id, 'class' => 'form-horizontal','files' => true)) }}
									  {{ Form::hidden('dirid',$data->id) }} <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 
                                      {{ Form::close() }}</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!-- modal delete end -->
                           
                        </td>
                      </tr>
					  <?php
					  $i++;
					  } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="7"></td>
                      </tr>
                    </tfoot>
                  </table>
                   <div class="tool-footer text-right">
                   <p class="pull-left">Showing {{ $accountlisting->getFrom() }} to {{ $accountlisting->getTo() }} of {{ $accountlisting->getTotal() }} entries</p>
                    {{ $accountlisting->appends(Input::except('page'))->links() }}
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              
                      
                      
            </div>
          </div>
        </div>
 @stop