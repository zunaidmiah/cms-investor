@extends('layouts.admin')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    {{HTML::style('assets/vendors/bootstrap-datepicker/css/datepicker.css')}}
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
    <!--BEGIN PAGE WRAPPER-->
    <!--END CONTENT-->
    <!--Modal Add New Montage start-->
    <div id="page-wrapper">
    	
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Careers</h1>
          </div>
          

          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;<a href="{{url('career_vac_edit')}}">Job Vacancies - Listing</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Job Vacancies - Add New</li>
          </ol>
          </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->
    
    	<div class="page-content">
        	<div class="row">
            <div class="col-lg-12">
            	<h2>Add New Vacancy</h2>
                
            	<div class="portlet">
                	<div class="portlet-header">
                      <div class="caption">Page Content</div>
                      <br/>
                      <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                      <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                    </div>
        {{ Form::open(array('name'=>'addvaccancy','id'=>'addvaccancy','url' => 'addvaccancy',"method" => "post", "class"=>"form-horizontal")) }}
        {{ Form::hidden('job_responsibilities') }}
        {{ Form::hidden('job_requirements') }}
        {{ Form::hidden('job_footer_content') }}
        <!--<div class="modal-content">-->
            
            <!--<div class="modal-header">
                <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                <h4 id="modal-login-label2" class="modal-title">Add New Vacancy</h4>
            </div>-->
            <!--<div class="modal-body">-->
             <div class="portlet-body"> 
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
                                {{ Form::text('date', Input::old('date'), array('class' => 'form-control','placeholder' => 'Date','id'=>'career-vacancy-date'))}}

                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-md-3 control-label">Responsibilities_content <span
                                    class='require'>*</span></label>
                        <div class="col-md-9">
                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by
                                clicking the text section below.</p>
                            <div class="acc-body">
                                <div class="list list-style__arrow1">
                                    <ul>
                                        <div contenteditable="true" id="vacc-resp">
                                            <ul class="list icons">
                                                <li><i class="icon-ok"></i> Liaising and networking with customers,
                                                    suppliers and partner organisations.
                                                </li>
                                                <li><i class="icon-ok"></i> Communicating with target audiences and
                                                    managing customer relationship.
                                                </li>
                                                <li><i class="icon-ok"></i> Maintaining and updating customer databases.
                                                </li>
                                                <li><i class="icon-ok"></i> Contributing to and developing marketing
                                                    plans and strategies, and achieve performance target.
                                                </li>
                                                <li><i class="icon-ok"></i> Market research and competitor analysis.
                                                </li>
                                                <li><i class="icon-ok"></i> Focus on both business growth and customer
                                                    retention.
                                                </li>
                                                <li><i class="icon-ok"></i> Attend to customers queries and provide
                                                    quotation.
                                                </li>
                                                <li><i class="icon-ok"></i> Handle RFP activities and production of
                                                    tender submission material.
                                                </li>

                                            </ul>
                                        </div>
                                    </ul>
                                </div>
                                {{ Form::textarea('responsibilities_content','',array("id" => "textarea-vacc-resp","class" => "hideThisField")) }}

                            </div>
                            <!-- end acc body -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-md-3 control-label">Requirements <span
                                    class='require'>*</span></label>
                        <div class="col-md-9">
                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by
                                clicking the text section below.</p>
                            <div class="acc-body">
                                <div class="list list-style__arrow1">

                                    <div contenteditable="true" id="vacc-req">
                                        <ul class="list icons">
                                            <li><i class="icon-ok"></i> Pocess own vehicle.</li>
                                            <li><i class="icon-ok"></i> Pleasant personality, easy going.</li>
                                            <li><i class="icon-ok"></i> Able to communicate in Bahasa Malaysia and
                                                English.
                                            </li>
                                            <li><i class="icon-ok"></i> Able to use Microsoft Excel, Words and
                                                Powerpoint.
                                            </li>
                                            <li><i class="icon-ok"></i> Able to work after office hour occasionally.
                                            </li>
                                            <li><i class="icon-ok"></i> Having experience in telco industry will be
                                                advantageous.
                                            </li>
                                            <li><i class="icon-ok"></i> Qualification: Diploma.</li>
                                        </ul>
                                    </div>

                                </div>
                                {{ Form::textarea('requirements_content','',array("id" => "textarea-vacc-req","class" => "hideThisField")) }}
                            </div>
                            <!-- end acc body -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                        <div class="col-md-9">
                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by
                                clicking the text section below.</p>
                            <div class="acc-body">
                                <div class="list list-style__arrow1">
                                    <div contenteditable="true" id="vacc-footer">
                                        <p>Whether you are an experienced professional looking to elevate your career to
                                            greater heights or a fresh graduate ready to fast track your career; we
                                            invite you to join our team.</p>
                                        <p>For those who are ready to explore a new career path and grow with us as a
                                            team, please email your resume to <a href="mailto:fareast@fareh.po.my">fareast@fareh.po.my</a>.
                                        </p>
                                    </div>
                                    {{ Form::textarea('footer_content','',array("id" => "textarea-vacc-footer","class" => "hideThisField")) }}
                                </div>
                            </div>
                            <!-- end acc body -->
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
                            <!--<a href="#" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i
                                        class="glyphicon glyphicon-ban-circle"></i></a>-->
                                        <a href="{{ URL::to('/career_vac_edit') }}" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>


                        </div>
                    </div>


                </div>
                </div><!-- end portlet body -->
            <!--</div>--><!-- end modal body -->
        <!--</div>--><!-- end modal content-->
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
        <div class="copyright"><span class="text-15px">2014 &copy; <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a
                        href="mailto:support@webqom.com">Webqom Support</a>.</span>
            <div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies">
            </div>
        </div>
    </div>
    </div>

    <!--END FOOTER-->
    {{HTML::script('/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
    {{HTML::script('/assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}


    <script>var dump_file = "savecontents";</script>
@stop