@extends('layouts.front')
@section('content') 

 
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>CSR &amp; Company Bulletin</h1>
                  </div>
                  <div class="span7">
                    <p></p>
                  </div>
                </div>
              </div>
            </div>
          
        
         
            
            <!-- crumbs-->
			<div class="crumbs border_bottom">
            <div class="container">
              <ul>
                <li><a href="{{ URL::to('/') }}">Home</a></li>
                <li>/</li>
                <li>Company</li>
                <li>/</li>
                <li>CSR &amp; Company Bulletin</li>
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
                    <div class="portfolio filters">

                        <ul class="filter" id="portfolio-filter">
                            <li><a href="#all" >All</a></li>
                            @foreach($group_cat as $data)
                             @if($data->category == 'CompanyBulletin')
                               <li><a href="#{{$data->category}}">Company Bulletin</a></li>
                             @else
                               <li><a href="#{{$data->category}}">{{$data->category}}</a></li>
                             @endif
                            

                            @endforeach
                        </ul>

                    	<ul class="filter" id="portfolio-filter">
                            <li><a href="#all" >All</a></li>
                            @foreach($group_year as $data)

                            <li><a href="#{{$data->year}}">{{$data->year}}</a></li>
                            

                            @endforeach
                        </ul>

                       <ul id="portfolio-list">
                        
                            <!-- Item Portfolio-->
                          
                            @foreach($group_title as $data)
                            
                            <li class="span4 {{$data->category}} {{$data->year}}" style= "height:330px">                            
                                <div class="hover">
                                    <img src="{{asset('uploads/newsevent/'.$data->file)}}" alt="{{$data->title}}" style="height: 225px"/>                               
                                    <a href="{{URL::to('event_photo_view/'.$data->id)}}" target="_blank"><div class="overlay"></div></a>
                                </div> 
                                                                   
                                <div class="info">
                                    <a href="{{URL::to('event_photo_view/'.$data->id)}}" target="_blank">{{$data->title}}</a>
 
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
                          <a href="#"  class="tooltip_hover" title="Nokia"><img src="{{ URL::asset('assets/img/logo/nokia.png')}}" alt="Nokia"></a>
                       </li>
                       <li>
                          <a href="#"  class="tooltip_hover" title="Smart"><img src="{{ URL::asset('assets/img/logo/smart.png')}}" alt="Smart"></a>
                       </li>
                                     
                    </ul> 
                </div>
              </div>  
             </div>  
            </section>  -->
            <!-- End clients--> 


           

        </section>
        <!-- End content info-->



@stop
        