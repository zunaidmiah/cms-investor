<!DOCTYPE html>
<html lang="en">
  <head>
	@include('includes.head')
<style>
	 @if(Request::segment(1)!='')
        .banner_subpage5 {

                background-image: url(/uploads/banners/{{$banner}});
                background-repeat: no-repeat;
                background-position: center top;
                height: 400px;
                width: 100%;
            
        }
        @endif
        </style>
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