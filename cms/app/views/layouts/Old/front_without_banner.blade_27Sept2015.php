<!DOCTYPE html>
<html lang="en">
  <head>
	@include('includes.head')
</head>
<body>
<header class="slide1">            
            <!-- nav_logo-->
           @include('includes.top_nav')
            <!-- End nav_logo-->
            <!--<div class="camera_wrap" id="slide">
                
            </div>-->
               
        </header>

@yield('content')
@include('includes.footer')	

</body>
</html>