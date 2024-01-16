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
                <li>Investor Tools</li>
                <li>/</li>
                <li>News Alert</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left">News Alert Subscription</h2>
              <div class="clearfix"></div>
			  <div class="row-fluid">
                <div class="span12">
                  <p>Please subscribe for <strong>OCK GROUP BERHAD</strong>'s News Alert. You will receive our company's latest news and announcements via email.</p>
                  <p>Kindly read our <a href="#" target="_blank">Privacy Policy</a> and key in your name and email address below:</p>
                  <form id="form" action="#">
                      <h6>Name <span class="red-title">*</span></h6>
                      <input type="text" placeholder="Your Name" name="Name" class="input-xxlarge"  required>
                      <h6>E-mail Address <span class="red-title">*</span></h6>
                      <input type="text" placeholder="E-mail Address"  name="Email" class="input-xxlarge"  required>
                      <div class="clearfix"></div>
                      <input type="submit" name="Submit" value="Subscribe" class="button">
                  </form>
                  
                  <p><a href="investor_tools_news_alert_unsubscribe.html">Unsubscribe</a> from <strong>OCK GROUP BERHAD</strong>'s News Alert service.</p>
                  
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-bullhorn right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->

@stop
        