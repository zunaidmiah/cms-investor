@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="/css/datepicker3.css">

<script type="text/javascript" src="/bootstrap-datepicker.js"></script>
  <script>
  $(function() {
    $( "#career-vacancy-date" ).datepicker();
  });
  </script>
<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Careers</h1>
          </div>
          
          <!-- InstanceBeginEditable name="EditRegion1" -->
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Job Vacancies - Listing</li>
          </ol>
          <!-- InstanceEndEditable --></div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Job Vacancies <i class="fa fa-angle-right"></i> Listing</h2>
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
              <div class="pull-left"> Last updated: <span class="text-blue">{{$last_updated}}</span> </div>
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
                    <h1>Careers</h1>
                  </div>
                </div>
              </div>
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Content</div>
                  <br/>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  <div contenteditable="true">
                    <h2 class="red-title">Job Vacancy</h2>
                  </div>
                </div>
              </div>
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Job Vacancies Listing</div>
                  <br/>
                  <p class="margin-top-10px"></p>
                  <a href="{{ URL::to('add_vacancy_view') }}"  data-toggle="modal" class="btn btn-success">Add New &nbsp;<i class="fa fa-plus"></i></a>&nbsp;
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="vacancy_selected_form()">Delete</button>
                    <button type="button" data-toggle="dropdown" class="btn btn-red dropdown-toggle"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="#" data-target="" onclick="vacancy_selected_form()" data-toggle="modal">Delete selected item(s)</a></li>
                      <li class="divider"></li>
                      <li><a href="#" data-target="#modal-delete-all" data-toggle="modal">Delete all</a></li>
                    </ul>
                  </div>
                   
<div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                  <!--Modal Add New start-->
                 {{ Form::open(array('name'=>'job_vac_edit_form','id'=>'job_vac_edit_form','url' => 'Add_Vacancy',"method" => "post", "onsubmit" => "return escapeinput()", "class"=>"form-horizontal")) }}
                 {{ Form::hidden('job_responsibilities') }}
                 {{ Form::hidden('job_requirements') }}
                 {{ Form::hidden('job_footer_content') }}
                 <div id="modal-add-director" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                    <div class="modal-dialog modal-wide-width">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                          <h4 id="modal-login-label2" class="modal-title">Add New Vacancy</h4>
                        </div>
                        <div class="modal-body">
                          <div class="form">
                            
                              <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-9">
                                  <div data-on="success" data-off="primary" class="make-switch">
                                    
                                    {{ Form::checkbox('status', '1','yes');}}
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Job Title <span class='require'>*</span></label>
                                <div class="col-md-9">
                                    {{ Form::textarea('job_title', Input::old('job_title'), array('class' => 'form-control','placeholder' => 'Job Title','rows'=>'4'))}}
                                  
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-3 control-label">Date</label>
                                <div class="col-md-5">
                                  <div class="input-group">
                                      {{ Form::text('date', Input::old('date'), array('class' => 'form-control','placeholder' => 'Date'))}}
                                   
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Responsibilities <span class='require'>*</span></label>
                                <div class="col-md-9"> note to programmer: please follow 100% front end style, including the list style in below fckeditor.
                                  {{ Form::textarea('Responsibilities', Input::old('Responsibilities'), array('class' => 'form-control','placeholder' => 'Responsibilities','rows'=>'4'))}}
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Requirements <span class='require'>*</span></label>
                                <div class="col-md-9"> note to programmer: please follow 100% front end style, including the list style in below fckeditor.
                                 {{ Form::textarea('Requirements', Input::old('Requirements'), array('class' => 'form-control','placeholder' => 'Requirements','rows'=>'4'))}}
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                                <div class="col-md-9">
                                  <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                  <div contenteditable="true">
                                    <p>Whether you are an experienced professional looking to elevate your career to greater heights or a fresh graduate ready to fast track your career; we invite you to join our team.</p>
                                    <p>For those who are ready to explore a new career path and grow with us as a team, please email your resume to <a href="mailto:hrm@myock.com">hrm@myock.com</a>.</p>
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
                            {{ Form::close() }}
                              
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
                          <p><strong>#1:</strong> Business Development Executive</p>
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
                    <form id="form_id" action="{{URL::to('vacancy_set_pag')}}" method="post">
                        <select name="select" onchange="this.form.submit()" class="form-control">
                          
                          <option 
                      @if(Session::get('vacancy_paginate') == '5')
                      selected = "selected"
                      @endif
                      >5</option>
                      
                      <option
                      @if(Session::get('vacancy_paginate') == '10')
                      selected = "selected"
                      @endif
                      >10</option>
                      
                      <option
                      @if(Session::get('vacancy_paginate') == '15')
                      selected = "selected"
                      @endif
                      >15</option>
                      
                      <option
                      @if(Session::get('vacancy_paginate') == '20')
                      selected = "selected"
                      @endif
                      >20</option>
                      <option
                      @if(Session::get('vacancy_paginate') == '40')
                      selected = "selected"
                      @endif
                      >40</option>
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
                        <th width="1%"><input type="checkbox"/></th>
                        <th>#</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Job Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                       <form id="vacancy_selected_form" action="{{URL::to('vacancy_selected_del')}}" method="post">
                     @foreach ($careers as $career)   
                      <tr>
                        <td><input type="checkbox" name="checkbox[]" value="{{$career->id}}"/></td>
                        <td>{{$career->id}}</td>
                        
                        <td>
	                          @if($career->status == 1) 
	                          <span class="label label-sm  label-success ">Active</span>
	                          @else
	                          <span class="label label-sm  label-danger ">InActive</span>
	                        @endif
                        </td>
                        <td>{{$career->date}}</td>
                        <td>{{$career->jobtitle}}</td>
                        <td><a href="edit_career/{{$career->id}}" data-hover="tooltip" data-placement="top"  title="Edit"><span class="label label-sm label-success"><i class="fa fa-pencil"></i></span></a> <a href="#" data-hover="tooltip" data-placement="top" title="Delete" data-target="#modal-delete-{{$career->id}}" data-toggle="modal"><span class="label label-sm label-red"><i class="fa fa-trash-o"></i></span></a>
                          
                        </td>
                      </tr>
                      @endforeach 
                    </form>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="6"></td>
                      </tr>
                    </tfoot>
                  </table>
                  <div class="tool-footer text-right">
                    <p class="pull-left">Showing {{$start}} to {{$end}} of {{$count}} entries</p>
                    {{$careers->links()}}
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
                	<div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
        </div>
    <!--END FOOTER--></div>
<!--END PAGE WRAPPER-->
  <!--Modal Edit vacancy start-->
   @foreach ($careers as $career)          
            
                            <div id="modal-edit-{{$career->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog modal-wide-width">
                              
                                </div>
                              </div>
                          </div>
             
             @endforeach
                          <!--END MODAL Edit vacancy-->
                            <!--Modal delete start-->
                            @foreach ($careers as $career)          
            {{ Form::open(array('url' => 'deletevecancy/'.$career->id,"method" => "post","class"=>"form-horizontal")) }}
                            <div id="modal-delete-{{$career->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-login-label" aria-hidden="true" class="modal fade">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label3" class="modal-title"><a href=""><i class="fa fa-exclamation-triangle"></i></a> Are you sure you want to delete this vacancy? </h4>
                                  </div>
                                  <div class="modal-body">
                                    <p><strong>#1:</strong> Are You sure Delete Vacancy</p>
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
@stop

@section('scripts')
  <script>
    function vacancy_selected_form(){
      var check=confirm('All the selected Items will be deleted');
      if(check){
        $('#vacancy_selected_form').submit();
      }

    }
  </script>
  <script>
      	function escapeinput(){
      		var job_text = $('input[name="job_responsibilities"]').val();
      		var job_requirements_text = $('input[name="job_requirements"]').val();
      		var job_footer_text = $('input[name="job_footer_text"]').val();
      		$('input[name="job_responsibilities"]').val(encodeURIComponent(job_text));
      		$('input[name="job_requirements"]').val(encodeURIComponent(job_requirements_text));
      		$('input[name="job_footer_text"]').val(encodeURIComponent(job_footer_text));
      		return true;
      	}
      </script>
 @stop 