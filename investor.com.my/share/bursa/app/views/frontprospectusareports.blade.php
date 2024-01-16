@extends('layouts.front')
@section('content')

<div class="info_white1 border_bottom">
            <div class="container">
              @if(Input::has('datesort'))
                    <h2 class="red-title pull-left"><span>Year {{ Input::get('datesort') }}</span></h2>
                    @else
                    <h2 class="red-title pull-left"><span>AGM/EGM/MSWG</span></h2>
                    @endif
                       {{ Form::open(array('url' => '/investorrelations/reports/agm_egm_mswg','method' => 'post','name' => 'ourproperties', 'id' => 'ourproperties' )) }}       
                                 
                                    <p class="pull-right">View Report Year:
                                 {{ Form::select('datesort', $dateSorts, Input::get('datesort'),array('class' => 'form-control','onchange' => 'this.form.submit();')) }}
                                 </p>  
                                 
                      {{ Form::close() }} 
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
				  <div class="accordion" id="accordion2">
                                  @foreach ($Reports as $k => $Report)
                                      <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapse{{ $k }}">
                                        <i class="icon-chevron-down"></i> <span class="title">{{ $Report->title }}</span> </a>
                                    </div>
                                    <div id="collapse{{ $k }}" class="accordion-body collapse" style="height: 0px;">
                                        <div class="accordion-inner">
                                             <div class="row-fluid">
                								<div class="span3 pull-left">
                                                	<img alt="{{ $Report->title }}" src="{{ url() }}{{ $Report->image->url('large') }}">
                                                    
                                                </div>
                								<div class="span9 pull-left">
                                                    {{  $Report->content }}
                                                    @if( $Report->pdf_file_name != '')
                                                    <h5>Minutes of AGM</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                    @endif
                                           		</div>
                                                  @if( $Report->pdf2_file_name != '')
                                                 <div class="span3 pull-left">
                                                    <h5>EGM</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf2->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf2->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                 </div>
                                                  @endif
                                                  
                                                   @if( $Report->pdf3_file_name != '')
                                                 <div class="span3 pull-left">
                                                    <h5>MSWG Q&amp;A</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf3->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf3->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                 </div>
                                                  @endif
                                                  
                                                   @if( $Report->pdf4_file_name != '')
                                                 <div class="span3 pull-left">
                                                    <h5>MSWG Letter</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf4->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf4->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                 </div>
                                                  @endif

                                                   @if( $Report->pdf5_file_name != '')
                                                 <div class="span3 pull-left">
                                                    <h5>Notice of AGM</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf5->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf4->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                 </div>
                                                  @endif
												  
												   @if( $Report->pdf6_file_name != '')
                                                 <div class="span3 pull-left">
                                                    <h5>Supplementary Notice of AGM</h5>
                                                    <p class="margin_top_10px">
                                                    	<a target="_blank" href="{{ url() }}{{ $Report->pdf6->url() }}"><input type="submit" class="button" value="View PDF" name="Submit"></a>
                                            			<!--<a href="{{ url() }}{{ $Report->pdf4->url() }}"><input type="submit" class="button" value="Download" name="Submit"></a>-->
                                                    </p>
                                                 </div>
                                                  @endif
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                  @endforeach
                                </div>
                               
                            </div>
                                   
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-file-text right"></i>
          </div>
 
		
@stop