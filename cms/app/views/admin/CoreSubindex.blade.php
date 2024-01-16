@extends('layouts.admin')
@section('content')
<style type="text/css">
 textarea.hideThisField {
  visibility:hidden !important;
  height: 0px;
  width: 0px;
}
</style>
<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
         <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">CMS Pages</h1>
          </div>
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li><i class="fa fa-home"></i>&nbsp;Core Business&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active"> {{ strip_tags($page->heading2) }} - Edit</li>
          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2> {{ strip_tags($page->heading2) }} <i class="fa fa-angle-right"></i> Edit</h2>
              <div class="clearfix"></div>

              @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
              <div id="msgapp">
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
              </div>
              
              <div class="pull-left"> Last updated: <span class="text-blue">{{ date("d F Y",strtotime($page->updated_at)) }} @ {{ date("g:i A",strtotime($page->updated_at)) }}</span> </div>
              <div class="clearfix"></div>
              <p></p>
              {{ Form::open(array('url' => 'update_core','class'=> 'form-horizontal','method' => 'post','name' => 'update_core_heading1', 'onsubmit' => 'coreheading1Submit()')) }}
                {{Form::hidden('preview','')}}
                {{Form::hidden('id',$page->id)}}
                {{Form::hidden('type',$page->type)}}
                {{Form::hidden('content','heading1')}}

                <div class="portlet">
                    <div class="portlet-header">
                        <div class="caption">Page Short Message</div>
                            <br/>
                            <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="info_heading">
                            <div contenteditable="true" id="left-block-heading1" style="overflow: hidden;">
                                {{ $page->heading1 }}
                            </div>
                            {{ Form::textarea('heading1',$page->heading1,array("id" => "textarea-left-block-heading1","class" => "hideThisField")) }}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                  <div class=" col-md-8"> 

                  {{ Form::button(
                                  'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                  array(
                                      'class'=>'btn btn-red',
                                     
                                      'type'=>'submit'))
                              }}

                  &nbsp; 
                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                </div>
             {{ Form::close() }}

             {{ Form::open(array('url' => 'update_core','class'=> 'form-horizontal','method' => 'post','name' => 'update_core_heading2', 'onsubmit' => 'coreheading2Submit()')) }}
                {{Form::hidden('preview','')}}
                {{Form::hidden('id',$page->id)}}
                {{Form::hidden('content','heading2')}}
                {{Form::hidden('type',$page->type)}}

                <div class="portlet">
                    <div class="portlet-header">
                        <div class="caption">Page Title</div>
                            <br/>
                            <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="info_heading">
                                             
                          <div contenteditable="true" id="left-heading2-content" style="overflow: hidden;">{{ $page->heading2 }}</div>
                          {{ Form::textarea('heading2',$page->heading2,array("id" => "textarea-left-heading2-content","class" => "hideThisField")) }}
                          <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                  <div class=" col-md-8"> 

                  {{ Form::button(
                                  'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                  array(
                                      'class'=>'btn btn-red',
                                     
                                      'type'=>'submit'))
                              }}

                  &nbsp; 
                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                </div>
             {{ Form::close() }}

             {{ Form::open(array('url' => 'update_core','class'=> 'form-horizontal','method' => 'post','name' => 'update_core_body2', 'onsubmit' => 'corebody2Submit()')) }}
                {{Form::hidden('preview','')}}
                {{Form::hidden('id',$page->id)}}
                {{Form::hidden('content','body2')}}
                {{Form::hidden('type',$page->type)}}

                <div class="portlet">
                    <div class="portlet-header">
                        <div class="caption">Page Description</div>
                            <br/>
                            <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                        <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
                    <div class="portlet-body">
                        <div class="info_heading">
                          <div contenteditable="true" id="left-body2-content" style="overflow: hidden;">
                            {{ $page->body2 }}
                           </div>
                          {{ Form::textarea('body2',$page->body2 ,array("id" => "textarea-left-body2-content","class" => "hideThisField")) }}
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                  <div class=" col-md-8"> 

                  {{ Form::button(
                                  'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                  array(
                                      'class'=>'btn btn-red',
                                     
                                      'type'=>'submit'))
                              }}

                  &nbsp; 
                  <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                </div>
             {{ Form::close() }}
              
              <!-- End portlet-->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">   {{ strip_tags($page->heading2) }}    Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-core-sub" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selectednot" data-toggle="modal" class="deleteid" rel="{{url();}}/CoreSub/deleteselected" rev="modal-delete-selected">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
          <div class="tools"> 
                    <i class="fa fa-chevron-up"></i> 
                  </div>
                 <!--Modal Add New core-sub start-->
                  <div id="modal-add-core-sub" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New CoreSub</h4>
                        </div>
                        <div class="modal-body">
                        <div id="msgadd"></div>
                          <div class="form">
                            {{ Form::open(array('name'=>'add_form','id'=>'add_form','url' => 'CoreSub',"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
                              {{Form::hidden('type',$page->type)}}
                              <div class="form-group">
                                  <label class="col-md-3 control-label">Status</label>
                                  <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    {{ Form::checkbox('status', '1',true);}}
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Name <span class='require'>*</span></label>
                                <div class="col-md-9">
                                <div contenteditable="true" id="name">
                                <h2 class="red-title">Title of CoreSub</h2>
                                </div>
                                 {{ Form::textarea('name', null, ['id'=>'textarea-name','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                    {{Form::text('date','',array('class' => 'datepicker-default form-control validate[required]','data-date-format' => 'mm/dd/yyyy', 'placeholder' => 'mm/dd/yyyy'))}}
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Display Order <span class='require'>*</span></label>
                                <div class="col-md-2">
                                   {{ Form::text('display_order','',array('id' => 'display_order','class' => 'form-control validate[required]', 'placeholder' => '' )) }} 
                                </div>
                                <div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Content</label>
                                <div class="col-md-9"> 
                                  
                                            <div contenteditable="true" id="des">
                                              <p>Dato' Syed Norulzaman bin Syed Kamarulzaman is our Senior Independent Non-Executive Chairman. Dato' Syed Norulzaman holds a Bachelor of Arts (Honours) Degree from University Malaya.</p>
                                            </div>
                                            {{ Form::textarea('description', null, ['id'=>'textarea-des','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Enable Explore More Button</label>
                                <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                      {{ Form::checkbox('morestatus', '1');}}


                                  </div>
                                  <div class="clearfix"></div>

                                  <div class="input-icon margin-top-10px"><i class="fa fa-link"></i>
                                     {{ Form::text('url', Input::old('url'), array('class' => 'form-control','placeholder' => 'http://'))}}
                                  </div>
                                </div>


                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload CoreSub Image <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                   {{ Form::file('image', ['class' => 'validate[required]']);}}
                                    <br/>
                                    <span class="help-block">(Image dimension: 300 x 500 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload CoreSub Image A <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                   {{ Form::file('imagea', ['class' => 'validate[required]']);}}
                                    <br/>
                                    <span class="help-block">(Image dimension: 300 x 500 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload CoreSub Image B <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                   {{ Form::file('imageb', ['class' => 'validate[required]']);}}
                                    <br/>
                                    <span class="help-block">(Image dimension: 300 x 500 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <div class="col-md-offset-5 col-md-8"> 

                                {{ Form::button(
                                                'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                                array(
                                                    'class'=>'btn btn-red',
                                                   
                                                    'type'=>'submit'))
                                            }}

                                &nbsp; 
                                <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                              </div>
                           {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--END MODAL Add New core-sub-->


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
                            <div class="col-md-offset-4 col-md-8"> <a href="#"  class="btn btn-red">Yes &nbsp;<i class="fa fa-check"></i></a>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
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

                          {{ Form::open(array('url' => 'CoreSub/deleteall', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }}
                          {{Form::hidden('type',$page->type)}}

                            <div class="col-md-offset-4 col-md-8"> 


                           

                            {{ Form::button(
                                                'Yes &nbsp;<i class="fa fa-check"></i>',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'type'=>'submit'))
                                            }}



                            <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="fa fa-times-circle"></i></a> </div>
                             {{ Form::close() }} 
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
         
        
                      &nbsp;
                      <label class="control-label">Records per page</label>
                       @endif
                    </div>
                  </div>
                  <div class="pull-right"> <a class="btn btn-danger updateOrder" href="javascript:void(0);">Update Display Order &nbsp;<i class="fa fa-refresh"></i></a> </div>
                  <div class="clearfix"></div>
                  <br/>
                  <br/>
                  <table class="table table-hover table-striped">
                    <thead>
                      <tr>
                        <th width="1%"><input type="checkbox" class="wholecheck"/></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th width="12%">Display Order</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php $k= $CoreSubs->getFrom();?>
                    
                    @foreach ($CoreSubs as $CoreSub)
                      <tr>
                         <td><input type="checkbox" class="chkNumber" name="del[]" value="{{$CoreSub->id}}"/></td>
                        <td>{{$k}}</td>
                         <td><span class="label label-sm @if($CoreSub->status == 1) label-success @else label-danger @endif">@if($CoreSub->status == 1) Active @else Inactive @endif</span></td>

                        <td>{{ date("d M, Y",strtotime($CoreSub->date)) }}</td>
                        <td>{{ strip_tags($CoreSub->name) }}</td>
                        <input type="hidden" id="updateOrdermname" value="CoreSub" />
                        <td><input id="{{$CoreSub->id }}" type="text" class="form-control display_order disod" value="{{$CoreSub->display_order }}" orderval="{{$CoreSub->display_order }}"></td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-core-sub-{{$CoreSub->id}}" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$CoreSub->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            <!--Modal Edit core-sub start-->
                            <div id="modal-edit-core-sub-{{$CoreSub->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Edit CoreSub</h4>
                                  </div>
                                  <div class="modal-body">
                                  <div id="msgupd{{$CoreSub->id}}"></div>
                                    <div class="form">
                                       {{ Form::open(array('url' => '/core-sub/updatecore', 'method' => 'post', 'class' => 'form-horizontal','files' => true)) }} 
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Status</label>
                                          <div class="col-md-9">
                                            <div data-on="success" data-off="primary" class="make-switch">
                                               {{Form::hidden('status',0)}}
              {{Form::checkbox('status',1,$CoreSub->status,array('class' => 'form-control'))}}
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Name <span class='require'>*</span></label>
                                          <div class="col-md-9"> 
                                           <div contenteditable="true" id="name-{{$CoreSub->id}}">
                                           {{ $CoreSub->name }}
                                </div>
                                 {{ Form::textarea('name', $CoreSub->name, ['id'=>'textarea-name-'.$CoreSub->id,'size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                          <div class="col-md-5">
                                            <div class="input-group">
                                              {{Form::text('date',$CoreSub->date,array('class' => 'datepicker-default form-control','data-date-format' => 'mm/dd/yyyy', 'placeholder' => 'mm/dd/yyyy'))}}
                                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Display Order <span class='require'>*</span></label>
                                            <div class="col-md-2">
                                              <input id="{{$CoreSub->id }}" type="text" name="display_order" class="form-control ddr" placeholder="1" value="{{$CoreSub->display_order }}" >
                                            </div>
                                            <div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
                                        </div>	
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Content</label>
                                          <div class="col-md-9">
                                            <div contenteditable="true" id="des-{{$CoreSub->id}}">
                                              {{ $CoreSub->description }}
                                            </div>
                                            {{ Form::textarea('description', $CoreSub->description, ['id'=>'textarea-des-'.$CoreSub->id, 'class' => 'form-control validate[required] hideThisField']) }}
                                            <!-- end content editable-->
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Enable Explore More Button</label>
                                          <div class="col-md-9">
                                            <div data-on="success" data-off="primary" class="make-switch">
                                              @if($CoreSub->morestatus == 1) <?php $checked = true ?> @else <?php  $checked = false ?> @endif
                                              {{ Form::checkbox('morestatus', '1', $checked);}}
                                              
                                           </div>
                                            <div class="clearfix"></div>
          
                                            <div class="input-icon margin-top-10px"><i class="fa fa-link"></i>
                                               {{ Form::text('url', $CoreSub->url, array('class' => 'form-control','placeholder' => 'http://'))}}
                                            </div>
                                          </div>
          
          
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Upload CoreSub Image <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                              <div class="text-15px margin-top-10px"> <img src='{{ asset("uploads/CoreSubs/$CoreSub->image")}}' alt="" class="img-responsive"><br/>
                                                  {{-- <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-CoreSub-image-{{$CoreSub->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> --}}
                                                  <div class="clearfix"></div>
                                                  <br/>
                                                  {{ Form::file('image', ['class' => 'validate[required]']);}}
                                                  <br/> 
                                                  <span class="help-block">(JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Upload CoreSub Image A <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                              <div class="text-15px margin-top-10px"> <img src='{{ asset("uploads/CoreSubs/$CoreSub->imagea")}}' alt="" class="img-responsive"><br/>
                                                {{-- <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-CoreSub-image-{{$CoreSub->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> --}}
                                                <div class="clearfix"></div>
                                                <br/>
                                                {{ Form::file('imagea', ['class' => 'validate[required]']);}}
                                                <br/>
                                                <span class="help-block">(Image dimension: 300 x 500 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="col-md-3 control-label">Upload CoreSub Image B <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                              <div class="text-15px margin-top-10px"> <img src='{{ asset("uploads/CoreSubs/$CoreSub->imageb")}}' alt="" class="img-responsive"><br/>
                                                {{-- <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-CoreSub-image-{{$CoreSub->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a> --}}
                                                <div class="clearfix"></div>
                                                <br/>
                                               {{ Form::file('imageb', ['class' => 'validate[required]']);}}
                                                <br/>
                                                <span class="help-block">(Image dimension: 300 x 500 pixels, JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                            </div>
                                          </div>
                                           {{ Form::hidden('id',$CoreSub->id) }}
                                        <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8"> 

                                          {{ Form::button(
                                                'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                                array(
                                                    'class'=>'btn btn-red',
                                                     
                                                    'type'=>'submit'))
                                            }}

                                          &nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
                                        </div>
                                       {{Form::close()}}
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <!--END MODAL Edit core-sub-->
                          <!--Modal delete CoreSub image start-->
                          {{ Form::open(array('url' => 'deleteCoreSubimage/'.$CoreSub->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-CoreSub-image-{{$CoreSub->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this CoreSub image? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><img src='{{ asset("uploads/CoreSubs/$CoreSub->image")}}' alt="Dato' Syed Norulzama bin Syed Kamarulzaman" class="img-responsive"></p>
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
                          <!-- modal delete CoreSub image end -->
                          
                            <!--Modal delete start-->
                            {{ Form::open(array('url' => 'deleteCoreSub/'.$CoreSub->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-{{$CoreSub->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this core-sub? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#{{$k}}:</strong> {{$CoreSub->name}}</p>
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
                          <!-- modal delete end -->
                           
                        </td>
                      </tr>
                      <?php $k++; ?>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="7"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">

                    Showing {{ $CoreSubs->getFrom() }} to {{ $CoreSubs->getTo() }} of {{ $CoreSubs->getTotal() }} entries</p>
                    {{ $CoreSubs->appends(array('noperpage1' => $noperpage1))->links() }}
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
@stop
@section('scripts')
<script>


  
 $('.deleteid').click(function () {
       var page = $(this).attr('rel');
       var idloc = $(this).attr('rev');
       if ($('.chkNumber:checked').length) {
          var chkId = '';
          $('.chkNumber:checked').each(function () {
            chkId += $(this).val() + ",";
          });
          chkId = chkId.slice(0, -1);
        //  alert(chkId);
        $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-offset-4 col-md-8"> <button type="submit" class="btn btn-red">Yes &nbsp;<i class="fa fa-floppy-o"></i></button>&nbsp; <a href="#" data-dismiss="modal" class="btn btn-green">No &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div></form>') 
        }
        else {
          $('#'+idloc+'').modal('show');
         $('#'+idloc+'').find('.form-actions').html('<form method="POST" action="'+page+'" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data"><input type="hidden" name="deleteid[]" value="'+chkId+'"><div class="col-md-12"> <div class="alert alert-danger">Please select at least one item to delete.</div> </div></form>') 
         
        }
       
      
    });

  $('.wholecheck').change(function () {
    if ($(this).prop('checked')) {
    $('.chkNumber').prop('checked', true);
    }
    else {
        $('.chkNumber').prop('checked', false);
    }
});
$('.wholecheck').trigger('change');

$("#add_form").validationEngine();

//delay function
$('.disod').on('keyup',function () {
    var searchValue = $(this).val();
    var type = "{{$page->type}}";



    var CoreSubId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkordercore')}}",
          
          data: { orderValue: orderValue , CoreSubId:CoreSubId, type:type},
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');
                                      data= $.trim(data);
             console.log(data);
             if(data=='trr')
             {
                $('#msgapp').empty();
                $('.updateOrder').attr('disabled', false);
             }else{

              $('.updateOrder').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgapp').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});




//delay function
$('.ddr').on('keyup',function () {

    var searchValue = $(this).val();
    var type = "{{$page->type}}";



    var CoreSubId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkordercore')}}",
          
          data: { orderValue: orderValue , CoreSubId:CoreSubId, type:type},
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');
                                      data= $.trim(data);
             console.log(data);
             if(data=='trr')
             {
                $('#msgupd'+CoreSubId+'').empty();
                $('#btnedit'+CoreSubId+'').attr('disabled', false);
             }else{

              $('#btnedit'+CoreSubId+'').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgupd'+CoreSubId+'').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});


$('#display_order').on('keyup',function () {
    
    var orderValue = $(this).val();
    var type = "{{$page->type}}";

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorderallcore')}}",
          
          data: { orderValue: orderValue, type:type },
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');
              data= $.trim(data);
             console.log(data);
             if(data=='trr')
             {
                $('#msgadd').empty();
                $('#btnadd').attr('disabled', false);
             }else{

              $('#btnadd').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgadd').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});












$('.updateOrder').click(function() {
    $('.updateOrder i').addClass('fa-spin');
   var Model = $('#updateOrdermname').val();
   var serData = '{';

   $('.display_order').each(function () {



    var $current = $(this);

    $('.display_order').each(function() {
        if ($(this).val() == $current.val() && $(this).attr('id') != $current.attr('id'))
        {
            alert('duplicate order number. please enter another order number.');
            throw new Error("Stopping the function!");
        }

    });
           
             serData += '"'+$(this).attr('id')+'":'+$(this).val()+',';
          });
          serData = serData.slice(0, -1);
          serData = serData+'}';
		  var jsonPost = serData;
      var type = "{{$page->type}}";

         $.ajax({
                   type: "POST",
                   url: "{{ url('/admin/updateordercs')}}",
				  // The key needs to match your method's input parameter (case-sensitive).
				  data: { OrderData: jsonPost , model:Model, type: type},
				  success: function(data){
                                      $('.updateOrder i').removeClass('fa-spin');
                                      
var ms='<div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Success!</strong><p>Updated Successfully</p></div>';

                                      $('#msgapp').append(ms);
                                      },
				  failure: function(errMsg) {
					  
                }
          });
    });
  
    function coreheading1Submit(){
       
       var text_content = $('#left-block-heading1-content').html();
       
      var content = $('#textarea-left-block-heading1-content').text(text_heading1);
    
     
  }
  function coreheading2Submit(){
       
      
       var text_content = $('#left-heading2-content').html();
    
      var content = $('#textarea-left-heading2-content').text(text_heading2);
      
  }
  function corebody2Submit(){
       
 
       var body2 = $('#left-body2-content').html();
        
      var body2 = $('#textarea-left-body2-content').text(body2);
     
  }
</script>


@stop

