@extends('layouts.front')
@section('content')
<style>
    .pricepicket-tbl {
        display: none;
    }
</style>
 <div class="info_white1 border_bottom">
            <div class="container">
              <h2 class="red-title pull-left"><span>Far East Holdings Bhd</span></h2>
              <div class="pull-right margin_top_10px"><button class="button updatePriceFront">Update Price <i class="fa fa-refresh"></i></button></div> 
              <div class="clearfix"></div>
              <h5>FEHB - 5029</h5>
              
              
              <div class="row-fluid">
		<div class="span2 pull-left">
                       <p class="black-title"><strong>Board</strong></p>
                       <div class="alert alert-info">
                           Main Market 
                       </div>
                  </div> 
                    
                    <div class="span2 pull-left">
                       <p class="black-title"><strong>Sector</strong></p>
                       <div class="alert alert-info">
                           Plantation
                       </div>
                    </div> 
                    
                    <div class="span2 pull-left">
                       <p class="black-title"><strong>Syariah Compliance</strong></p>
                       <div class="alert alert-info">
                           Yes
                       </div>
                    </div> 
                    
                    <div class="span2 pull-left">
                       <p class="black-title"><strong>Price</strong></p>
                       <!--<div class="alert alert-error">
                           <strong>0.835</strong>
                       </div>-->
                        <?php
                            if ($stockdata->adj > 0)
                            {
                                $sclass = "alert-success";
                                $iclass = "icon-arrow-up";
                            }
                            else if ($stockdata->adj == 0)
                            {
                                $sclass = "alert-info";
                                $iclass = "icon-minus";
                            }
                            else
                            {
                                $sclass = "alert-error";
                                $iclass = "icon-arrow-down";
                            }
                         ?>
                       <div class="alert {{ $sclass }}">
                           <strong id="price">{{ $stockdata->last_done }}</strong>
                       </div>
                    </div> 
                    
                    <div class="span2 pull-left">
                        <p class="black-title"><strong>Change</strong></p>
                       <!--<div class="alert alert-error">
                           <i class="icon-arrow-down"></i> <strong>0.005</strong>
                       </div>-->
                        <?php
                            if ($stockdata->adj > 0)
                            {
                                $sclass = "alert-success";
                                $iclass = "icon-arrow-up";
                            }
                             else if ($stockdata->adj == 0)
                            {
                                $sclass = "alert-info";
                                $iclass = "icon-minus";
                            }
                            else
                            {
                                $sclass = "alert-error";
                                $iclass = "icon-arrow-down";
                            }
                         ?>
                       <div class="alert {{ $sclass }}">
                           <i class="{{ $iclass }}"></i> <strong id="change">{{ $stockdata->adj }}</strong>
                       </div>
                    </div> 
                    
                    <div class="span2 pull-left">
                        <?php
                            if ($stockdata->percentage_change > 0)
                            {
                                $sclass = "alert-success";
                                $iclass = "icon-arrow-up";
                            }
                             else if ($stockdata->percentage_change == 0)
                            {
                                $sclass = "alert-info";
                                $iclass = "icon-minus";
                            }
                            else
                            {
                                $sclass = "alert-error";
                                $iclass = "icon-arrow-down";
                            }
                         ?>
                       <p class="black-title"><strong>Change %</strong></p>
                       <!--<div class="alert alert-error">
                           <i class="icon-arrow-down"></i> <strong>0.60%</strong>
                       </div>-->
                       <div class="alert {{ $sclass }}">
                           <i class="{{ $iclass }}"></i> <strong id="percent">{{ $stockdata->percentage_change }}%</strong>
                       </div>
                    </div> 
     
              </div>
              
              <div class="row-fluid">
                <div class="span12">
                 {{ $page[0]->left_block1_content }}
                 {{ $page[0]->left_block2_title }}
                  
                  
                </div>
                   
              </div>
            </div>
            <i class="icon-signal right"></i>
          </div>
@stop