<!DOCTYPE html>
<html lang="en">
  <head>
	@include('includes.head')
	 <style>
	 @if(Request::segment(1)!='' && !empty($banner))
        .banner_subpage5 {

                background-image: url(http://http://cms.fareastholdingsbhd.com/uploads/banners/{{$banner}});
                background-repeat: no-repeat;
                background-position: center top;
                height: 400px;
                width: 100%;
            
        }
        @endif
    </style>
</head>
<body>

@include('includes.header')
@yield('content')
@include('includes.footer')	

</body>
</html>