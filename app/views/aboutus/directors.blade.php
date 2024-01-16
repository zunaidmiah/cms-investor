@extends('layouts.front')
@section('content') 
<div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>Board of Directors</h1>
                  </div>
                  <div class="span7">
                    <p>Full Turnkey Solutions for Telecom Client.</p>
                  </div>
                </div>
              </div>
            </div>
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="http://cms.ock.net.my">Home</a></li>
                <li>/</li>
                <li>About Us</li>
                <li>/</li>
                <li>Board of Directors</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->

<?php $i=1; ?>
        @foreach($bods as $bod)

        @if(($i % 2) == 1)
         <!-- Info white-->
            <div class="info_white border_bottom">
                <div class="container">
                    <div class="row-fluid">
                        <div class="span9">
                             {{ $bod->bod_name}}

                             {{ $bod->bod_position}}

                             {{ $bod->country_age}}

                             {{ $bod->bod_description}}
                             
   
                        </div>
                        
                        <!-- Image animation-->
                        <div class="span3 image_resalt">
                           <div class="animation_four border_bottom">
                              	<img src="http://cms.ock.net.my/uploads/bods/{{$bod->bod_image}}" alt="Dato' Syed Norulzama bin Syed Kamarulzaman">
                           </div>
                        </div>
                        <!-- End Image animation-->

                    </div>
                </div>
            </div>

            @elseif(($i % 2) == 0)
            
            <!-- End Info white-->
            
            <!-- Info white-->
            <div class="info_resalt border_bottom">
                <div class="container">
                    <div class="row-fluid"> 
                    	<!-- Image animation-->
                        <div class="span3 image_resalt">
                           <div class="animation_three border_bottom">
                              	<img src="http://cms.ock.net.my/uploads/bods/{{$bod->bod_image}}" alt="Abdul Halim Bin Abdul Hamid">
                           </div>
                        </div>
                        <!-- End Image animation-->
                        
                        <div class="span9">
                             {{ $bod->bod_name}}

                             {{ $bod->bod_position}}

                             {{ $bod->country_age}}

                             {{ $bod->bod_description}}             
                        </div>
                    </div>
                </div>
                          
              </div>
			<!-- End Info white-->
            
           @endif
            
         


<?php $i++; ?>
        @endforeach              

        </section>
        <!-- End content info-->

       
        
@stop
        