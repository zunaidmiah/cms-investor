@extends('layouts.admin')
@section('content')
  <!--<div class="page-content">-->
  

 
  <script type="text/javascript">



function MyFunction(){
  var count = $("input.chkNumber:checked").length;
  
  if(count>0)
  {
    $('#modal-delete-selected').modal('show');
	  var checkedValues = $('input.chkNumber:checked').map(function() {
	    return this.value;
	  }).get().join(',');

	  $('#deletemultiple input[name=deleteid]').val(checkedValues);
  }
  else 
  {
    $('#modal-not-selected').modal('show');
  }
}


function getAllChecked(){
  var count = $("input.chkNumber:checked").length;
}

</script>
          <div class="row">
            <div class="col-lg-12">
              <h2>Announcements Links <i class="fa fa-angle-right"></i> Listing</h2>
              <div class="clearfix"></div>
              
               <div class="pull-left margin-top-10px">
              	Last updated: <span class="text-blue">{{$last_updated}}</span>
              </div>
              
             
              <div class="clearfix"></div>
              <p></p>
                {{ Form::open(array('url' => 'admin/page/savepage','class'=> 'form-horizontal','method' => 'post','name' => 'corporategeneral','id' => 'corporategeneral')) }} 
		            {{ Form::hidden('preview','') }}
                {{ Form::hidden('pageid',$page[0]->id) }}
                {{ Form::hidden('type',$page[0]->type) }}

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
       		  
              <div class="portlet">	
              	<div class="portlet-header">
                     <div class="caption">Page Content</div>
                     <div class="tools">
                        <i class="fa fa-chevron-up"></i>
                     </div>
                 </div>
                 
                <div class="portlet-body"> 
                 
           <div class="info_white1 border_bottom">

              <h2 class="red-title pull-left"><span>Type of Announcements / News</span></h2>
              <div class="clearfix"></div>
              <?php
                foreach($announcementtypelisting as $types){
              ?>
            
            <h5 class="margin_top_10px"><?php echo $types->Title;?></h5>
            <?php
              foreach($types->names as $ann)
              {
              ?>
                <div class="col-md-6">
                   <ul class="list icons">
                    	  <li><i class="icon-ok"></i> <a href="<?php echo $ann->announcementurl; ?>"><?php echo $ann->announcementname; ?></a></li>
                    </ul> 	
                </div>
               <?php
              }
              ?>
                
              <div class="clearfix"></div>
     
              <?php
                 } 
              ?>  
                   
            </div>
                </div>
                <!-- End portlet body -->
         
                  
              </div>
              <!-- End portlet -->

    <div class="form-actions none-bg"> <a href="javascript:void(0);" class="btn btn-red" onclick="Addsavepage('corporategeneral','');">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <button type="submit" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></button>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
					  
					  {{Form :: close()}}
                      
                <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Bursa Announcements Link Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-link" data-toggle="modal" class="btn btn-success">Add New Link &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" onclick="MyFunction();return false;">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
				  <div class="tools"> 
                  	<i class="fa fa-chevron-up"></i> 
                  </div>
                  <!--Modal Add New announcement start-->
                  <div id="modal-add-link" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Announcement Link</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                          {{ Form::open(array('url' => 'admin/newscenter/saveannouncementlink','class'=> 'form-horizontal','method' => 'post','files' => true, 'onsubmit' => 'fillRefernce();')) }}
                            
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                  {{Form::checkbox('status', 1 ,array('id'=>'active','class' => 'form-control'))}}
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Announcement Name <span class='require'>*</span></label>
                                <div class="col-md-6">
                                {{ Form::text('announcementname','',array('id' => 'announcementName','class' => 'form-control', 'placeholder' => 'Name','rows'=>2 )) }} 
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-md-3 control-label">Announcement URL <span class='require'>*</span></label>
                                <div class="col-md-6">
                                  <div class="input-icon"><i class="fa fa-link"></i>
                                  {{ Form::text('announcementurl','',array('id' => 'announcementURL','class' => 'form-control', 'placeholder' => 'http://','rows'=>2 )) }} 
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                              	 <label class="col-md-3 control-label">Type of Announcement <span class='require'>*</span></label>
                                 <div class="col-md-6">
                                      
                                      {{ Form::select('announcementtype', array(
                                    '-  Please select -' => '-  Please select -',
                                    'Investor Alert' => 'Investor Alert',
                                    'Additional Listing Announcement' => 'Additional Listing Announcement',
                                    'Listing Circulars' => 'Listing Circulars',
                                    'Financial Results' => 'Financial Results',
                                    'General Announcement' => 'General Announcement',
                                    'Trading of Rights Announcement' => 'Trading of Rights Announcement',
                                    'General Meetings' => 'General Meetings',
                                    'Special Announcements' => 'Special Announcements',
                                    'Changes in Directors Interest (S135)' => 'Changes in Directors Interest (S135)',
                                    'Changes in Substantial Shareholders Interest (29B)' => 'Changes in Substantial Shareholders Interest (29B)',
                                    'Notice of Interest Substantial  Shareholder (29A)' => 'Notice of Interest Substantial  Shareholder (29A)',
                                    'Notice of Person Ceasing (29C)' => 'Notice of Person Ceasing (29C)',
                                    'Changes in Audit Committee' => ' Changes in Audit Committee',
                                    'Change in Boardroom' => 'Change in Boardroom',
                                    'Change in Chief Executive Officer' => 'Change in Chief Executive Officer',
                                    'Change in Principal Officer' => 'Change in Principal Officer', 
                                    'Change of Address' => 'Change of Address', 
                                    'Change of Company Secretary' => 'Change of Company Secretary', 
                                    'Change of Registrar' => 'Change of Registrar', 
                                    'Notice of Resale/Cancellation of Treasury Share - Immediate Announcement' => 'Notice of Resale/Cancellation of Treasury Share - Immediate Announcement', 
                                    'Notice of Shares Buy Back - Immediate Announcement' => 'Notice of Shares Buy Back - Immediate Announcement', 
                                    'Notice of Shares Buy back by a Company Pursuant to Form 28A' => 'Notice of Shares Buy back by a Company Pursuant to Form 28A', 
                                    'Notice of Shares Buy back by a Company Pursuant to Form 28B' => 'Notice of Shares Buy back by a Company Pursuant to Form 28B'
                                    ), null, ['id' => 'type', 'class' => 'form-control']) }}
                                  </div>
                             </div>

                             <div class="form-actions">
                                <div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                              {{Form :: close()}}
                            </div>
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
                              <div class="col-md-offset-4 col-md-8"> 
                                {{ Form::open(array('url' => 'admin/newscenter/deletemultiplelink', 'method' => 'post', 'name' => 'deletemultiple', 'id' => 'deletemultiple', 'class' => 'form-horizontal','onsubmit' => 'getAllChecked();')) }} 
                                  {{Form::hidden('deleteid')}} 
                                  <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; 
                                  <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 
                                  {{ Form::close() }} 
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>



                <!-- model popup for check box not selected -->

                <div id="modal-not-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-danger">
                             Please select at least one item to delete.
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
                            <!-- <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div> -->

                            {{ Form::open(array('url' => 'admin/newscenter/deleteallannouncementlinks', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }} 
                           		
                           		<button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; 
                           		<a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 
                           {{ Form::close() }} 

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- modal delete all items end -->
                
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
                        <th width="1%"><input type="checkbox" id="checkall"/></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Announcement Name</th>
                        <th>Type of Announcement</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $i=1;
                      foreach($linklisting as $data){
                    ?>

                      <tr>
                      <td><input type="checkbox" class="chkNumber case" value="{{$data->id}}"></td>
                        <td><?php echo $i; ?></td>
                        <td><?php  if($data->status==1){ ?><span class="label label-sm label-success">Active</span><?php }else{ ?><span class="label label-sm  btn-primary">Inactive</span> <?php } ?></td>
                        <td><?php echo $data->announcementname;?></td>
                        <td><?php echo $data->announcementtype;?></td>
                        <td>
                        <a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-announcement-link<?php echo $data->id;?>" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-<?php echo $data->id;?>" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                              <!--Modal edit announcement start-->
                              <div id="modal-edit-announcement-link<?php echo $data->id;?>" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                      <h4 id="modal-login-label2" class="modal-title">Edit Announcement</h4>
                                    </div>
                                    <div class="modal-body">
                                      <div class="form">
                                      {{ Form::open(array('url' => 'admin/newscenter/editannouncementlink','class'=> 'form-horizontal','method' => 'post','files' => true)) }}
                                        <form class="form-horizontal">
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-9">
                                              <div data-on="success" data-off="primary" class="make-switch">
                                              <?php 
                                                $opt =array('class' => 'form-control');
                                                if($data->status)
                                                  $opt['checked'] = 'checked';
                                                else
                                                  $opt['checked'] = '';
                                                ?>
                                                <input <?php if($data->status == 1) {?>checked <?php }?>name="status" type="checkbox" value="1">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Announcement Name <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                            {{ Form::text('announcementname',$data->announcementname,array('id' => 'name','class' => 'form-control', 'placeholder' => 'announcement name' )) }}
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Announcement URL <span class='require'>*</span></label>
                                            <div class="col-md-6">
                                              <div class="input-icon"><i class="fa fa-link"></i>
                                              {{ Form::text('announcementurl',$data->announcementurl,array('id' => 'url','class' => 'form-control', 'placeholder' => 'http://','rows'=>2 )) }} 
                                              </div>
                                            </div>
                                          </div>
            
                                          <div class="form-group">
                                             <label class="col-md-3 control-label">Type of Announcement <span class='require'>*</span></label>
                                             <div class="col-md-6">

                                             {{ Form::select('announcementtype', array(
                                              '-  Please select -' => '-  Please select -',
                                              'Investor Alert' => 'Investor Alert',
                                              'Additional Listing Announcement' => 'Additional Listing Announcement',
                                              'Listing Circulars' => 'Listing Circulars',
                                              'Financial Results' => 'Financial Results',
                                              'General Announcement' => 'General Announcement',
                                              'Trading of Rights Announcement' => 'Trading of Rights Announcement',
                                              'General Meetings' => 'General Meetings',
                                              'Special Announcements' => 'Special Announcements',
                                              'Changes in Directors Interest (S135)' => 'Changes in Directors Interest (S135)',
                                              'Changes in Substantial Shareholders Interest (29B)' => 'Changes in Substantial Shareholders Interest (29B)',
                                              'Notice of Interest Substantial  Shareholder (29A)' => 'Notice of Interest Substantial  Shareholder (29A)',
                                              'Notice of Person Ceasing (29C)' => 'Notice of Person Ceasing (29C)',
                                              'Changes in Audit Committee' => ' Changes in Audit Committee',
                                              'Change in Boardroom' => 'Change in Boardroom',
                                              'Change in Chief Executive Officer' => 'Change in Chief Executive Officer',
                                              'Change in Principal Officer' => 'Change in Principal Officer', 
                                              'Change of Address' => 'Change of Address', 
                                              'Change of Company Secretary' => 'Change of Company Secretary', 
                                              'Change of Registrar' => 'Change of Registrar', 
                                              'Notice of Resale/Cancellation of Treasury Share - Immediate Announcement' => 'Notice of Resale/Cancellation of Treasury Share - Immediate Announcement', 
                                              'Notice of Shares Buy Back - Immediate Announcement' => 'Notice of Shares Buy Back - Immediate Announcement', 
                                              'Notice of Shares Buy back by a Company Pursuant to Form 28A' => 'Notice of Shares Buy back by a Company Pursuant to Form 28A', 
                                              'Notice of Shares Buy back by a Company Pursuant to Form 28B' => 'Notice of Shares Buy back by a Company Pursuant to Form 28B'
                                              ), $data->announcementtype, ['id' => 'type', 'class' => 'form-control']) }}
                                                 
                                              </div>
            
                                            </div>
                                            {{Form::hidden('id',$data->id)}}
                                          <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8"> <button type="submit" class="btn btn-red">Save &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                          </div>
                                          {{ Form :: close()}} 
                                        </form>
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
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this announcement? </h4>
                                  </div>
                                  <div class="modal-body">
                                     <p><strong>#{{$data->id}}:</strong> {{$data->announcementname}}</p>
                                    <div class="form-actions">
                                      <div class="col-md-offset-4 col-md-8"> 
                                      {{ Form::open(array('url' => 'admin/newscenter/deletelink', 'method' => 'post', 'name' => 'delete'.$data->id, 'id' => 'delete'.$data->id, 'class' => 'form-horizontal','files' => true)) }}
									                    {{ Form::hidden('id',$data->id) }} <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> 
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
                   <p class="pull-left">Showing {{ $linklisting->getFrom() }} to {{ $linklisting->getTo() }} of {{ $linklisting->getTotal() }} entries</p>
                    {{ $linklisting->appends(Input::except('page'))->links() }}
                  </div>

                  <div class="clearfix"></div>
                </div>
              </div><!-- end portlet -->
              </div>  
            </div><!-- end col-lg-12-->
          <!-- </div> -->
          <!-- end row -->
        <!--</div>-->
@stop