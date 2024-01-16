@extends('layouts.front_without_banner')
@section('content')
        <div class="clearfix"></div>

       <!-- Info section Title-->
	<div style="margin-top: 80px;"></div>
    <div class="section_title1">
      <div class="container">
        <div class="row-fluid animated fadeInUp delay1">
        
          <div class="span5">
            <h1>Contact Tracing Form</h1>
          </div>
          <div class="span7">
            <p>Oil Palm Plantation Investment Holdings</p>
          </div>
        </div>
      </div>
    </div>
 
<!-- End Header-->        
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container">
              <ul>
                <li><a href="http://cms.fareastholdingsbhd.com">Home</a></li>
                <li>/</li>
                <li>Contact Tracing Form</li>
              </ul>
            </div>        
  </div>
        <!-- End crumbs-->   
        
       <!-- End content info -->
        <section class="content_info">
            
          <!-- Info white-->
            <div class="info_white1 border_bottom">
                <div class="container">
                    <div class="row-fluid">
            @if (Session::has('message'))
              
              <div class="alert alert-success alert-dismissable">
                <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button>
                <i class="fa fa-check-circle"></i> <strong>Success!</strong>
                <p>{{ Session::get('message') }}</p>
              </div>
              @endif
                        <div class="span12 text-center">
							<h2 class="red-title">Contact Tracing Form</h2>
                            <h5>Please fill in the form below </h5>
                       <div class="red" style="color:red;">
{{ HTML::ul($errors->all()) }}                
</div>
							
                      {{ Form::open(array('id'=>'form1','url' => 'contact_tracing',"method" => "post")) }}
                      <div class="text-center">
                            <h6>Mobile Number <span class="red-title">*</span></h6>
                        
                        {{ Form::text('phone','',array('id'=>'mobile_number','class' => 'input-xxlarge validate[required]', 'placeholder' => 'Mobile Number' )) }}
                            <h6>Name <span class="red-title">*</span></h6>
                          
                          {{ Form::text('name','',array('id'=>'your_name','class' => 'input-xxlarge validate[required]', 'placeholder' => 'Your Name' )) }} 
                           
                          <h6>Temperature <span class="red-title">*</span></h6>
                            
                            {{ Form::text('temperature','',array('class' => 'input-xxlarge validate[required]', 'placeholder' => 'Temperature' )) }}
                          <div class="clearfix"></div>
                          
                           
                            
                            <!--<p>Confirm the re-captcha:<br>
                                
                                
                                <script type="text/javascript">
	var RecaptchaOptions = {"curl_timeout":1};
</script>
<script src='https://www.google.com/recaptcha/api.js?render=onload'></script>
<div class="g-recaptcha" data-sitekey="6LcxL3IUAAAAAMMOvFnBPGRlxrBjBOxQiNc2lCSk"></div>
<noscript>
  <div style="width: 302px; height: 352px;">
    <div style="width: 302px; height: 352px;">
      <div style="width: 302px; height: 352px;">
        <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LcxL3IUAAAAAMMOvFnBPGRlxrBjBOxQiNc2lCSk"
                frameborder="0" scrolling="no"
                style="width: 302px; height:352px; border-style: none;">
        </iframe>
      </div>
      <div style="width: 250px; height: 80px; position: absolute; border-style: none;
                  bottom: 21px; left: 25px; margin: 0px; padding: 0px; right: 25px;">
        <textarea id="g-recaptcha-response" name="g-recaptcha-response"
                  class="g-recaptcha-response"
                  style="width: 250px; height: 80px; border: 1px solid #c1c1c1;
                         margin: 0px; padding: 0px; resize: none;" value="">
        </textarea>
      </div>
    </div>
  </div>
</noscript>--> <br>
                            
                            
                           {{ Form::button(
                                                'Submit',
                                                array(
                                                    'class'=>'button',
                                                    'type'=>'submit'))
                                            }}
                             
                            <div id="result"></div>  
                        </div>

                      {{ Form::close() }}
                            
                        </div><!--end span12-->

                    </div>
                </div>
                <i class="icon-map-marker right"></i>
            </div>
            
            <!-- End Info white-->
            <div class="clearfix"></div>
            


        </section>
        <!-- End content info--> 
       <script>
        $("#mobile_number").change(function(){
           var cid = $(this).val();
           
        if(cid){
        $.ajax({
           type:"get",
           url:"/your_name/"+cid,
           success:function(res)
           {       
                if(res)
                {

                    $.each(res,function(key, value){
                        $("#your_name").val(value);
                    });
                }
           }

        });
        }

      });

      </script>
       
@stop
