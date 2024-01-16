@extends('layouts.front')
@section('content')

                    
   <!-- Info white-->
         
     
            <!-- Info white-->
        
          <div class="info_white1 border_bottom">
            <div class="container">
            	{{ $page[0]->left_block1_title }}
              <!--<h2 class="red-title">List of Properties</h2>-->
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                	<div id="twitter-bootstrap-container">
                        <div id="twitter-bootstrap-tabs">
                             <ul class="nav nav-tabs">
                              <li><a href="#viewpdf">View PDF</a></li>
                             </ul>
                              @foreach ($pdfs as $k => $pdf)
                             <div class="panels">
                                <div id="viewpdf">        
                                    
                             @if($k == 0)
	                             @if(Request::is('sustainability/tor-audit-management-committee'))
	                             	{{ Form::open(array('url' => '/sustainability/tor-audit-management-committee','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
	                             @elseif(Request::is('sustainability/tor-board-nomination-committee'))
	                             	{{ Form::open(array('url' => '/sustainability/tor-board-nomination-committee','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
	                             @elseif(Request::is('sustainability/tor-risk-management-committee'))
	                             	{{ Form::open(array('url' => '/sustainability/tor-risk-management-committee','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
	                             @elseif(Request::is('investorrelations/corporateinformation/tor-remuneration-committee'))
	                             	{{ Form::open(array('url' => '/investorrelations/corporateinformation/tor-remuneration-committee','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/palm-oil-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/palm-oil-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/Environmental-protection-biological-diversity-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/Environmental-protection-biological-diversity-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/equality-gender-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/equality-gender-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
							     @elseif(Request::is('/sustainability/food-safety-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/food-safety-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/quality-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/quality-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/safety-health-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/safety-health-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/safety-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/safety-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/slope-river-protection-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/slope-river-protection-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
							     @elseif(Request::is('/sustainability/social-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/social-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
								 @elseif(Request::is('/sustainability/certification-policy'))
	                             	{{ Form::open(array('url' => '/sustainability/certification-policy','method' => 'post','name' => 'reviewoperations', 'id' => 'reviewoperations' )) }}       
	                                 
	                           	 <p class="pull-right">View Report Year:
	                                 {{ Form::select('datesort', $profieDates, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
	                                 </p>  
	
	                                 <input type="hidden" name="pdf_type" value="{{ $pdf_type }}"> 
	                                 
	                                 {{ Form::close() }}
	                             @endif  
                             @endif
                                    </p>
                                    <div class="clearfix"></div>
                                            
 <object data="{{ url() }}/{{ $pdf->pdf->url() }}" type="application/pdf" width="100%" height="1300px">
 
  <p>It appears you don't have a PDF plugin for this browser.
  No biggie... you can <a href="{{ url() }}/{{ $pdf->pdf->url() }}">click here to
  download the PDF file.</a></p>
  
</object>                                </div>
                            </div>
                          @endforeach
                           <!-- end panels -->
                       </div>
                  </div>
                  
                
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-building right"></i>
          </div>
     
            <script type="text/javascript">
                  $('#twitter-bootstrap-tabs').easytabs();
                  </script>
          <!-- End Info white -->                 
         
		
@stop