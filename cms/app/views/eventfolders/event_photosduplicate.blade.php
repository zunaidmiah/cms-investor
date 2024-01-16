@extends('layouts.admin')
@section('content')

    <!--BEGIN PAGE WRAPPER-->

	
    <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->

        <div class="page-header-breadcrumb">
            <div class="page-heading hidden-xs">
                <h1 class="page-title">Company Bulletin, CSR &amp; Training</h1>
            </div>

            <ol class="breadcrumb page-breadcrumb">
                <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
                <li><a href="{{url('news_events_list')}}">Company Bulletin, CSR &amp; Training Listing</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
                <li class="active">Company Bulletin, CSR &amp; Training - Photos</li>
            </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->

        <div class="page-content">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Company Bulletin, CSR &amp; Training <i class="fa fa-angle-right"></i> Photos</h2>
                    <div class="clearfix"></div>
                    @if (Session::has('message'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                            <i class="fa fa-check-circle"></i> {{ Session::get('message') }}
                        </div>
                    @endif
                    @if (Session::has('error_message'))
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                            <i class="fa fa-times-circle"></i> <strong>Error!</strong>
                            <p>{{ Session::get('error_message') }}</p>
                        </div>
                    @endif
                    <div class="pull-left margin-top-10px"> Last updated: <span class="text-blue">{{$last_updated}}</span> </div>
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
                                <h1>Company Bulletin, CSR &amp; Training</h1>
                            </div>
                        </div>
                    </div>
                    
                    <div class="portlet">
                        <div class="portlet-header">
                            <div class="caption">Company Bulletin, CSR &amp; Training Photo Listing</div>
                            <br/>
                            <p class="margin-top-10px"></p>
                            <a href="#" data-target="#modal-add-event-folder" data-toggle="modal" class="btn btn-success">Add New Photos &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary">Delete</button>
                                <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="#" data-target="" onclick="event_select_box()" data-toggle="modal">Delete selected item(s)</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                                </ul>
                            </div>
                     
                            <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    
                            <!--Modal Add New start-->
                            <div id="modal-add-event-folder" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog modal-wide-width">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label2" class="modal-title">Add New Event Photo</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form">
                                                <form class="form-horizontal" method="post"  action="{{URL::to('upload_event_photos')}}" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Photo Caption </label>
                                                        <div class="col-md-6">
                                                            {{ Form::text('event_caption','',array('id' => 'inputContent','class' => 'form-control', 'placeholder' => 'Name','rows'=>2 )) }} 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Upload Event Photo <span class='require'>*</span></label>
                                                        <div class="col-md-9">
                                                            <div class="text-15px margin-top-10px">
                                                                <input id="picture" multiple type="file" name="file[]" required />
                                                                <br/>
                                                                <span class="help-block">(Image dimension: 600 x 400 pixels, JPEG/GIF/PNG only, Max. 2MB) </span> 
                                                            </div>
                                                            <input type="hidden" name="id" value="{{$id}}">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--END MODAL Add New-->

                            <!--Modal delete selected items start-->
                            <div id="modal-delete-selected" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                            <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete the selected item(s)? </h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>2014 Chinese New Year Celebration</p>
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
                                                <form id="del_all" action="{{URL::to('del_all_photos')}}" method="post">                                                
                                                    <div class="col-md-offset-4 col-md-8"> 
                                                        {{ Form::button(
                                                            'Yes &nbsp;<i class="fa fa-check"></i>',
                                                            array(
                                                            'class'=>'btn btn-red',
                                                            'type'=>'submit'
                                                            ))
                                                        }}
                                                        &nbsp; 
                                                        <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;
                                                        <i class="fa fa-times-circle"></i></a> 
                                                    </div>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal delete all items end -->
                        </div>
                        <div class="portlet-body">
                            @if($cntarray1 != 0 )
                                <div class="form-inline pull-left">
                                    <div class="form-group">
                                        {{ Form::open(array('url' => Request::url(),'class'=> 'form-horizontal','method' => 'get')) }}
                                        {{ Form::select('noperpage1', $cntarray1, Input::get('noperpage1'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
                                        {{ Form::close() }}
                                        &nbsp;
                                        <label class="control-label">Records per page</label>
                                    </div>
                                </div>
                            @endif
                            <p class="pull-right">Showing {{ $eventfolders->getFrom() }} to {{ $eventfolders->getTo() }} of {{ $eventfolders->getTotal() }} entries   </p>
                            <div class="clearfix"></div>
                            <div class="row">
                                <form id="delete_selected" action="{{URL::to('del_selected_photos')}}" method="post">
                                    @foreach($eventfolders as $key => $value)
                                    <div class="col-lg-4">
                                        <div class="panel panel-primary">
                                            <input type="hidden" name="id" value="{{$id}}">
                                            <div class="panel-heading pan">  <img src="{{ URL::asset('uploads/newsevent/'.$value->file) }}" style="width:400px; max-height:350px;" alt="Event Image" class="img-responsive"> </div>
                                            <p>{{$value->eventcaption}}</p>
                                            <div class="panel-footer text-center">
                                            <input type="checkbox" name="check_box[]" value="{{ $value->id }}"/>
                                            <a href="{{URL::to('news_events_details/'.$value->id)}}">{{$value->eventtittle}}</a>
                                            <div class="clearfix"></div>
                                            <a class="fancybox" rel="group" href="{{ URL::asset('uploads/newsevent/'.$value->file) }}" data-hover="tooltip" data-placement="top" title="View Photo">
                                            <span class="label label-sm label-yellow"><i class="fa fa-search"></i></span></a>
                                            <a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-event-folder-{{$value->id}}" data-toggle="modal" title="Edit Event Photo"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a>
                                            <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$value->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </form>
                            </div>
                            
                            <!--Modal Edit event start-->
                            @foreach($eventfolders as $key => $value)
                                {{ Form::open(array('url' => 'update_photo/'.$value->id,"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
                                <div id="modal-edit-event-folder-{{ $value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog modal-wide-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label2" class="modal-title">Edit Event Photo</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" >
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Photo Caption </label>
                                                        <div class="col-md-6">
                                                            {{ Form::text('event_caption',$value->eventcaption,array('id' => 'name','class' => 'form-control', 'placeholder' => 'Enter event caption' )) }}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Upload Photo <span class='require'>*</span></label>
                                                        <div class="col-md-9">
                                                            <div class="text-15px margin-top-10px">
                                                                <img src="{{ URL::asset('uploads/newsevent/'.$value->file) }}" hieght='300' width='200' alt="Event Image" class="img-responsive">
                                                                <?php if($value->file!=null) {  ?>
                                                                    <input type="file" name="file">
                                                                <?php } else {  ?>
                                                                <input type="file" name="file" required>
                                                                <?php } ?>

                                                                <br/>
                                                                <span class="help-block">(Image dimension: 600 x 400 pixels, JPEG/GIF/PNG only, Max. 2MB) </span> 
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <div class="col-md-offset-5 col-md-8">
                                                            {{ Form::button(
                                                                'Update &nbsp;<i class="fa fa-floppy-o"></i>',
                                                                array(
                                                                    'class'=>'btn btn-red',
                                                                    'type'=>'submit'))
                                                            }}
                                                            &nbsp;<a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{ Form::close() }}
                            @endforeach
                            <!--END MODAL Edit Event--> 
                        </div>

                        <!--Modal delete start-->
                        @foreach($eventfolders as $key => $value)
                            {{ Form::open(array('url' => 'del_photo/'.$value->id,"method" => "post","class"=>"form-horizontal")) }}
                                <div id="modal-delete-{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                                <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Delete notification </h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do You really want to delete this image? </p>
                                                <div class="form-actions">
                                                    <div class="col-md-offset-4 col-md-8">
                                                        {{ Form::button(
                                                            'Yes &nbsp;<i class="fa fa-check"></i>&nbsp;',
                                                            array(
                                                                'class'=>'btn btn-red',
                                                                'type'=>'submit'))
                                                        }}
                                                        &nbsp;<a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        @endforeach
                        <!-- modal delete end -->
                  
                        <!--Modal Edit event start-->
                        <div id="modal-edit-event-folder-2" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label2" class="modal-title">Edit Event Folder</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Event Title <span class='require'>*</span></label>
                                                    <div class="col-md-9">
                                                        <textarea name="inputContent" rows="2" class="form-control" id="inputContent" placeholder="Event Title">2013 Christmas Celebration</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Event Date </label>
                                                    <div class="col-md-5">
                                                        <div class="input-group">
                                                            <input type="text" class="datepicker-default form-control" data-date-format="dd/mm/yyyy" placeholder="dd/mm/yyyy" value=""/>
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Upload Event Cover <span class='require'>*</span></label>
                                                    <div class="col-md-9">
                                                        <div class="text-15px margin-top-10px"> <img src="../img/news_events/img_xmas2013.jpg" alt="2013 Christmas Celebration" class="img-responsive"><br/>
                                                            <input id="exampleInputFile1" type="file"/>
                                                            <br/>
                                                            <span class="help-block">(Image dimension: 600 x 400 pixels, JPEG/GIF/PNG only, Max. 2MB) </span> 
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
                        <!--END MODAL Edit Event-->

                        <!--Modal delete start-->
                        <div id="modal-delete-2" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                        <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this event folder? </h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>2013 Christmas Celebration</p>
                                        <div class="form-actions">
                                            <div class="col-md-offset-4 col-md-8"> <a href="#" class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal delete end -->

                        <div class="tool-footer text-right">
                            {{$eventfolders->links()}}
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
                        <div class="page-footer">
                            <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                                <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                            </div>
                        </div>
                    </div>
                </div>
              <!-- end portlet -->
            </div>
        </div>
    </div>
  <!--END PAGE WRAPPER-->
@stop

@section('scripts')
<script>
  function event_select_box(){
    var check=confirm('Delete All the selected Items');
    if(check){
      $('#delete_selected').submit();
    }
  }

</script>

{{HTML::style('fancybox/jquery.fancybox.css')}}
{{HTML::script('fancybox/jquery.fancybox.js')}}
{{HTML::script('fancybox/jquery.fancybox.pack.js')}}



<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();
  });
</script>
@stop