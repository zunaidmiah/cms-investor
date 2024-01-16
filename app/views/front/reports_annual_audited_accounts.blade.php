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
                <li>Reports</li>
                <li>/</li>
                <li>Annual Audited Accounts</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container"> 
                            
              <div class="row-fluid">
                <div class="span12">
                	<h2 class="red-title pull-left"><span>Year 2013</span></h2>
                    <p class="pull-right">View Report Year:
                      <select name="select" id="subject">
                          <option>-- Select --</option>
                          <option selected="selected">2013</option>
                          <option>List all options here</option>
                      </select>
                    </p>
                    <div class="clearfix"></div>
                    <div class="portfolio">

                       <ul id="portfolio-list">
                        
                            <!-- Item Portfolio-->
                            <li class="span4">
                                <div class="hover">
                                    <img src="img/annual_audited_accounts/img2013.jpg" alt="Annual Audited Accounts 2013"/>                               
                                    <a href="#save as pdf" title="Download"><div class="overlay"></div></a>
                                </div> 
                                                                   
                                <div class="info">
                                    <a href="img/annual_audited_accounts/OCK-Annual-2013.pdf" target="_blank">Annual Audited Accounts 2013</a>
 
                                </div>  
                            </li>  
                            <!-- End Item Portfolio-->
  

                        </ul>
                    </div>
					
                </div>
                   
              </div>
            </div>
            <i class="icon-file-text right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->

@stop
        