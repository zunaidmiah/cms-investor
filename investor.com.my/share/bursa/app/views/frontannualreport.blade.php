@extends('layouts.front')
@section('content')
                 
                 
                  <div class="clearfix">
                  <div class="grid_12">
			<header class="entry-header clearfix">
				<div class="format-icon">
				<div class="format-icon-inner">
				<i class="icon-book"></i> </div>
                                </div>
                            <div class="entry-header-inner">
                                  
                                    {{ $page->left_block1_title }}
                                   
				</div>
                                </div>
				
							</header>
                              <div class="hr"></div>
                            <div class="clearfix"></div>
                  </div>	
                          <!-- Vacancies Listing start -->
                         <!-- Form Starts Here -->
                        
                           
		 <div class="clearfix">
								<!-- Project Feed -->
								<div class="project-feed">
			
                    @foreach( $annualreports as $k => $annualreport)
                    <div class="grid_3 project-item">
			
                            <div class="project-item-inner">
			<figure class="project-img">
    {{HTML::image($annualreport->image->url('thumb'),'Annual Report 2013',array( 'class' => 'img-responsive', 'height' => '248', 'width' => '200' ));}}
    
                        <div class="overlay"> 
                            <a href="{{ url().$annualreport->pdf->url() }}" class="dlink"><i class="icon-link"></i></a> </div>
			</figure>
			<div class="project-desc">
			<h3 class="title"><a href="{{ url().$annualreport->pdf->url() }}">
                                {{ $annualreport->title }}</a></h3>
			<span class="desc"> {{ $annualreport->short_description }}</span>
										  </div>
									 </div>
								  
                        
                        </div>
                                   
                      @endforeach         
								   
								   
								</div>
								<!-- Project Feed / End -->
							</div>
                
                  
		
@stop