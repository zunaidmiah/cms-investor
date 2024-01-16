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
                <li>Price &amp; Volume</li>
              </ul>
            <!-- InstanceEndEditable --></div>        
  </div>
        <!-- End crumbs-->   
        
 
        
        

        <!-- End content info -->
        <section class="content_info"><!-- InstanceBeginEditable name="EditRegion4" -->
          
          <!-- Info white-->
        <div class="info_white1 border_bottom">
          <div class="container">
              <h2 class="red-title">Price &amp; Volume</h2>
              <div class="clearfix"></div>
              
              <div class="row-fluid">
                <div class="span12">
				  <div id="twitter-bootstrap-container">
                    <div id="twitter-bootstrap-tabs">
                     <ul class="nav nav-tabs">
                      <li><a href="#daily">Daily</a></li>
                      <li><a href="#monthly">Monthly</a></li>
                      <li><a href="#hilo">Hi-Lo</a></li>
                     </ul>
                     <div class="panels">
                     	<div id="daily">
                        	<!-- note to programmer: click "past 1 week", the below table will display past 1 week result. Same scenario as click for "past 1 month", "past 3 months", "past 6 months", "past 1 year"-->
                            <a href="#"><button class="btn btn-primary" type="button">Past 1 Week</button></a>
                            <a href="#"><button class="btn btn-success" type="button">Past 1 Month</button></a>
                            <a href="#"><button class="btn btn-warning" type="button">Past 3 Months</button></a>
                            <a href="#"><button class="btn btn-danger" type="button">Past 6 Months</button></a>
                            <a href="#"><button class="btn btn-inverse" type="button">Past 1 Year</button></a>

                       	  
                            <div class="clearfix"></div>
                            <div class="margin_top_10px">
                            	<form id="form" action="#">
                                	<h6>Search Date</h6>
                                    <input type="text" placeholder="From (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="text" placeholder="To (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="submit" name="Submit" value="Search" class="button">
                                </form>
                            </div>
                            
                            
                            <div class="margin_top_10px pull-left">
                              <p>4 records were found for <span class="red-title"><strong>Past One Week  <span class="black-title">(11/09/2014 to 17/09/2014)</span></strong></span></p>
                            </div>
                            
                       		<table class="table table-striped border_top">
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Open<br/>(RM)</th>
                                    <th>Highest<br/>(RM)</th>
                                    <th>Lowest<br/>(RM)</th>
                                    <th>Close<br/>(RM)</th>
                                    <th>Average Price<br/>(RM)</th>
                                    <th>Value of Transactions<br/>(RM'000)</th>
                                    <th>Volume Transacted <br/>(Shares)</th>
                                  </tr>    
                                </thead>
                                <tbody>
                                  <tr>
                                     <td>1</td>
                                     <td>17/09/2014</td>
                                     <td>1.460</td>
                                     <td>1.470</td>
                                     <td>1.440</td>
                                     <td>1.460</td>
                                     <td>1.467</td>
                                     <td>844.19</td>
                                     <td>575,500</td>
                                  </tr>
                                  <tr>
                                     <td>2</td>
                                     <td>15/09/2014</td>
                                     <td>1.440</td>
                                     <td>1.470</td>
                                     <td>1.430</td>
                                     <td>1.460</td>
                                     <td>1.461</td>
                                     <td>877.06</td>
                                     <td>600,300</td>
                                  </tr>
                                  <tr>
                                     <td>3</td>
                                     <td>12/09/2014</td>
                                     <td>1.460</td>
                                     <td>1.470</td>
                                     <td>1.430</td>
                                     <td>1.440</td>
                                     <td>1.434</td>
                                     <td>2,228.34</td>
                                     <td>1,554,000</td>
                                  </tr>
                                  <tr>
                                     <td>4</td>
                                     <td>11/09/2014</td>
                                     <td>1.500</td>
                                     <td>1.510</td>
                                     <td>1.430</td>
                                     <td>1.440</td>
                                     <td>1.462</td>
                                     <td>1,954.40</td>
                                     <td>1,337,200</td>
                                  </tr>  
                                </tbody>
                                <tfoot>
                                  <tr>
                                  	<td colspan="7"><span class="pull-right">Total</span></td>
                                    <td>5,903.98</td>
                                    <td>4,067,000</td>
                                  </tr>
                                </tfoot>
                              </table>
                              <div class="pagination pull-right">
                                <ul>
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">&#8249;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&#8250;</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>

                      	</div>
                        
                      	<div id="monthly">
                        
                        	<!-- note to programmer: click "past 3 months", the below table will display past 3 months result. Same scenario as click for "past 6 months", "past 1 year"-->
                            <a href="#"><button class="btn btn-warning" type="button">Past 3 Months</button></a>
                            <a href="#"><button class="btn btn-danger" type="button">Past 6 Months</button></a>
                            <a href="#"><button class="btn btn-inverse" type="button">Past 1 Year</button></a>

                       	  
                            <div class="clearfix"></div>
                            <div class="margin_top_10px">
                            	<form id="form" action="#">
                                	<h6>Search Date</h6>
                                    <input type="text" placeholder="From (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="text" placeholder="To (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="submit" name="Submit" value="Search" class="button">
                                </form>
                            </div>
                            
                            
                            <div class="margin_top_10px pull-left"><p>3 records were found for <span class="red-title"><strong>Past Three Months  <span class="black-title">(18/06/2014 to 17/09/2014)</span></strong></span></p></div>
                            
                       		<table class="table table-striped border_top">
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                
                                <thead>
                                  <tr>
                                    <th>No.</th>
                                    <th>Date</th>
                                    <th>Open<br/>(RM)</th>
                                    <th>Highest<br/>(RM)</th>
                                    <th>Lowest<br/>(RM)</th>
                                    <th>Close<br/>(RM)</th>
                                    <th>Average Price<br/>(RM)</th>
                                    <th>Value of Transactions<br/>(RM'000)</th>
                                    <th>Average Daily Value<br/>(RM'000)</th>
                                    <th>Volume Transacted <br/>(Shares)</th>
                                    <th>Average Daily Volume <br/>(Shares)</th>
                                  </tr>    
                                </thead>
                                <tbody>
                                  <tr>
                                    <td></td>
                                    <td><strong>Year 2014</strong></td>
                                  	<td colspan="9"></td>
                                  </tr>
                                  <tr>
                                     <td>1</td>
                                     <td>August</td>
                                     <td>1.540</td>
                                     <td>1.580</td>
                                     <td>1.310</td>
                                     <td>1.440</td>
                                     <td>1.475</td>
                                     <td>47,036.39</td>
                                     <td>2,239.83</td>
                                     <td>31,886,700</td>
                                     <td>1,518,414</td>
                                  </tr>
                                  <tr>
                                     <td>2</td>
                                     <td>July</td>
                                     <td>1.440</td>
                                     <td>1.600</td>
                                     <td>1.410</td>
                                     <td>1.540</td>
                                     <td>1.506</td>
                                     <td>54,355.39</td>
                                     <td>2,717.77</td>
                                     <td>36,086,700</td>
                                     <td>1,804,335</td>
                                  </tr>
                                  <tr>
                                     <td>3</td>
                                     <td>June</td>
                                     <td>1.400</td>
                                     <td>1.500</td>
                                     <td>1.390</td>
                                     <td>1.420</td>
                                     <td>1.437</td>
                                     <td>33,229.67</td>
                                     <td>1,582.37</td>
                                     <td>23,120,800</td>
                                     <td>1,100,990</td>
                                  </tr>
                                   
                                </tbody>
                                <tfoot>
                                  <tr>
                                  	<td colspan="11"></td>
                                  </tr>
                                </tfoot>
                              </table>  
                              <div class="pagination pull-right">
                                <ul>
                                    <li><a href="#">&laquo;</a></li>
                                    <li><a href="#">&#8249;</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&#8250;</a></li>
                                    <li><a href="#">&raquo;</a></li>
                                </ul>
                            </div>                            

                      	</div>
                        
                        
                        <div id="hilo">
                           <!-- note to programmer: click "past 1 week", the below table will display past 1 week result. Same scenario as click for "past 1 month", "past 3 months", "past 6 months", "past 1 year"-->
                            <a href="#"><button class="btn btn-primary" type="button">Past 1 Week</button></a>
                            <a href="#"><button class="btn btn-success" type="button">Past 1 Month</button></a>
                            <a href="#"><button class="btn btn-warning" type="button">Past 3 Months</button></a>
                            <a href="#"><button class="btn btn-danger" type="button">Past 6 Months</button></a>
                            <a href="#"><button class="btn btn-inverse" type="button">Past 1 Year</button></a>

                       	  
                            <div class="clearfix"></div>
                            <div class="margin_top_10px">
                            	<form id="form" action="#">
                                	<h6>Search Date</h6>
                                    <input type="text" placeholder="From (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="text" placeholder="To (dd/mm/yyyy)" name="Name" class="input-medium">
                                    <input type="submit" name="Submit" value="Search" class="button">
                                </form>
                            </div>
                            
                            
                            <div class="margin_top_10px pull-left">
                              <p>Results for <span class="red-title"><strong>Past One Week  <span class="black-title">(11/09/2014 to 17/09/2014)</span></strong></span></p>
                            </div>
                            
                       		<table class="table table-striped border_top">
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                <col width="1"/>
                                
                                <thead>
                                  <tr>
                                    <th></th>
                                    <th>Highest Date</th>
                                    <th>Highest</th>
                                    <th>Lowest Date</th>
                                    <th>Lowest</th>
                                  </tr>    
                                </thead>
                                <tbody>
                                  <tr>
                                     <td><strong>Price</strong></td>
                                     <td>11/09/2014</td>
                                     <td>1.510</td>
                                     <td>12/09/2014</td>
                                     <td>1.430</td>
                                  </tr>
                                  <tr>
                                     <td><strong>Volume</strong></td>
                                     <td>12/09/2014</td>
                                     <td>1,554,000</td>
                                     <td>17/09/2014</td>
                                     <td>575,500</td>
                                  </tr>
                                 
                                </tbody>
                                <tfoot>
                                  <tr>
                                  	<td colspan="5"></td>
                                  </tr>
                                </tfoot>
                              </table>
                                                            
                              <div class="row-fluid">
                                <div class="span3 pull-left">
                                   <p class="green-title"><strong>Highest Price</strong></p>
                                   <div class="alert alert-success">
                                       Highest price during this period is<strong>1.510</strong> on 11/09/2014  
                                   </div>
                                </div> 
                                
                                <div class="span3 pull-left">
                                   <p class="red-title"><strong>Lowest Price</strong></p>
                                   <div class="alert alert-error">
                                       Lowest price during this period is <strong>1.430</strong> on 12/09/2014 
                                   </div>
                                </div> 
                                
                                <div class="span3 pull-left">
                                   <p class="green-title"><strong>Highest Volume</strong></p>
                                   <div class="alert alert-success">
                                       Highest volume during this period is<strong>1,554,000</strong> on 12/09/2014 
                                   </div>
                                </div> 
                                
                                <div class="span3 pull-left">
                                   <p class="red-title"><strong>Lowest Volume</strong></p>
                                   <div class="alert alert-error">
                                      Lowest volume during this period is <strong>575,500</strong> on 17/09/2014 
                                   </div>
                                </div> 
                                
                                
                 
                          </div>
               
                        	
                        </div>
                        <!-- end hi-lo -->
                      
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
        