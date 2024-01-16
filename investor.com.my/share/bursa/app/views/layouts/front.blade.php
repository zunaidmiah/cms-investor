<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.fronthead')
 <style>

        
      .banner_subpage5 {

          background-image: url('/uploads/banners/{{$banner}}');
          background-repeat: no-repeat;
          background-position: center top;
          height: 400px;
          width: 100%;
            
      }
    </style>
</head>
<body>

    <!-- Header-->
        <header class="slide1">   
            <!-- nav_logo-->
            <div class="nav_logo animated fadeInDown delay1">            
                <div class="container">
                    <div class="row-fluid">

                        <!-- Logo-->
                        <div class="span3 logo"><a href="/" title="Back to Home"><img src="{{ url() }}/img/index/logo.png" alt="Far East Holdings Berhad"></a></div>
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
                   <h1>@if(isset($pageTitle) != '')
                   {{ $pageTitle }}
                   @endif</h1>
                    </div>
                  <div class="span7" style="font-family: 'Open Sans', sans-serif, font-size: 16px;">
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
                @foreach ($breadcrumbs as $k => $breadcrumb)
                <li>
                    @if($breadcrumb['url'] != '' || $k == 0 || $k == 1)
                    @if($k == 0)
                    <?php $url = "https://cms.fareastholdingsbhd.com" ?>
                    @endif  
                    @if($k == 1)
                    <?php $url = "https://bursa.fareastholdingsbhd.com" ?>
                    @endif  
                    <a href="{{ $url }}">{{ $breadcrumb['title'] }}</a>
                    @else
                    {{ $breadcrumb['title'] }}
                    @endif
                </li>
                @if (count($breadcrumbs) != ($k + 1))
                <li>/</li>
                @endif
                @endforeach
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info">
            @yield('content')
         </section>
        <!-- End content info-->
<!-- BEGIN FOOTER -->
@include('includes.frontfooter')
<!-- END FOOTER -->
        
   @include('includes.frontscripts')
   
 </body>
</html>