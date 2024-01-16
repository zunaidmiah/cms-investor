@extends('layouts.front1')
@section('content')
<div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>{{ $frontadditionaldetail->title }}</span></h2>
              <div class="pull-right margin_top_10px">
              	<a href="news_centre_bursa_additional_listing_announcement.html" class="button">Back</a>
              </div>
              <div class="clearfix"></div>
              
              
              <!-- note to programmer: the order of the announcement is from top (the latest) to bottom (the oldest) -->
              <div class="row-fluid">
                <div class="span12">
                  <a href="javascript:window.print()"><button class="btn pull-right" type="button"><i class="icon-print"></i> Print</button></a>
                  <div class="clearfix"></div>
                   {{ $frontadditionaldetail->html }}
          <!-- End Info white -->
          
          <!-- Info Resalt-->
          <div class="info_resalt border_bottom">
            <div class="container">
              <div class="row-fluid">
                <div class="span12">
                  <h2 class="red-title"><span>Announcement Info</span></h2>
                  <div class="alert alert-error">
                      <strong>Reference No:</strong> MI-140625-48355  
                  </div>
                </div>      
              </div>
              
            </div>
          </div>
          <!-- End Info Resalt-->
          
        <!-- InstanceEndEditable -->
@stop