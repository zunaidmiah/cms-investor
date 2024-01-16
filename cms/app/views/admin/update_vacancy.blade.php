@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    {{ HTML::script('js/content-editing-save.js');}}
    <script>
        $(function () {
            $("#career-vacancy-date").datepicker();
        });
    </script>

    <style type="text/css">
        textarea.hideThisField {
            visibility: hidden !important;
            height: 0px;
            width: 0px;
        }
    </style>

    {{ Form::open(array('name'=>'job_vac_edit_form','id'=>'job_vac_edit_form','url' => 'update_career/'.$career->id,"method" => "post","class"=>"form-horizontal")) }}

    <div id="page-wrapper">
    	
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Careers</h1>
          </div>
          

          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;<a href="{{url('career_vac_edit')}}">Job Vacancies - Listing</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Job Vacancies - Edit</li>
          </ol>
          </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
        
        <div class="page-content">
        	<div class="row">
            <div class="col-lg-12">
            	<h2>Edit Vacancy</h2>
                
            	<div class="portlet">
                	<div class="portlet-header">
                      <div class="caption">Page Content</div>
                      <br/>
                      <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
    	
        <!--<div class="modal-content">-->
            <!--<div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label2" class="modal-title">Edit Vacancy</h4>
            </div>-->
            <!--<div class="modal-body">-->

                <!--<form class="form-horizontal">-->
                <div class="portlet-body">    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Status</label>
                        <div class="col-md-9">
                            <div data-on="success" data-off="primary" class="make-switch">
                                @if($career->status == 1) <?php $checked = true ?> @else <?php  $checked = false ?> @endif
                                {{ Form::checkbox('status', '1',$checked);}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Job Title <span class='require'>*</span></label>
                        <div class="col-md-9">
                            {{ Form::textarea('job_title', $career->jobtitle, array('placeholder' => 'Title','class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Date <span class='require'>*</span></label>
                        <div class="col-md-5">
                            <div class="input-group">

                                {{ Form::text('date', $career->date, array('placeholder' => 'Title','class'=>'form-control','id'=>'career-vacancy-date')) }}
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

            <div class="form-group">
                <label for="inputContent" class="col-md-3 control-label">Responsibilities_content <span class='require'>*</span></label>
                <div class="col-md-9">
                    <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking
                        the text section below.</p>
                    <div class="acc-body">
                        <div class="list list-style__arrow1">
                            <ul>
                                <div contenteditable="true" id="vacc-resp">
                                    {{ $career->responsibilities }}
                                </div>
                            </ul>
                        </div>
                        {{ Form::textarea('responsibilities_content',$career->responsibilities,array("id" => "textarea-vacc-resp","class" => "hideThisField")) }}

                    </div>
                    <!-- end acc body -->
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-md-3 control-label">Requirements <span
                            class='require'>*</span></label>
                <div class="col-md-9">
                    <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking
                        the text section below.</p>
                    <div class="acc-body">
                        <div class="list list-style__arrow1">

                            <div contenteditable="true" id="vacc-req">
                                {{ $career->requirements }}
                            </div>

                        </div>
                        {{ Form::textarea('requirements_content',$career->requirements,array("id" => "textarea-vacc-req","class" => "hideThisField")) }}
                    </div>
                    <!-- end acc body -->
                </div>
            </div>
            <div class="form-group">
                <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                <div class="col-md-9">
                    <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking
                        the text section below.</p>
                    <div class="acc-body">
                        <div class="list list-style__arrow1">
                            <div contenteditable="true" id="vacc-footer">
                                {{ $career->footertext }}
                            </div>
                            {{ Form::textarea('footer_content',$career->footertext,array("id" => "textarea-vacc-footer","class" => "hideThisField")) }}
                        </div>
                    </div>
                    <!-- end acc body -->
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
                    &nbsp;<a href="{{URL::to('career_vac_edit')}}" data-dismiss="modal" class="btn btn-green">Cancel
                        &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>

                </div>
            </div>
            </div><!-- end portlet body -->
            {{ Form::close() }}

        </div><!-- end portlet -->
            </div><!-- end col-lg-12-->
            </div><!-- end row -->
        </div><!-- end page content -->


    <!--END MODAL Add New Montage-->
    <!--Modal delete start-->

    <!-- modal delete end -->
    <!--BEGIN PAGE HEADER & BREADCRUMB-->






    <!--BEGIN FOOTER-->
    <div class="page-footer">
        <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a
                        href="mailto:support@webqom.com">Webqom Support</a>.</span>
            <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies">
            </div>
        </div>
    </div>
    </div>
    <!--END FOOTER-->



    <script>var dump_file = "{{URL::to('savevacancy/'.$career->id)}}";


    </script>

@stop