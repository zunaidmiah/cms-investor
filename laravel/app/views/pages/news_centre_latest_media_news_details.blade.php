@extends('layouts.front')@section('content')


<div class="blog-post-content-wrapper layout-classic">
	<!-- Begin each blog post -->
    <div class="blog-posts-classic post-203 post type-post status-publish format-video has-post-thumbnail hentry category-career category-family category-life tag-direction tag-vision-goal-setting post_format-post-format-video">
    	<div class="post-wrapper">
                                                                                
        	<div class="post-content-wrapper text-">
               <div class="post-header">
               	  <div class="post-detail single-post">
                     <span class="post-info-cat">
                     	<a href="#">- {{ $mediaNews->footer }}</a>
							&nbsp;&middot;&nbsp; {{ date('d M, Y', $mediaNews->date) }}
                                                                                            
                     </span>
                  </div>
                  <div class="post-header-title">
                  	<h2>{{ stripslashes($mediaNews->title) }}</h2>
                    <p class="headlineEditor"><i>{{$mediaNews->heading}}</i></p>
                  </div>
											
               </div>
               <div class="post-header-wrapper">
               	  <div class="col-md-12">
					 @if($mediaNews->news_image != '')
                     <img src="{{ URL::to('/').'/'.$mediaNews->news_image }}" alt="Inserted Image" class="text-center news_details_img">
                     @endif
			      </div>
                  <div class="clearfix margin_top_10px"></div>
                  <p>{{ $mediaNews->content }}</p>
											
											
                           								<!--<div class="post-button-wrapper">
                                                                                            <a class="continue-reading" href="#">Back to Media News<span></span></a>
                                                                                        </div>-->
                </div><!-- end post header wrapper-->
             </div><!-- end post content wrapper -->
           </div><!-- end post-wrapper-->

         </div>
         <br class="clear">
         <!-- End each blog post -->
                                                                       
                                                                        
  </div>

@stop
