@extends('layouts.front')
@section('content') 
        
 
        
        

       <section class="content_info">
            
            <!-- Info title-->
            <div class="row-fluid info_title">
                <div class="vertical_line">
                    <div class="circle_top"></div>
                </div>
              <div class="info_vertical">  
                <div class="span6">
                	<div class="row-fluid">
                            <h2 class="red-title">{{$homePageData->heading1}}</h2>
                      {{$homePageData->body1}}  
                	</div>
                </div>
                <div class="span6">
                	<div class="row-fluid">
                      <h2 class="red-title"><span>Media News</span></h2>
                      @foreach($latestNews as $latest)
                      <div align="left">
                      	<p><div class="label label-info">{{ date("d M, Y",$latest->date) }}</div> <a href="{{ $latest->link }}" target="_blank">{{ $latest->title }}</a> </p>
                      </div>
                      @endforeach
                      
                	</div>
                </div>
                </div>
                <div style="clear:both"></div>
                <div class="vertical_line"></div>

                <i class="icon-cogs right"></i>
            </div>
            <!-- End Info title-->
            

            <!-- Info Resalt-->
            <div class="info_resalt border_top">
                <div class="container">
                    <div class="row text-center service-process top_animationb">
                        <div class="info_vertical">
                            <h2 class="red-title">{{$homePageData->heading2}}</h2>
                            {{$homePageData->body2}}
                            
                        </div>
                        <br/>
                        @foreach ($businesses_create as $Busi)
                        <!-- Step 1 -->                        
                          <div class="span3">
                              <div class="thumbnail">
                                <div class="caption-head">
                                  <a href="{{$Busi->url}}">
                                      <em class="caption-icon {{$Busi->icon}} icon-big"></em>                            
                                      <h4 class="caption-title">{{$Busi->title}}</h4>
                                  </a>
                                </div>
                              </div>
                          </div>                        
                         @endforeach 
                        <!-- Step 2 -->                        
                          
                        <!-- Step 3 -->
                        
                        <!-- Step 4 -->
                                         
                    </div>
                </div>
            </div>
            <!-- End Info Resalt-->

            


           

        </section>
        
@stop
        