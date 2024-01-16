@extends('layouts.admin')
@section('content')

<!--BEGIN PAGE WRAPPER-->
 <div id="page-wrapper">
     <!--BEGIN PAGE HEADER & BREADCRUMB-->

        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Index</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Index - Edit</li>
          </ol>
        </div>

        <!--END PAGE HEADER & BREADCRUMB-->
        <!--BEGIN CONTENT-->

        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Index <i class="fa fa-angle-right"></i> Edit</h2>
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

              <div class="pull-left"> Last updated: <span class="text-blue">{{ date("d F, Y @ h:i a",strtotime($page->updated_at)) }}</span> </div>
              <div class="clearfix"></div>
              <p></p>

              {{ Form::open(array('id'=>'index_page_edit', 'name'=>'index_page_edit','url' => 'save_page_contents',"method" => "post","class"=>"form-horizontal")) }}

              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Content</div>
                  <br/>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                <!-- Info title-->
                <div class="row-fluid info_title">
                    <div class="vertical_line">
                        <div class="circle_top"></div>
                    </div>
                  <div class="info_vertical">
                    <div class="col-lg-6">
                        <div class="row-fluid">
                          <div id="heading1" contenteditable="true">
                          	 <h2 class="red-title">{{$page->heading1}}</h2>
                          </div>
                          <div id="body1" contenteditable="true">
                          	{{$page->body1}}
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
                                <div  contenteditable="true">
                                	<h2 class="red-title2">{{$page->heading2}}</h2>
                                </div>
                                <div id="body2" contenteditable="true">
                                	{{$page->body2}}
                                </div>
                            </div>
                            <br/>
                            <!-- Step 1 -->
                            @foreach ($businesses_create as $Busi)
                              <div class="col-lg-3">
                                  <div class="thumbnail">
                                    <div class="caption-head">

                                          <a href="#" data-placement="top" data-target="#modal-edit-core-business-{{$Busi->id}}" data-toggle="modal" title="Edit">
                                              <em class="caption-icon {{$Busi->icon}} icon-big"></em>
                                              <h4 class="caption-title">{{$Busi->title}}</h4>
                                          </a>
                                    </div>
                                  </div>
                              </div>
                             @endforeach
                            <!-- Step 2 -->

                            <!-- Step 3 -->

                            <!-- Step 4 -->

                        </div>


                        <!--Modal edit core business 1 start-->

                        <!--END MODAL edit core business 1-->

                              <!--Modal edit core business 2 start-->

                              <!--END MODAL edit core business 2-->

                              <!--Modal edit core business 3 start-->

                              <!--END MODAL edit core business 3-->

                              <!--Modal edit core business 4 start-->

                              <!--END MODAL edit core business 4-->
                              <div class="clearfix"></div>

                </div>
                <!-- End Info Resalt-->



                </div>
                <!-- end portlet body-->
              </div>
              <!-- End portlet-->
                {{ Form::hidden('heading1') }}
                {{ Form::hidden('body1') }}
                {{ Form::hidden('heading2') }}
                {{ Form::hidden('body2') }}
                <div class="form-actions none-bg">
                    {{ Form::button(
                                   'Save &amp; Publish&nbsp;<i class="fa fa-globe"></i>',
                                   array(
                                  'class'=>'btn btn-blue',
                                  'type'=>'submit'))
                        }}
                    <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                </div>
              {{ Form::close() }}

              @foreach ($businesses_create as $Busi)
                <div id="modal-edit-core-business-{{$Busi->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                  <div class="modal-dialog modal-wide-width">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                        <h4 id="modal-login-label2" class="modal-title">Edit Core Business</h4>
                      </div>
                      <div class="modal-body">
                       {{ Form::open(array('url' => 'businesses_update/'.$Busi->id,"method" => "post","class"=>"form-horizontal")) }}
                        <div class="form">
                          <form class="form-horizontal">

                            <div class="form-group">
                              <label class="col-md-3 control-label">Icon <span class='require'>*</span></label>
                              <div class="col-md-6">

                                {{ Form::text('icon', $Busi->icon, array('placeholder' => 'Icon','class'=>'form-control',"id"=>"inputContent",'required')) }}
                                <div class="help-block">Please refer here for more <a href="{{ URL::to('adminpages/icons') }}" target="_blank">icon options.</a></div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="col-md-3 control-label">Title <span class='require'>*</span></label>
                              <div class="col-md-6">
                                  {{ Form::textarea('title', $Busi->title, array('class'=>'form-control',"rows"=>'2')) }}

                              </div>
                            </div>

                            <div class="form-group">
                              <label class="col-md-3 control-label">Website URL </label>
                              <div class="col-md-6">
                                <div class="input-icon"><i class="fa fa-link"></i>
                                    {{ Form::text('url', $Busi->url, array('placeholder' => 'http:','class'=>'form-control')) }}


                                </div>
                              </div>

                            </div>

                            <div class="form-actions">
                              <div class="col-md-offset-5 col-md-8">
                                   {{ Form::button(
                                                            'Save &nbsp;<i class="fa fa-check"></i>&nbsp;',
                                                            array(
                                                                'class'=>'btn btn-red',
                                                                'type'=>'submit'))
                                                        }}
                                                        <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>

                              </div>
                            </div>
                          </form>
                        </div>
                       {{ Form::close() }}
                      </div>
                    </div>
                  </div>
                </div>
               @endforeach

               <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Montage Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="{{ URL::to('Add_Montages') }}" data-target="" data-toggle="modal" class="btn btn-success">Add New Montage &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selected" data-toggle="modal" class="deleteid" rel="{{URL::to('montage_del_id')}}" rev="modal-delete-selected">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
				  <div class="tools">
                  	<i class="fa fa-chevron-up"></i>
                  </div>

                  <!--Modal delete selected items start-->
		  <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                        </div>
                        <div class="modal-body">
                          <!--<p>2014 Chinese New Year Celebration</p>-->
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
                    <form id="set_page" action="{{URL::to('set_page')}}" method="post">
                      <select name="id" onchange="this.form.submit()" id="on_change" class="form-control">
                         <option value="5">5</option>
                             
                        <option value="10">10</option>
                       
                        <option value="50">50</option>
                        <option value="100">100</option>
                      </select>
                      </form>                      
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
                        <th width="1%"><input type="checkbox" class="maincheckbox" /></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    <form id="del_id" action="{{URL::to('montage_del_id')}}" method="post" >
                       <?php $i = $incr; ?> @foreach ($montages as $montage)
                      <tr>
                        <td><input type="checkbox" name="del[]" value="{{$montage->id}}" class="subcheckbox" /></td>
                        <td>{{$i + 1}}</td>
                        <td><span class="label label-sm @if($montage->status == 1) label-success @else label-danger @endif">@if($montage->status == 1) Active @else Inactive @endif</span></td>
                        <td>{{$montage->title}}</td>
                        <td>
                            <a href="edit_montages/{{$montage->id}}" data-hover="tooltip" data-placement="top"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                            <a href="deletemontage/{{$montage->id}}" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$montage->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                        </td>
                      </tr>
                      <?php $i++; ?>
                       @endforeach

                       </form>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="5"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">Showing {{$start}} to {{$end}} of {{$total}} entries</p>

                    {{$montages->links()}}
                    <!-- <ul class="pagination pagination mtm mbm">
                      <li class="disabled"><a href="#">&laquo;</a></li>
                      <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                        </ul> -->
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


<!--Modal delete start-->
@foreach ($montages as $montage)
   {{ Form::open(array('url' => 'deletemontage/'.$montage->id,"method" => "post","class"=>"form-horizontal")) }}
    <div id="modal-delete-{{$montage->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                     <div class="modal-dialog">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                           <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this banner? </h4>
                         </div>
                         <div class="modal-body">
                           <p>{{$montage->title}}</p>
                           <div class="form-actions">

                             <div class="col-md-offset-4 col-md-8">
                                 {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}
                                 &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                           </div>
                         </div>
                       </div>
                     </div>
                 </div>
   {{ Form::close() }}
 @endforeach
<!-- modal delete end -->



<script>var dump_file="savecontents";</script> 


@stop

@section('scripts')
<script>
  

    function submit_form(){
      var  check = confirm('Delete All the selected Items');
      if(check){
        $('#del_id').submit();        
      }


    }

<?php if (Session::has('per_page')) { ?>

console.log("<?php echo Session::get('per_page') ?>");
$("#on_change").val("<?php echo Session::get('per_page') ?>");

<?php } ?>

$('.deleteid').click(function () {
       var page = $(this).attr('rel');
       var idloc = $(this).attr('rev');
       if ($('.subcheckbox:checked').length) {
          var chkId = '';
          $('.subcheckbox:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
        //  alert(chkId);
        $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="del[]" value="'+chkId+'"><div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div></form>') 
        }
        else {
          $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-12"> <div class="alert alert-danger">Please select at least one item to delete.</div> </div></form>') 
         
        }
       
      
    });
     
</script>


@stop
