@extends('layouts.admin')
@section('content')
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
   <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#career-vacancy-date" ).datepicker();
  });
  </script>
{{ Form::open(array('name'=>'job_vac_edit_form','id'=>'job_vac_edit_form','url' => 'update_career/'.$career->id,"method" => "post","class"=>"form-horizontal")) }}

     <div id="page-wrapper">
              <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                                    <h4 id="modal-login-label2" class="modal-title">Edit Vacancy</h4>
                                  </div>
                                  <div class="modal-body">

                                      <form class="form-horizontal">
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
                                          <label for="inputContent" class="col-md-3 control-label">Responsibilities <span class='require'>*</span></label>
                                          <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>

                                               
						{{ Form::textarea('job_responsibilites', $career->responsibilities , ['class' => 'form-control']) }}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Requirements <span class='require'>*</span></label>
                                          <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            
                                            {{ Form::textarea('job_requirements', $career->requirements , ['class' => 'form-control']) }}
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                                          <div class="col-md-9">
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            
                                            {{ Form::textarea('job_footer_content', $career->footertext , ['class' => 'form-control']) }}
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
                                                        &nbsp;<a href="{{URL::to('career_vac_edit')}}" data-dismiss="modal" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a>

                                               </div>
                                        </div>
                                      {{ Form::close() }}
                                    
                                  </div>

                      </div>

         <!--END MODAL Add New Montage-->
         <!--Modal delete start-->

         <!-- modal delete end -->
<!--BEGIN PAGE HEADER & BREADCRUMB-->






            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>



<script>var dump_file="{{URL::to('savevacancy/'.$career->id)}}";

</script>

@stop