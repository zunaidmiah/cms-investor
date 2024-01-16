<!DOCTYPE html>
<html lang="en-US" data-menu="leftalign">
  <head>

	@include('includes.head')


  @yield("top_script")

  @yield("top_style", "
    <style>
      @if(Request::segment(1)!='' && !empty($banner))
      .elementor-5733 .elementor-element.elementor-element-3fa2ab8:not(.elementor-motion-effects-element-type-background),
      .elementor-5733 .elementor-element.elementor-element-3fa2ab8 > .elementor-motion-effects-container > .elementor-motion-effects-layer {

                    background-image: url('/uploads/banners/{{$banner}}');
                    background-repeat: no-repeat;
                    background-position: center top;
                    height: 400px;
                    width: 100%;
                
            }
        @endif
      </style>
    ")
 

</head>
<body data-rsssl="1" class="home page-template-default page page-id-4074 theme-avante woocommerce-no-js menu-transparent lightbox-black leftalign footer-reveal elementor-default elementor-page elementor-page-4074">

@include('includes.header')

@include('includes.footer')	

</body>
</html>