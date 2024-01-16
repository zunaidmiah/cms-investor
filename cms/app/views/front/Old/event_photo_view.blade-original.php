@extends('layouts.front_without_banner')
@section('content') 

 
        
<!-- Slide -->
            <!-- InstanceBeginEditable name="EditRegion1" -->
            <div class="banner_subpage5"></div>
            <!-- InstanceEndEditable -->
            <!-- Info section Title-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>News &amp; Events</h1>
                  </div>
                  <div class="span7">
                    <p>Full Turnkey Solutions for Telecom Client.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- InstanceEndEditable --></header>
        <!-- End Header-->
        
         
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li>About Us</li>
                <li>/</li>
                <li><a href="{{URL::to('pages/news_events')}}">News &amp; Events</a></li>
                <li>/</li>
                <li>{{$title->eventtittle}}</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 		
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
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
                                    <img src="{{asset('uploads/newsevent/'.$data->file)}}" alt=""/>                               
                                    <a class="fancybox" href="{{asset('uploads/newsevent/'.$data->file)}}"><div class="overlay"></div></a>
                                </div> 
                                                                   
                                <div class="info">
                                    <a href="#" target="_blank">{{$data->title}}</a>
 
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
          
        <!-- InstanceEndEditable -->
          <!-- Info title-->
      <div class="row-fluid info_title">
 				<br/>
                <div class="info_vertical">
                    <h2><span>Our Clients</span></h2>
                    <p>"We bring a personal and effective approach to every project we work on, which is why our clients love us and why they keep coming back."</p>
                </div>
                <br/>
                <div class="vertical_line"><div class="circle_top"></div></div>

                <i class="icon-group left"></i>
            </div>
            <!-- End Info title-->
           
            <!-- clients-->
            <section class="info_resalt border_top">
            	
              <div class="container">
               <div class="row-fluid">  
                <div class="sponsors" id="sponsors">                
                    <ul class="slides">
                       <li>
                          <a href="#"  class="tooltip_hover" title="Digi"><img src="img/logo/digi.png" alt="Digi"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="U Mobile"><img src="img/logo/umobile.png" alt="U Mobile"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Maxis"><img src="img/logo/maxis.png" alt="Maxis"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Celcom"><img src="img/logo/celcom.png" alt="Celcom"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Ericsson"><img src="img/logo/ericsson.png" alt="Ericsson"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="NEC"><img src="img/logo/nec.png" alt="NEC"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Alcatel Lucent"><img src="img/logo/alcatel_lucent.png" alt="Alcatel Lucent"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Huawei"><img src="img/logo/huawei.png" alt="Huawei"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="ZTE"><img src="img/logo/zte.png" alt="ZTE"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="P1"><img src="img/logo/p1.png" alt="P1"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="yes"><img src="img/logo/yes.png" alt="yes"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="nsn"><img src="img/logo/nsn.png" alt="nsn"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Smart"><img src="img/logo/smart.png" alt="Smart"></a>
                       </li> 
                       <li>
                          <a href="#"  class="tooltip_hover" title="Axiata"><img src="img/logo/axiata.png" alt="Axiata"></a>
                       </li>                                       
                    </ul> 
                </div>
              </div>  
             </div>  
            </section>  
            <!-- End clients--> 


           

        </section>
        <!-- End content info-->



@stop

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
 
$('.fancybox').fancybox();
 
});
</script>
@stop
        