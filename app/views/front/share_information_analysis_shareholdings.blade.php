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
            
            <!-- crumbs-->
<div class="crumbs border_bottom">
            <div class="container"><!-- InstanceBeginEditable name="EditRegion3" -->
              <ul>
                <li><a href="index.html">Home</a></li>
                <li>/</li>
                <li><a href="investor_relations_home.html">Investor Relations</a></li>
                <li>/</li>
                <li>Share Information</li>
                <li>/</li>
                <li>Analysis of Shareholdings</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
          <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left">Distribution of Shareholdings</h2>
              <p class="pull-right">View Year:
                 <select name="select" id="subject">
                    <option>-- Select --</option>
                    <option selected="selected">31-12-2013</option>
                    <option>31-12-2012</option>
                    <option>List all options here</option>
                 </select>
              </p>
              <div class="clearfix"></div>
              <h5>Distribution of Shareholdings As At 14/04/2014</h5>
              
              
              <div class="row-fluid">
                <div class="span12">
                  <table class="table table-striped">
                  	<col width="1"/>
                	<col width="1"/>
                    <col width="1"/>
                    <col width="1"/>
                    <col width="1"/>
                    <col width="1"/>
                    
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Size of Shareholdings</th>
                        <th>No. of Shareholders</th>
                        <th>% of Shareholders</th>
                        <th>No. of Shares</th>
                        <th>% of Shareholding</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                         <td>1</td>
                         <td>Less than 100</td>
                         <td>4</td>
                         <td>0.22</td>
                         <td>200</td>
                         <td>0.00</td>
                      </tr>
                      <tr>
                         <td>2</td>
                         <td>100 - 1,000</td>
                         <td>196</td>
                         <td>10.61</td>
                         <td>160,200</td>
                         <td>0.06</td>
                      </tr>
                      <tr>
                         <td>3</td>
                         <td>1,001 - 10,000</td>
                         <td>983</td>
                         <td>53.19</td>
                         <td>5,677,200</td>
                         <td>1.99</td>
                      </tr>
                      <tr>
                         <td>4</td>
                         <td>10,001 - 100,000</td>
                         <td>539</td>
                         <td>29.17</td>
                         <td>18,016,000</td>
                         <td>6.32</td>
                      </tr>
                      <tr>
                         <td>5</td>
                         <td>100,001 - 14,244,999</td>
                         <td>124</td>
                         <td>6.71</td>
                         <td>84,688,600</td>
                         <td>29.73</td>
                      </tr>
                      <tr>
                         <td>6</td>
                         <td>5% and above of issued shares capital</td>
                         <td>2</td>
                         <td>0.11</td>
                         <td>176,357,800</td>
                         <td>61.90</td>
                      </tr>                     
                    </tbody>
                    <tfoot>
                    	<tr>
                        	<td colspan="2">TOTAL</td>
                            <td>1,848</td>
                            <td>100.00</td>
                            <td>284,900,000</td>
                            <td>100.00</td>
                        </tr>
                    </tfoot>
                  </table> 
                  <p>All Prices Are Quoted In Ringgit Malaysia.</p>
                  
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-signal right"></i>
          </div>
          <!-- End Info white -->
          
        <!-- InstanceEndEditable --></section>
        <!-- End content info-->
        
        


@stop
        