@extends('layouts.front')

@section('top_script')
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="{{asset('new_assets/css/style.css')}}">   
@stop

@section('top_style')
  <style>
    .elementor-5733 .elementor-element.elementor-element-3fa2ab8:not(.elementor-motion-effects-element-type-background),
    .elementor-5733 .elementor-element.elementor-element-3fa2ab8 > .elementor-motion-effects-container > .elementor-motion-effects-layer {
              background-image: url('{{asset("uploads/banners/banner1.jpg")}}');
              background-repeat: no-repeat;
              background-position: center top;
              height: 400px;
              width: 100%;
          
    }
  </style> 
@stop

@section('content')

<!-- Begin main content -->
<div class="inner-wrapper">
  <div class="sidebar-content fullwidth">
      <div data-elementor-type="wp-page" data-elementor-id="5733" class="elementor elementor-5733" data-elementor-settings="[]">
          <div class="elementor-inner">
              <div class="elementor-section-wrap">
                
                <section class="cd-h-timeline js-cd-h-timeline margin-bottom-md ">
                      
                  <div class="cd-h-timeline__container container ">
                    <div class="cd-h-timeline__dates">
                      <div class="cd-h-timeline__line text-lg">
                        <ol>
                          @foreach ($media_date as $k => $item)
                              <li><a href="#0" data-date="{{$k}}" class="cd-h-timeline__date {{$k == $dateKeys[0] ? 'cd-h-timeline__date--selected': ''}}">{{$item}}</a></li>
                          @endforeach
                        </ol>
                        <span class="cd-h-timeline__filling-line" aria-hidden="true"></span>
                      </div> <!-- .cd-h-timeline__line -->
                    </div> <!-- .cd-h-timeline__dates -->
                      
                    <ul>
                      <li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--prev cd-h-timeline__navigation--inactive">Prev</a></li>
                      <li><a href="#0" class="text-replace cd-h-timeline__navigation cd-h-timeline__navigation--next">Next</a></li>
                    </ul>
                  </div> <!-- .cd-h-timeline__container -->
              
                  <div class="cd-h-timeline__events">
                    <ol>
                      @foreach ($media as $mKey => $mediaItem)
                        <li class="cd-h-timeline__event text-component {{$mKey == $newsKeys[1] ?'cd-h-timeline__event--selected' : ''}}">
                          @foreach ($mediaItem as $subItem)
                          <div class="col-md-6">
                              <div class="post-content-wrapper text-">
                                  <div class="post-header">
                                      <div class="post-detail single-post">
                                          <span class="post-info-cat">
                                              <a href="{{URL::to('news/news_centre_latest_media_news_details?show='.$subItem->id)}}">
                                                  - {{$subItem->footer}}
                                              </a>
                                              &nbsp;&middot;&nbsp; {{date("d M, Y", $subItem->date)}}
                                          </span>
                                      </div>
                                      <div class="post-header-title">
                                          <h6>
                                              <a href="{{URL::to('news/news_centre_latest_media_news_details?show='.$subItem->id)}}">
                                                  {{$subItem->title}}
                                              </a>
                                          </h6>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                        </li>
                      @endforeach
                    </ol>
                  </div> <!-- .cd-h-timeline__events -->
                </section>

@stop

@section('bottom_script')
<script src="{{asset('new_assets/js/util.js')}}"></script> <!-- util functions included -->
<script src="{{asset('new_assets/js/swipe-content.js')}}"></script> <!-- A Vanilla JavaScript plugin to detect touch interactions -->
<script src="{{asset('new_assets/js/main.js')}}"></script>
@stop