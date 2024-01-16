<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/services_green_technology_solar.dwt" codeOutsideHTMLIsLocked="false" -->
 <head>
@include('includes.fronthead')
</head>
  <body> 
        <!-- Header-->
        <header class="slide1">            
            <!-- nav_logo-->
            <div class="nav_logo animated fadeInDown delay1">            
                <div class="container">
                    <div class="row-fluid">

                        <!-- Logo-->
                        <div class="span3 logo"><a href="/" title="Back to Home"><img src="{{ url() }}/img/index/logo.png" alt="OCK Group Berhad"></a></div>
                        <!-- End Logo-->
                                                      
                        <!-- Nav-->
                       @include('includes.fronttopmenu')
                        <!-- End Nav-->
                    </div>
                </div>
            </div>
            <!-- End nav_logo-->
            
            <!-- Slide -->
            <!-- InstanceBeginEditable name="EditRegion1" -->
            @if(isset($contactFrame) != '')
            {{ $contactFrame }}
            @else
            <div class="banner_subpage5"></div>
            @endif
            
            @if(isset($bannerImg) != '')
            {$bannerImg}
            @endif
            <!-- InstanceEndEditable -->
            <!-- Info section Title-->
        <!-- InstanceBeginEditable name="EditRegion2" -->
            <div class="section_title1">
              <div class="container">
                <div class="row-fluid animated fadeInUp delay1">
                    <div class="span5">
                   @if(isset($pageTitle) != '')
                   {{ $pageTitle }}
                   @endif
                    </div>
                  <div class="span7">
                      <p>
                   @if(isset($tagLine) != '')
                   {{ $tagLine }}
                   @endif
                      </p>
                  </div>
                </div>
              </div>
            </div>
            <!-- InstanceEndEditable --></header>
        <!-- End Header-->
        
         
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="http://cms.ock.net.my/">Home</a></li>
                <li>/</li>
                <li><a href="investor_relations_home.html">Investor Relations</a></li>
                <li>/</li>
                <li>News Centre</li>
                <li>/</li>
                <li><a href="news_centre_bursa_announcements.html">Bursa Announcements</a></li>
                <li>/</li>
                <li>Entitlements Summary</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info">
         @yield('content')
        </section>
        <!-- End content info-->

               <!-- End content info-->
<!-- BEGIN FOOTER -->
@include('includes.frontfooter')
<!-- END FOOTER -->     
        <!-- End footer-->


   
        @include('includes.frontscripts')
  </body>
<!-- InstanceEnd --></html>