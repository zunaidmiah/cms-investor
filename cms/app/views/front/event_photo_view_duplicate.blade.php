@extends('layouts.front_without_banner')
@section('styles')
	
<style>
.eye_logo {
  position: relative;
}
.hover_overlay {
  position: absolute;
  background: #000;
  opacity: 0.8;
  display: block;
  bottom: 40px;
  left: 0;
  width: 270px;
  z-index: 99;
  display: none;
  transition: .5s ease;
}
.hover_overlay p {
  margin: 10px;
  color: #fff;
}
.hover_overlay::after {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  background: rgba(0, 0, 0, 0.9);
  bottom: -10px;
  right: 20px;
  transform: rotate(45deg);
}
.eye_logo:hover .hover_overlay {
    display: block;
}
#content-description {
    line-height: 1.5em;
    height: 9em;
    overflow: hidden;
    white-space: wrap;
    text-overflow: ellipsis;
}
#fancybox-wrap {
}

</style>
@stop

@section('content') 

 
        
<!-- Slide -->
            
            <div class="banner_subpage2"></div>
            
            <!-- Info section Title-->
        
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>CSR &amp; Company Bulletin</h1>
                  </div>
                  <div class="span7">
                    <p>Oil Palm Plantation Investment Holdings</p>
                  </div>
                </div>
              </div>
            </div>
            </header>
        <!-- End Header-->
        
         
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container">
              <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>/</li>
                <li>Company</li>
                <li>/</li>
                <li><a href="{{URL::to('pages/news_events')}}">CSR &amp; Company Bulletin</a></li>
                <li>/</li>
                <li>{{$title->eventtittle}}</li>
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
                <div class="span12">
              	<h2 class="red-title">
		    <span>{{$title->eventtittle}}</span>		
		</h2>	 
                	
                    <div class="portfolio filters">                   	
			<ul id="portfolio-list">                        
                            <!-- Item Portfolio-->
                            @foreach($content as $data)
                            <li class="span3">                            
                                <div class="hover">
                                    
                                    <img src="{{ asset('uploads/newsevent/' . $data->file) }}" alt="" style="height: 170px;" />  
                                    <a class="fancybox-field" href="{{asset('uploads/newsevent/'.$data->file)}}">
                                    	<div class="overlay"></div>
                                    </a>
                                </div>
                                                                   
                                <!--<div class="info">
                                    <a href="#" target="_blank">{{$data->title}}</a>
 
                                </div>-->
                                <div class="info">
                                
                                 <p id="content-description">{{ \Illuminate\Support\Str::limit($data->eventcaption, 150, $end='') }}</p>

                                  @if(str_word_count($data->eventcaption) > 20)
                                    <div class="eye_logo">
                                     <img class="eyeball" src="{{asset('assets/front/img/eye.png')}}"  alt="" style="height: 20px; width: 20px; margin-left: 20px; float: right; position: absolute; right: 5px; bottom: 5px;"/>
                                      <div class="hover_overlay">
                                        <p>{{$data->eventcaption }}</p>
                                      </div>
                                   </div>       
                                  @endif
                                </div>
                                

                            </li> 
                            @endforeach 
                            <!-- End Item Portfolio-->

                                                      
                            <!-- End Item Portfolio-->                      

                             

                        </ul>

                    </div>
					
                </div>
                   
              </div>
            </div>
            <i class="icon-picture right"></i>
          </div>
          <!-- End Info white -->
          
        
          <!-- Info title-->
      	  <!--<div class="row-fluid info_title">
 				<br/>
                <div class="info_vertical">
                    <h2><span>Our Clients</span></h2>
                    <p>"We bring a personal and effective approach to every project we work on, which is why our clients love us and why they keep coming back."</p>
                </div>
                <br/>
                <div class="vertical_line"><div class="circle_top"></div></div>

                <i class="icon-group left"></i>
            </div>-->
            <!-- End Info title-->
           
            <!-- clients-->
            <!--<section class="info_resalt border_top">
            	
              <div class="container">
               <div class="row-fluid">  
                <div class="sponsors" id="sponsors">                
                    <ul class="slides">
                       <li>
                          <a href="#"  class="tooltip_hover" title="Digi"><img src="{{ URL::asset('assets/img/logo/digi.png')}}" alt="Digi"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="U Mobile"><img src="{{ URL::asset('assets/img/logo/umobile.png')}}" alt="U Mobile"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Maxis"><img src="{{ URL::asset('assets/img/logo/maxis.png')}}" alt="Maxis"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Celcom"><img src="{{ URL::asset('assets/img/logo/celcom.png')}}" alt="Celcom"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Ericsson"><img src="{{ URL::asset('assets/img/logo/ericsson.png')}}" alt="Ericsson"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="NEC"><img src="{{ URL::asset('assets/img/logo/nec.png')}}" alt="NEC"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Alcatel Lucent"><img src="{{ URL::asset('assets/img/logo/alcatel_lucent.png')}}" alt="Alcatel Lucent"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Huawei"><img src="{{ URL::asset('assets/img/logo/huawei.png')}}" alt="Huawei"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="ZTE"><img src="{{ URL::asset('assets/img/logo/zte.png')}}" alt="ZTE"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="P1"><img src="{{ URL::asset('assets/img/logo/p1.png')}}" alt="P1"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="yes"><img src="{{ URL::asset('assets/img/logo/yes.png')}}" alt="yes"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="nsn"><img src="{{ URL::asset('assets/img/logo/nsn.png')}}" alt="nsn"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Smart"><img src="{{ URL::asset('assets/img/logo/smart.png')}}" alt="Smart"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Axiata"><img src="{{ URL::asset('assets/img/logo/axiata.png')}}" alt="Axiata"></a>
                       </li>                                       
                    </ul> 
                </div>
              </div>  
             </div>  
            </section> --> 
            <!-- End clients--> 


           

        </section>
        <!-- End content info-->


@stop

@section('scripts')
	<script type="text/javascript">
	   $(document).ready(function() {
		$('.fancybox-field').fancybox({
			'width'             : 630,
		        'height'            : 465,
		        'autoScale'         : true,
		        'autoDimensions'    : true,
		        'transitionIn'      : 'elastic',
		        'transitionOut'     : 'elastic',
		        'speedIn'           : 200, 
		        'speedOut'          : 200,
		        'overlayShow'       : true,
		        'centerOnScroll'    : true,
		        'easingIn'          : 'easeOutBack',
		        'easingOut'         : 'easeInBack',
		        'type'              : 'image'
		});
	   });
	   
	</script>
@stop
        