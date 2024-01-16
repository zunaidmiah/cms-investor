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
                <div class="row-fluid left-content">
                	<h2 class="red-title">{{ $homePageData->heading1 }}</h2>
                        {{$homePageData->body1}}
                	</div>
                </div>
                <div class="span6">
                	<div class="row-fluid">
                      <h2 class="red-title"><span>Media News</span></h2>
                      @foreach($latestNews as $latest)
                      <div align="left">
                      	<p><div class="label label-info">{{ date("d M, Y",$latest->date) }}</div> <a href="{{ URL::to('media_news/news/news_centre_latest_media_news_details?show=' . $latest->id) }}" target="_blank">{{ $latest->title }}</a> </p>
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

            


           

        </section>
        
        <script>
         jQuery(document).ready(function($) {
         });
       </script>
@stop
        