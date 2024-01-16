@extends('layouts.front_without_banner')
@section('content') 
<script type="text/javascript" src="js/pdfobject.js"></script>

	<script type="text/javascript">

	window.onload = function (){

	var success = new PDFObject({ url: "img/financial_position/ock-annualreport2013-31122013-06052014-BS.pdf" }).embed("pdf");
	
	};

	</script>
 
        
 <!-- Slide -->
    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="banner_subpage5"></div>
    <!-- InstanceEndEditable -->
    <!-- Info section Title-->
<!-- InstanceBeginEditable name="EditRegion2" -->
    <div class="section_title1">
      <div class="container">
        <div class="row-fluid animated fadeInUp delay1">
          <div class="span5">
            <h1>Corporate Information</h1>
          </div>
          <div class="span7">
            <p>Full Turnkey Solutions for Telecom Client.</p>
          </div>
        </div>
      </div>
    </div>
    <!-- InstanceEndEditable -->
<!-- End Header-->        
 <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title">Statements of Financial Position</h2>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                	<div id="twitter-bootstrap-container">
                        <div id="twitter-bootstrap-tabs">
                             <ul class="nav nav-tabs">
                              <li><a href="#viewpdf">View PDF</a></li>
                             </ul>
                             <div class="panels">
                                <div id="viewpdf">                
                                    <p class="pull-right">View Report Year:
                                    <select name="select" id="subject">
                                        <option>-- Select --</option>
                                        <option value="img/financial_position/ock-annualreport2013-31122013-06052014-BS.pdf" selected="selected">31-12-2013</option>
                                        <option>List all options here</option>
                                    </select>
                                    </p>
                                    <div class="clearfix"></div>
                                            
                                    <div id="pdf">It appears you don't have Adobe Reader or PDF support in this web browser. <a href="img/financial_position/ock-annualreport2013-31122013-06052014-BS.pdf" target="_blank">Click here to download the PDF</a></div>
                                </div>
                            </div>
                           <!-- end panels -->
                       </div>
                  </div>

				  <script type="text/javascript">
                  $('#twitter-bootstrap-tabs').easytabs();
                  </script>
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-dollar right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->


@stop
        