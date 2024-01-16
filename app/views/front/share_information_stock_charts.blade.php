@extends('layouts.front_without_banner')
@section('content') 

   
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
              <h2 class="red-title">Daily Chart</h2>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
                	<p class="pull-left">Technical Indicator: 
                    <select name="select">
                       <option>-- Select --</option>
                       <option selected="selected">Candlestick Chart with MA, Volume and MACD</option>
                       <option>Candlestick Chart with MA, Volume, MACD and Stochastic Oscillator</option>
                       <option>Candlestick Chart with MA, Volume, MACD and RSI</option>
                       <option>Candlestick Chart with Bollinger Bands, Volume and MACD</option>
                       <option>Candlestick Chart with Bollinger Bands, Volume and MACD</option>
                       <option>Line Chart with MA, Volume and MACD</option>
                    </select>
                    </p>
                    <div class="clearfix"></div>
                    
                    <!-- note to programmer: click " 3 Months", the below chart will display selected value and 3 Months chart. Same scenario as click for "6 months", "1 year" and "2 year" -->
                   <a href="#"><button class="btn btn-warning" type="button">3 Months</button></a>
                   <a href="#"><button class="btn btn-danger" type="button">6 Months</button></a>
                   <a href="#"><button class="btn btn-inverse" type="button">1 Year</button></a>
                   <a href="#"><button class="btn btn-info" type="button">2 Years</button></a>
                   <a href="javascript:window.print()"><button class="btn pull-right" type="button"><i class="icon-print"></i> Print</button></a>
                    	  
                   <div class="clearfix"></div>
 
                   <div class="margin_top border_top border_bottom">
                   	   <h5>Candlestick Chart with MA for <span class="red-title">3 Months</span></h5>
                       <!-- note to programmer: pls customize this chart to full width -->
                       <p align="center"><img src="img/stock_charts/Candlestick_Chart_MA_3months.jpg" alt="Candlestick Chart with MA"></p>
                   </div>
                   
                   <div class="margin_top_10px border_bottom">
                   	   <h5>MACD Chart for <span class="red-title">3 Months</span></h5>
                   <!-- note to programmer: pls customize this chart to full width -->
                       <p align="center"><img src="img/stock_charts/Candlestick_Chart_MACD_3months.jpg" alt="Candlestick Chart with MACD"></p>
                   </div>
                   
                   <div class="margin_top_10px">
                   	   <h5> Volume Chart for <span class="red-title">3 Months</span></h5>
                   <!-- note to programmer: pls customize this chart to full width -->
                       <p align="center"><img src="img/stock_charts/Candlestick_Chart_volume_3months.jpg" alt="Candlestick Chart with Volume"></p>
                   </div>
                    
                   
                </div>
                   
              </div>
            </div>
            <i class="icon-bar-chart right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->
        
        


@stop
        