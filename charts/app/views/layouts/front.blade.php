@include('includes.head')
@include('includes.header')
        <div class="page-header-breadcrumb">
          <div class="page-heading hidden-xs">
            <h1 class="page-title">Share Information</h1>
          </div>
          
          <ol class="breadcrumb page-breadcrumb">
            <li><i class="fa fa-home"></i>&nbsp;Dashboard&nbsp; <i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Investor Relations &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li>Share Information &nbsp;<i class="fa fa-angle-right"></i>&nbsp;</li>
            <li class="active">Stock Charts - Listing</li>
          </ol>
        </div>
        <!--END PAGE HEADER & BREADCRUMB-->
        @yield('content')
        

@include('includes.footer')