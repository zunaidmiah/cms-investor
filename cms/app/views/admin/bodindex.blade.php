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
            <li class="active">Board of Directors - Edit</li>
          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Board of Directors <i class="fa fa-angle-right"></i> Edit</h2>
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
              
              <div class="pull-left"> Last updated: <span class="text-blue">

              {{ date("d F Y",strtotime($lastUpdated)) }} @ {{ date("g:i A",strtotime($lastUpdated)) }}

              </span> </div>
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
                  <div contenteditable="true" id="body">
                   <h1>Board of Directors</h1>
                  </div>
                  
                </div>
              </div>
              
              
              
              <!-- End portlet-->
              
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Board of Directors Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="#" data-target="#modal-add-director" data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                      <li><a href="#" data-target="#modal-delete-selectednot" data-toggle="modal" class="deleteid" rel="{{url();}}/bod/deleteselected" rev="modal-delete-selected">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
          <div class="tools"> 
                    <i class="fa fa-chevron-up"></i> 
                  </div>
                 <!--Modal Add New director start-->
                  <div id="modal-add-director" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New BOD</h4>
                        </div>
                        <div class="modal-body">
                        <div id="msgadd"></div>
                          <div class="form">
                            {{ Form::open(array('name'=>'bod_add_form','id'=>'bod_add_form','url' => 'bod',"method" => "post","files"=>true,"class"=>"form-horizontal")) }}
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
                                <h2 class="red-title">Title of Bod</h2>
                                </div>
                                 {{ Form::textarea('bod_name', null, ['id'=>'textarea-name','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                    {{Form::text('bod_date','',array('id'=>'date','class' => 'datepicker-default form-control validate[required]','data-date-format' => 'mm/dd/yyyy', 'placeholder' => 'mm/dd/yyyy'))}}
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
                                   <div contenteditable="true" id="pos">
                                              <h5>Senior Independent Non-Executive Chairman (Appointed on 3 January 2013)</h5>
                                            </div>
                                            {{ Form::textarea('bod_position', null, ['id'=>'textarea-pos','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                            <div contenteditable="true" id="age">
                                              <p class="lead">Malaysian, aged 66</p>
                                            </div>
                                            {{ Form::textarea('country_age', null, ['id'=>'textarea-age','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                            <div contenteditable="true" id="des">
                                              <p>Dato' Syed Norulzaman bin Syed Kamarulzaman is our Senior Independent Non-Executive Chairman. Dato' Syed Norulzaman holds a Bachelor of Arts (Honours) Degree from University Malaya.</p>
                                              <p>Upon graduation from University Malaya, Dato' Syed Norulzaman joined the Malaysian Administrative and Diplomatic Service in 1973 and was assigned to the Ministry of Foreign Affairs. He served in different capacities in the ministry's political and administration divisions as well as in Malaysia's diplomatic mission in Geneva, Baghdad, Ottawa and Jakarta. In September 1994, Dato' Syed Norulzaman was appointed as Malaysia's ambassador to Spain where he served for three (3) years. On returning to Kuala Lumpur in November 1997, he assumed the post of Undersecretary for East-Asia and South-Asia at the Ministry of Foreign Affairs, prior to his appointment to the Institute of Diplomacy and Foreign Relations under the Prime Minister's Department as its Director General in 1999. He returned to the Ministry of Foreign Affairs in November 2001 before his appointment as Malaysia's ambassador to Thailand, a position he held until January 2005. He was subsequently appointed as Malaysia's ambassador to China, based in Beijing where he served for five (5) years till December 2009 before returning to Malaysia to retire from government service.</p>
                                              <p>Upon his return to Malaysia, Dato' Syed Norulzaman was appointed as the Public Interest Director at the Federation of Investment Managers Malaysia (FIMM), a position he held until August 2012. He is currently a Director of Winnburner Asia Sd. Bhd. Dato' Syed Norulzaman is also the Chairman of Mah Sing Foundation, a charitable organization providing assistance to the needy within the community.</p>
                                              <p>He is the Chairman of the Audit Committee, Nomination Committee and Remuneration Committee of the company, respectively.</p>
                                            </div>
                                            {{ Form::textarea('bod_description', null, ['id'=>'textarea-des','size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Upload BOD Image <span class='require'>*</span></label>
                                <div class="col-md-9">
                                  <div class="text-15px margin-top-10px">
                                   {{ Form::file('bod_image', ['class' => 'validate[required]']);}}
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
                                                    'id' => 'btnadd',
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
                  <!--END MODAL Add New director-->


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

                          {{ Form::open(array('url' => 'bod/deleteall', 'method' => 'post', 'name' => 'deleteallsementra', 'id' => 'deleteallsementra', 'class' => 'form-horizontal','files' => true)) }}

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

                     <?php $k= $bods->getFrom();?>
                    
                    @foreach ($bods as $bod)
                      <tr>
                         <td><input type="checkbox" class="chkNumber" name="del[]" value="{{$bod->id}}"/></td>
                        <td>{{$k}}</td>
                         <td><span class="label label-sm @if($bod->status == 1) label-success @else label-danger @endif">@if($bod->status == 1) Active @else Inactive @endif</span></td>

                        <td>{{ date("d M, Y",strtotime($bod->bod_date)) }}</td>
                        <td>{{ strip_tags($bod->bod_name) }}</td>
                        <input type="hidden" id="updateOrdermname" value="bod" />
                        <td><input id="{{$bod->id}}" type="text" class="form-control display_order disod" value="{{$bod->display_order }}" orderval="{{$bod->display_order }}"></td>
                        <td><a href="#" data-hover="tooltip" data-placement="top" data-target="#modal-edit-director-{{$bod->id}}" data-toggle="modal" title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$bod->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                            <!--Modal Edit director start-->
                            <div id="modal-edit-director-{{$bod->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Edit BOD</h4>
                                  </div>
                                  <div class="modal-body">
                                  <div id="msgupd{{$bod->id}}"></div>
                                    <div class="form">
                                       {{ Form::open(array('url' => '/director/update', 'method' => 'post', 'class' => 'form-horizontal','files' => true)) }} 
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Status</label>
                                          <div class="col-md-9">
                                            <div data-on="success" data-off="primary" class="make-switch">
                                               {{Form::hidden('status',0)}}
              {{Form::checkbox('status',1,$bod->status,array('id'=>'status','class' => 'form-control'))}}
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Name <span class='require'>*</span></label>
                                          <div class="col-md-9"> 
                                           <div contenteditable="true" id="name-{{$bod->id}}">
                                           {{ $bod->bod_name }}
                                </div>
                                 {{ Form::textarea('bod_name', $bod->bod_name, ['id'=>'textarea-name-'.$bod->id,'size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                                          <div class="col-md-5">
                                            <div class="input-group">
                                              {{Form::text('bod_date',$bod->bod_date,array('id'=>'date','class' => 'datepicker-default form-control','data-date-format' => 'mm/dd/yyyy', 'placeholder' => 'mm/dd/yyyy'))}}
                                              <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Display Order <span class='require'>*</span></label>
                                            <div class="col-md-2">
                                              <input id="{{$bod->id }}" type="text" name="display_order" class="form-control ddr" placeholder="1" value="{{$bod->display_order }}" >
                                            </div>
                                            <div class="col-md-9 pull-right"> <span class="help-block">Display order is to determine the item appearing sequence in the website.</span> </div>
                                        </div>	
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Content</label>
                                          <div class="col-md-9">
                                          	<div contenteditable="true" id="pos-{{$bod->id}}">
                                             {{$bod->bod_position}}
                                            </div>
                                            {{ Form::textarea('bod_position', $bod->bod_position, ['id'=>'textarea-pos-'.$bod->id,'size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                            <div contenteditable="true" id="age-{{$bod->id}}">
                                              {{ $bod->country_age }}
                                            </div>
                                            {{ Form::textarea('country_age', $bod->country_age, ['id'=>'textarea-age-'.$bod->id,'size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                            <div contenteditable="true" id="des-{{$bod->id}}">
                                              {{ $bod->bod_description }}
                                            </div>
                                            {{ Form::textarea('bod_description', $bod->bod_description, ['id'=>'textarea-des-'.$bod->id,'size' => '0x3', 'class' => 'form-control validate[required] hideThisField']) }}
                                            <!-- end content editable-->
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Upload BOD Image <span class='require'>*</span></label>
                                            <div class="col-md-9">
                                              <div class="text-15px margin-top-10px"> <img src='{{ asset("uploads/bods/$bod->bod_image")}}' alt="Dato' Syed Norulzama bin Syed Kamarulzaman" class="img-responsive"><br/>
                                                  <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-bod-image-{{$bod->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                                                  <div class="clearfix"></div>
                                                  <br/>
                                                  {{ Form::file('bod_image', ['class' => 'validate[required]']);}}
                                                  <br/> 
                                                  <span class="help-block">(JPEG/GIF/PNG only, Max. 1MB) </span> </div>
                                            </div>
                                          </div>
                                           {{ Form::hidden('id',$bod->id) }}
                                        <div class="form-actions">
                                          <div class="col-md-offset-5 col-md-8"> 

                                          {{ Form::button(
                                                'Save &nbsp;<i class="fa fa-floppy-o"></i>&nbsp;',
                                                array(
                                                    'class'=>'btn btn-red',
                                                    'id' =>'btnedit'.$bod->id,
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
                          <!--END MODAL Edit director-->
                          <!--Modal delete bod image start-->
                          {{ Form::open(array('url' => 'deletebodimage/'.$bod->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-bod-image-{{$bod->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this BOD image? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><img src='{{ asset("uploads/bods/$bod->bod_image")}}' alt="Dato' Syed Norulzama bin Syed Kamarulzaman" class="img-responsive"></p>
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
                          <!-- modal delete bod image end -->
                          
                            <!--Modal delete start-->
                            {{ Form::open(array('url' => 'deletebod/'.$bod->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-{{$bod->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this director? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#{{$k}}:</strong> {{$bod->bod_name}}</p>
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

                    Showing {{ $bods->getFrom() }} to {{ $bods->getTo() }} of {{ $bods->getTotal() }} entries</p>
                    {{ $bods->appends(array('noperpage1' => $noperpage1))->links() }}
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

$("#bod_add_form").validationEngine();

//delay function
$('.disod').on('keyup',function () {
    var searchValue = $(this).val();


    var bodId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorder')}}",
          
          data: { orderValue: orderValue , bodId:bodId},
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


    var bodId = $(this).attr('id');
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorder')}}",
          
          data: { orderValue: orderValue , bodId:bodId},
          success: function(data){
                                      //$('.updateOrder i').removeClass('fa-spin');
                                      data= $.trim(data);

             console.log(data);
             if(data=='trr')
             {
                $('#msgupd'+bodId+'').empty();
                $('#btnedit'+bodId+'').attr('disabled', false);
             }else{

              $('#btnedit'+bodId+'').attr('disabled', true);
              var ms='<div class="alert alert-danger alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Warning!</strong><p>Order Number Already Taken</p></div>';

                                      $('#msgupd'+bodId+'').append(ms);

             }
                                      

                                      },
          failure: function(errMsg) {
            
                }

  });

       
    },1000);
});


$('#display_order').on('keyup',function () {
    
    var orderValue = $(this).val();

    setTimeout(function(){
  $.ajax({

    type: "POST",
                   url: "{{ url('/admin/checkorderall')}}",
          
          data: { orderValue: orderValue },
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
          $.ajax({
                   type: "POST",
                   url: "{{ url('/admin/updateorder')}}",
				  // The key needs to match your method's input parameter (case-sensitive).
				  data: { OrderData: jsonPost , model:Model},
				  success: function(data){
                                      $('.updateOrder i').removeClass('fa-spin');
                                      
var ms='<div class="alert alert-success alert-dismissable"><button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><i class="fa fa-check-circle"></i> <strong>Success!</strong><p>Updated Successfully</p></div>';

                                      $('#msgapp').append(ms);
                                      },
				  failure: function(errMsg) {
					  
                }
          });
    });


</script>


@stop
