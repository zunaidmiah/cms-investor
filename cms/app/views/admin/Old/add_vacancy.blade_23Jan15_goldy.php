@extends('layouts.admin') 
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>  
    {{ HTML::script('js/content-editing-save.js');}}
  {{HTML::style('assets/vendors/bootstrap-datepicker/css/datepicker.css')}} 


  <script>
  $(function() {
    $( "#career-vacancy-date" ).datepicker();
  });
  </script>
<style type="text/css">
 textarea.hideThisField {
  visibility:hidden !important;
  height: 0px;
  width: 0px;
}
</style>
<!--BEGIN PAGE WRAPPER-->
<!--END CONTENT-->
         <!--Modal Add New Montage start-->
     <div id="page-wrapper">
  {{ Form::open(array('url' => 'addvaccancy','class'=> 'form-horizontal','enctype' => 'application/x-www-form-urlencoded','method' => 'post','name' => 'job_vac_add_form','id' => 'job_vac_add_form')) }}
 
    
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
                                      {{ Form::text('date', Input::old('date'), array('class' => 'form-control','placeholder' => 'Date','id'=>'career-vacancy-date'))}}
                                   
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                               <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Responsibilities <span class='require'>*</span></label>
                                <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                  <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
					
                                  
                                       {{ Form::textarea('job_responsibilities','',array("id" => "textarea-job_responsibilities","class" => "form-control")) }}

                                </div>
                              </div>
                               <div class="form-group">
                                          <label for="inputContent" class="col-md-3 control-label">Requirements <span class='require'>*</span></label>
                                          <div class="col-md-9"> note to programmer: the below list style, pls follow 100% css style in front end with icons.
                                            <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                            
                                            {{ Form::textarea('job_requirements','',array("id" => "textarea-job_requirements","class" => "form-control")) }}

                                          </div>
                                        </div>
                             <div class="form-group">
                                <label for="inputContent" class="col-md-3 control-label">Footer Content</label>
                                <div class="col-md-9">
                                  <p class="text-blue text-12px margin-top-15px border-bottom">You can edit the content by clicking the text section below.</p>
                                  
                                   {{ Form::textarea('job_footer_content','',array("id" => "textarea-job_footer_content","class" => "form-control")) }}
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
                           
                              
                          </div>
                        </div>
                      </div>
                       {{ Form::close() }}
                      </div>
                    
         <!--END MODAL Add New Montage-->
         <!--Modal delete start-->
        
         <!-- modal delete end -->
<!--BEGIN PAGE HEADER & BREADCRUMB-->
       
      
          
         
            <!--BEGIN FOOTER-->
            <div class="page-footer">
                <div class="copyright"><span class="text-15px">2014 &copy; <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
            </div>
    <!--END FOOTER--></div>
   {{HTML::script('/assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js')}}
  {{HTML::script('/assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}} 


<script>var dump_file="savecontents";</script>
@stop