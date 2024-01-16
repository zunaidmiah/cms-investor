@extends('layouts.front_without_banner')
@section('content') 

            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><a href="investor_relations_home.html">Investor Relations</a></li>
                <li>/</li>
                <li>Event Calendar</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>Events Listing</span></h2>
              <div class="margin_top_10px">
           	    <p class="pull-right">View Year:
                    <select name="select" id="subject">
                        <option>-- Select --</option>
                        <option selected="selected">2014</option>
                        <option>2013</option>
                        <option>2012</option>
                        <option>List all options here</option>
                    </select>
                </p>
              </div>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                    <h5>Year 2014</h5>
                	<div id="accordion2" class="accordion">
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                        <i class="icon-chevron-down"></i> <span class="title">02/09/2014</span></a>
                                    </div>
                                    <div class="accordion-body collapse in" id="collapseOne">
                                        <div class="accordion-inner">
                                          <div class="row-fluid"> 
                                            <div class="span12">      
                                              <p><strong>Notice of Extraordinary General Meeting ("EGM")</strong></p>
                                               <ul class="unstyled">
                                               	<li><span class="label label-important">Date of Meeting:</span> 02/09/2014</li>
                                                <li><span class="label label-info">Time:</span> 10:00 AM</li>
                                                <li><span class="label label-success">Venue:</span> Redang Room, Bukit Jalil Golf &amp; Country Resort, Jalan 3/155B, Bukit Jalil 57000, Kuala Lumpur.</li>
                                              </ul>
                 							   <p>Date of General Meeting Record of Depositors: 26/08/2014</p>
                                            </div>
                                            
                                          </div>
      
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapseTwo" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                        <i class="icon-chevron-down"></i> <span class="title">28/05/2014</span> </a>
                                    </div>
                                    <div class="accordion-body collapse" id="collapseTwo">
                                        <div class="accordion-inner">
                                             
										  <div class="row-fluid"> 
                                            <div class="span12">      
                                              <p><strong>Notice of Third Annual General Meeting</strong></p>
                                               <ul class="unstyled">
                                               	<li><span class="label label-important">Date of Meeting:</span> 28/05/2014</li>
                                                <li><span class="label label-info">Time:</span> 10:00 AM</li>
                                                <li><span class="label label-success">Venue:</span> Perdana 3, Bukit Jalil Golf &amp; Country Resort, Jalan 3/155B, Bukit Jalil 57000, Kuala Lumpur.</li>
                                               </ul>
                 							   <p>Date of General Meeting Record of Depositors: 22/05/2014</p>         
                                            </div>
                                            
                                          </div>
                                                
                                        </div>
                                    </div>
                                </div>
                                <!-- accordion group end-->
                                
                                
                  </div>
 
                </div>  
              </div>
              
             
            </div>
            <i class="icon-coffee right"></i>
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
            </section>  
            <!-- End clients--> 


           

        </section>
        <!-- End content info-->
@stop
        