@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="/css/datepicker3.css">
  <style type="text/css">
 textarea.hideThisField {
  visibility:hidden !important;
  height: 0px;
  width: 0px;
}
 .info_resalt .container {
	width: 970px;
}
</style>
<script type="text/javascript" src="/bootstrap-datepicker.js"></script>
  <script>
    
  </script>
<!--BEGIN PAGE WRAPPER-->
      <div id="page-wrapper"><!--BEGIN PAGE HEADER & BREADCRUMB-->
        
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Careers</h1>
          </div>
          

          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;<a href="{{url('dashboard')}}">Dashboard</a>&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Careers - Edit</li>
          </ol>
          </div>
        <!--END PAGE HEADER & BREADCRUMB--><!--BEGIN CONTENT-->

        <div class="page-content">
          <div class="row">
            <div class="col-lg-12">
              <h2>Careers <i class="fa fa-angle-right"></i> Edit</h2>
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

              <div class="pull-left"> Last updated: <span class="text-blue">{{ date("d F Y",strtotime($page->updated_at)) }} @ {{ date("g:i A",strtotime($page->updated_at)) }}</span> </div>
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
              {{ Form::open(array('url' => 'save_career','class'=> 'form-horizontal','method' => 'post','name' => 'corporategeneral','id' => 'corporategeneral', 'onsubmit' => 'careerSubmit()')) }}
               {{Form::hidden('preview','')}}
           {{Form::hidden('id',$page->id)}}
           {{Form::hidden('type',$page->type)}}
              <div class="portlet">
                <div class="portlet-header">
                  <div class="caption">Page Content</div>
                  <br/>
                  <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                  <div class="tools"> <i class="fa fa-chevron-up"></i> </div>
                </div>
                <div class="portlet-body">
                  <!-- Info white--> 
                         <div class="info_white1 border_bottom">
                                             
<div contenteditable="true" id="left-block1-content" style="overflow: hidden;">
                         {{ $page->body1 }}
 </div>
{{ Form::textarea('body1',$page->body1,array("id" => "textarea-left-block1-content","class" => "hideThisField")) }}
                              <div class="clearfix"></div>
                          </div>
                           <!-- End Info white --> 

                     <!-- Info Resalt-->
                          <div class="info_resalt">
    
                              <div class="col-lg-12">
 <div contenteditable="true" id="left-block2-content" style="overflow: hidden;">
                         {{ $page->body2 }}
                            </div>
               {{ Form::textarea('body2',$page->body2 ,array("id" => "textarea-left-block2-content","class" => "hideThisField")) }}
                               </div> 
                               
                                 
                                   
    						   <div class="clearfix"></div>
                          </div>
                          <!-- End Info Resalt-->
                </div>
              </div>
              <div class="form-actions none-bg"> <button type="submit" id="save_publish" class="btn btn-blue" >Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></button>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>
					  
					  {{Form :: close()}}
              
            </div>
          </div>
        </div>
        
        <!--END CONTENT-->
            
            <!--BEGIN FOOTER-->
<div class="page-footer">
                <div class="copyright"><span class="text-15px">2020 © <a href="http://www.webqom.com" target="_blank">Webqom Technologies Sdn Bhd.</a> Any queries, please contact <a href="mailto:support@webqom.com">Webqom Support</a>.</span>
                	<div class="pull-right"><img src="{{asset('assets/images/logo_webqom.png')}}" alt="Webqom Technologies"></div>
                </div>
        </div>
  </div>
@endsection
 
@stop

@section('scripts')
  
  <script>
   

   function careerSubmit(){
       
       var text_content1 = $('#left-block1-content').html();
       var text_content2 = $('#left-block2-content').html();
       
        
      var content1 = $('#textarea-left-block1-content').text(text_content1);
      var content2 = $('#textarea-left-block2-content').text(text_content2);
     
  }
  </script>
 @stop 