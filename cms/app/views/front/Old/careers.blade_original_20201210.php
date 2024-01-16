@extends('layouts.front_without_banner')
@section('content')
        
        
        <!-- Slide -->
           
            <div class="banner_subpage5"></div>
            
            <!-- Info section Title-->
        
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                  <div class="span5">
                    <h1>Careers</h1>
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
                <li>Careers</li>
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
							
                             {{ $page->body1}}

                               <div id="accordion2" class="accordion">
                                 @foreach ($job_vacancies_data as $job_vacancy)
                               
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a href="#collapse{{$job_vacancy->id }}" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle">
                                        <i class="icon-chevron-down"></i> <span class="title">{{$job_vacancy->jobtitle}}</span></a>
                                    </div>
                                    <div class="accordion-body collapse " id="collapse{{$job_vacancy->id }}">
                                        <div class="accordion-inner">
											<div class="ticked">
                                            <span><strong>Responsibilities</strong></span>
                                            {{$job_vacancy->responsibilities}}
											</div>

											<div class="ticked">
                                            <span><strong>Requirements</strong></span>
                                            {{$job_vacancy->requirements}}
											</div>
                                            <p>{{$job_vacancy->footertext}}</p>


                                            <a href="online_apply/{{$job_vacancy->id }}" target="_blank"><input type="submit" name="Submit" value="Apply This Position" class="button"></a>

                                        </div>
                                    </div>
                                </div>
                                 @endforeach
                                
                               
                              



                            </div>

                        </div>

                    </div>
                </div>
                <i class="icon-briefcase right"></i>
            </div>

            <!-- End Info white-->

            {{ $page->body2 }}

  
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
            </section>-->
            <!-- End clients-->




        </section>
        <!-- End content info-->

        <!-- footer-->

@stop
