@extends('layouts.admin')
@section('content')

<?php

function getWeekdays($m, $y) {
    $lastday = date("t", mktime(0, 0, 0, $m, 1, $y));
    $weekdays = 0;
    for ($d = 29; $d <= $lastday; $d++) {
        $wd = date("w", mktime(0, 0, 0, $m, $d, $y));
        if ($wd > 0 && $wd < 6)
            $weekdays++;
    }
    return $weekdays + 20;
}

function getDateDiffText($days) {
    if ($days == 7) {
        return "-1 WEEK";
    } else if ($days == 30) {
        return "-1 MONTH";
    } else if ($days == 90) {
        return "-3 MONTH";
    } else if ($days == 180) {
        return "-6 MONTH";
    } else if ($days == 365) {
        return "-1 YEAR";
    }
}

function formatDecimal($num) {
    $numParts = explode(".", $num);
    return (isset($numParts[1]) && strlen($numParts[1]) == 1) ? $num . '0' : $num;
}
?>
<script type="text/javascript">
    setTimeout(function() {
        jQuery(function() {
            jQuery(".dpast").click(function() {
                var dpast = jQuery(this).val();
                jQuery('#dpast').val(dpast);
                jQuery('#filter').submit();
            });
            jQuery(".mpast").click(function() {
                var mpast = jQuery(this).val();
                jQuery('#mpast').val(mpast);
                jQuery('#filter').submit();
            });
            jQuery(".ypast").click(function() {
                var ypast = jQuery(this).val();
                jQuery('#ypast').val(ypast);
                jQuery('#filter').submit();
            });

            jQuery('.date-picker').datepicker({dateFormat: 'dd-mm-yy'});
            
            
            $('#dSearch').click(function() {
                window.location = 'http://bursa.ock.net.my/admin/priceandvolume?dDateFrom='+$('#dDateFrom').val()+'&dDateTo='+$('#dDateTo').val();
                return false;
            });
            $('#mSearch').click(function() {
                window.location = 'http://bursa.ock.net.my/admin/priceandvolume?mDateFrom='+$('#mDateFrom').val()+'&mDateTo='+$('#mDateTo').val();
                return false;
            });
            $('#mSearch').click(function() {
                window.location = 'http://bursa.ock.net.my/admin/priceandvolume?yDateFrom='+$('#yDateFrom').val()+'&yDateTo='+$('#yDateTo').val();
                return false;
            });
        });
    }, 1000)

</script>
<form id="filter" name="filter" method="post" action="">
    <input type="hidden" name="dpast" id="dpast" value="">
    <input type="hidden" name="mpast" id="mpast" value="">
    <input type="hidden" name="ypast" id="ypast" value="">

</form>
<div class="page-content">
    <div class="row">
        <div class="col-lg-12">
            <h2>Price &amp; Volume  <i class="fa fa-angle-right"></i> Edit</h2>
            <div class="clearfix"></div>

            <div class="pull-left margin-top-10px">
                Last updated: <span class="text-blue">{{ date("d F Y",strtotime($page[0]->updated_at)) }} @ {{ date("g:i A",strtotime($page[0]->updated_at)) }}</span>
            </div>

            <div class="pull-right"> 
                <a href="#" class="btn btn-red btn-lg">Update Price &amp; Table &nbsp;<i class="fa fa-refresh"></i></a> 
            </div>
            <div class="clearfix"></div>
            <p></p>
            {{ Form::open(array('url' => 'admin/page/savepage','class'=> 'form-horizontal','method' => 'post','name' => 'corporategeneral','id' => 'corporategeneral')) }} 
            {{Form::hidden('preview','')}}
            {{Form::hidden('pageid',$page[0]->id)}}
            {{Form::hidden('type',$page[0]->type)}}

            <div class="portlet">
                <div class="portlet-header">
                    <div class="caption">Page Info</div><br/>
                    <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                    <div class="tools">
                        <i class="fa fa-chevron-up"></i>
                    </div>
                </div>
                <div class="portlet-body">
                    <div contenteditable="true" id="page-title">
                        {{ $page[0]->page_title }}
                    </div>
                    {{ Form::textarea('page_title',$page[0]->page_title,array("id" => "textarea-page-title","class" => "hideThisField")) }}

                </div>
            </div>
            <div class="clearfix"></div>
            <div class="portlet">
                <div class="portlet-header">
                    <div class="caption">Page Content</div><br/>
                    <span class="text-blue text-12px">You can edit the content by clicking the text section below.</span>
                    <div class="tools"><i class="fa fa-chevron-up"></i></div>
                </div>

                <div class="portlet-body">
                    <div contenteditable="true" id="left-block1-title">
                        {{ $page[0]->left_block1_title }}
                    </div>
                    {{ Form::textarea('left_block1_title',$page[0]->left_block1_title,array("id" => "textarea-left-block1-title","class" => "hideThisField")) }}


                    <!-- end responsive table -->



                </div>
                <!-- End portlet body -->

            </div>
            <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#daily" data-toggle="tab">Daily</a></li>
                <li><a href="#monthly" data-toggle="tab">Monthly</a></li>
                <li><a href="#hi-lo" data-toggle="tab">Hi-Lo</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div id="daily" class="tab-pane fade in active">
                    <!-- note to programmer: click "past 1 week", the below table will display past 1 week result. Same scenario as click for "past 1 month", "past 3 months", "past 6 months", "past 1 year"-->
                    <button class="btn btn-primary dpast" type="button" value="7">Past 1 Week</button>
                    <button class="btn btn-success dpast" type="button" value="30">Past 1 Month</button>
                    <button class="btn btn-warning dpast" type="button" value="90">Past 3 Months</button>
                    <button class="btn btn-danger dpast" type="button" value="180">Past 6 Months</button>
                    <button class="btn btn-inverse dpast" type="button" value="365">Past 1 Year</button>


                    <div class="clearfix"></div>
                    <div class="margin_top_10px">
                        <form method="POST" id="dForm" action="/admin/priceandvolume">
                            <h6>Search Date</h6>
                            <input id="dDateFrom" type="text" value="{{Input::get('dDateFrom')}}" placeholder="From (dd-mm-yyyy)" name="dDateFrom" class="input-medium date-picker">
                            <input id="dDateTo" type="text" value="{{Input::get('dDateTo')}}" placeholder="To (dd-mm-yyyy)" name="dDateTo" class="input-medium date-picker">
                            <input type="button" id="dSearch" name="Submit" value="Search" class="button">
                        </form>
                    </div>


                    <div class="margin_top_10px pull-left">
                        <?php
                        $dTot = count($priceVoldaily);
                        if (Input::has('dDateFrom') && Input::has('dDateTo')) {
                            $dPeriod = Input::get('dDateFrom') . ' to ' . Input::get('dDateTo');
                        } else {
                            $dPeriod = date('d/m/Y', strtotime(getDateDiffText($dls), time())) . ' to ' . date('d/m/Y');
                        }
                        ?>
                        <p>{{ $dTot }} records were found for <span class="red-title"><strong>{{ $dtxt }} <span class="black-title">({{ $dPeriod }})</span></strong></span></p>
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
                                <th>Average Value of Transactions<br/>(RM'000)</th>
                                <th>Volume Transacted <br/>(Shares)<br/>('00)</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php
                            $totalVol = 0;
                            $totalVal = 0;
                            ?>
                            @if(empty($priceVoldaily))
                            <tr><td style="text-align: center;" colspan="9">No data found</td></tr>
                            @else
                            @foreach ($priceVoldaily as $k => $priceVoldaily1)
                            <?php
                            $avgPrice = ($priceVoldaily1->high + $priceVoldaily1->low) / 2;
                            ?>
                            <tr>
                                <td>{{ $k+1 }}</td>
                                <td>{{ $priceVoldaily1->date1 }}</td>
                                <td>{{ formatDecimal($priceVoldaily1->open) }}</td>
                                <td>{{ formatDecimal($priceVoldaily1->high) }}</td>
                                <td>{{ formatDecimal($priceVoldaily1->low) }}</td>
                                <td>{{ formatDecimal($priceVoldaily1->close) }}</td>
                                <td>{{ $avgPrice }}</td>
                                <td>{{ number_format($avgPrice * $priceVoldaily1->volume,"2") }}</td>
                                <td>{{ number_format($priceVoldaily1->volume,"2") }}</td>
                            </tr>
                            <?php
                            $totalVal += ($avgPrice * $priceVoldaily1->volume);
                            $totalVol += ($priceVoldaily1->volume);
                            ?>
                            @endforeach
                            <?php
                            $totalVal = number_format($totalVal, "2");
                            $totalVol = number_format($totalVol, "2");
                            ?>
                            @endif



                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7"><span class="pull-right">Total</span></td>
                                <td>{{ $totalVal }}</td>
                                <td>{{ $totalVol }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <!--<div class="pagination pull-right">
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
                  </div>-->

                </div>
                <!-- end tab daily -->

                <div id="monthly" class="tab-pane fade">

                    <!-- note to programmer: click "past 3 months", the below table will display past 3 months result. Same scenario as click for "past 6 months", "past 1 year"-->
                    <button class="btn btn-warning mpast" type="button" value="90">Past 3 Months</button>
                    <button class="btn btn-danger mpast" type="button" value="180">Past 6 Months</button>
                    <button class="btn btn-inverse mpast" type="button" value="365">Past 1 Year</button>


                    <div class="clearfix"></div>
                    <div class="margin_top_10px">
                        <form method="POST" id="mForm" action="/admin/priceandvolume">
                            <h6>Search Date</h6>
                            <input id="mDateFrom" type="text" value="{{Input::get('mDateFrom')}}" placeholder="From (dd-mm-yyyy)" name="mDateFrom" class="input-medium date-picker">
                            <input id="mDateTo" type="text" value="{{Input::get('mDateTo')}}" placeholder="To (dd-mm-yyyy)" name="mDateTo" class="input-medium date-picker">
                            <input type="button" id="mSearch" name="Submit" value="Search" class="button">
                        </form>
                    </div>

                    <?php
                    $mTot = count($priceVolmonthly);
                    ?>
                    <?php
                    if (Input::has('mDateFrom') && Input::has('mDateTo')) {
                        $mPeriod = Input::get('mDateFrom') . ' to ' . Input::get('mDateTo');
                    } else {
                        $mPeriod = date('d/m/Y', strtotime(getDateDiffText($mls), time())) . ' to ' . date('d/m/Y');
                    }
                    ?>
                    <div class="margin_top_10px pull-left"><p>{{ $mTot }} records were found for <span class="red-title"><strong>{{ $mtxt }} <span class="black-title">({{ $mPeriod }})</span></strong></span></p></div>

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
                                <th>Average Value of Transactions<br/>(RM'000)</th>
                                <th>Average Daily Value<br/>(RM'000)</th>
                                <th>Volume Transacted <br/>(Shares)<br />('00)</th>
                                <th>Average Daily Volume <br/>(Shares)<br />('00)</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @if(empty($priceVoldaily))
                            <tr><td style="text-align: center;" colspan="9">No data found</td></tr>
                            @else
                            <?php
                            $currentYear = date('Y', strtotime(str_replace('/', '-', $priceVolmonthly[0]->date1)));
                            ?>
                            <tr>
                                <td></td>
                                <td><strong>Year {{ $currentYear }}</strong></td>
                                <td colspan="9"></td>
                            </tr>
                            @foreach ($priceVolmonthly as $k => $priceVolmonthly1)
                            <?php
                            $calcYear = date('Y', strtotime(str_replace('/', '-', $priceVolmonthly1->date1)));
                            ?>
                            @if ($calcYear != $currentYear)
                            <tr>
                                <td></td>
                                <td><strong>Year {{ $calcYear }}</strong></td>
                                <td colspan="9"></td>
                            </tr>
                            <?php
                            $currentYear = $calcYear;
                            ?>
                            @endif
                            <?php
                            $avgPrice = ($priceVolmonthly1->high + $priceVolmonthly1->low) / 2;
                            $avgTransactionValue = $avgPrice * $priceVolmonthly1->avgVolume;
                            $dates = explode("/", $priceVolmonthly1->date1);
                            $weekDays = getWeekdays($dates[1], $dates[2]);
                            $avgDailyValue = $avgTransactionValue / $weekDays;
                            ?>
                            <tr>
                                <td>{{$k+1}}</td>
                                <td>{{ date('F', strtotime(str_replace('/', '-', $priceVolmonthly1->date1))) }}</td>
                                <td>{{ number_format($priceVolmonthly1->open,"2") }}</td>
                                <td>{{$priceVolmonthly1->high}}</td>
                                <td>{{$priceVolmonthly1->low}}</td>
                                <td>{{ number_format($priceVolmonthly1->close, "2") }}</td>
                                <td>{{ number_format($avgPrice,"2") }}</td>
                                <td>{{ number_format($avgTransactionValue, "2") }}</td>
                                <td>{{ number_format($avgDailyValue, "2") }}</td>
                                <td>{{ number_format($priceVolmonthly1->sumVolume, "2") }}</td>
                                <td>{{ number_format($priceVolmonthly1->avgVolume, "2") }}</td>
                            </tr>
                            @endforeach
                            @endif



                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="11"></td>
                            </tr>
                        </tfoot>
                    </table>  
                    <!--<div class="pagination pull-right">
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
                  </div>  -->                          

                </div>
                <!-- end tab monthly -->

                <div id="hi-lo" class="tab-pane fade">
                    <!-- note to programmer: click "past 1 week", the below table will display past 1 week result. Same scenario as click for "past 1 month", "past 3 months", "past 6 months", "past 1 year"-->
                    <button class="btn btn-primary ypast" type="button" value="7">Past 1 Week</button>
                    <button class="btn btn-success ypast" type="button" value="30">Past 1 Month</button>
                    <button class="btn btn-warning ypast" type="button"  value="90">Past 3 Months</button>
                    <button class="btn btn-danger ypast" type="button"  value="180">Past 6 Months</button>
                    <button class="btn btn-inverse ypast" type="button"  value="365">Past 1 Year</button>


                    <div class="clearfix"></div>
                    <div class="margin_top_10px">
                        <form method="POST" id="yForm" action="/admin/priceandvolume">
                            <h6>Search Date</h6>
                            <input id="yDateFrom" type="text" value="{{Input::get('yDateFrom')}}" placeholder="From (dd-mm-yyyy)" name="yDateFrom" class="input-medium date-picker">
                            <input id="yDateTo" type="text" value="{{Input::get('yDateTo')}}" placeholder="To (dd-mm-yyyy)" name="yDateTo" class="input-medium date-picker">
                            <input type="button" id="ySearch" name="Submit" value="Search" class="button">
                        </form>
                    </div>


                    <div class="margin_top_10px pull-left">
                        <?php
                        if (Input::has('yDateFrom') && Input::has('yDateTo')) {
                            $yPeriod = Input::get('yDateFrom') . ' to ' . Input::get('yDateTo');
                        } else {
                            $yPeriod = date('d/m/Y', strtotime(getDateDiffText($yls), time())) . ' to ' . date('d/m/Y');
                        }
                        if (isset($PriceLo[0])) {
                            $yLowPriceParts = explode(".", $PriceLo[0]->PriceLow);
                            $PriceLo[0]->PriceLow = (isset($yLowPriceParts[1]) && strlen($yLowPriceParts[1]) == 1) ? $PriceLo[0]->PriceLow . '0' : $PriceLo[0]->PriceLow;
                        }

                        if (isset($PriceHi[0])) {
                            $yHighPriceParts = explode(".", $PriceHi[0]->PriceHigh);
                            $PriceHi[0]->PriceHigh = (isset($yHighPriceParts[1]) && strlen($yHighPriceParts[1]) == 1) ? $PriceHi[0]->PriceHigh . '0' : $PriceHi[0]->PriceHigh;
                        }
                        ?>
                        <p>Results for <span class="red-title"><strong>{{ $ytxt }} <span class="black-title">({{$yPeriod}})</span></strong></span></p>
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
                                <td>{{ (isset($PriceHi[0])) ? $PriceHi[0]->date1 : 'No data' }}</td>
                                <td>{{ (isset($PriceHi[0])) ? $PriceHi[0]->PriceHigh : 'No data' }}</td>
                                <td>{{ (isset($PriceLo[0])) ? $PriceLo[0]->date1 : 'No data' }}</td>
                                <td>{{ (isset($PriceLo[0])) ? $PriceLo[0]->PriceLow : 'No data' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Volume ('00)</strong></td>
                                <td>{{ (isset($VolHi[0])) ? $VolHi[0]->date1 : 'No data' }}</td>
                                <td>{{ (isset($VolHi[0])) ? number_format($VolHi[0]->VolumeHigh,"2") : 'No data' }}</td>
                                <td>{{ (isset($VolLo[0])) ? $VolLo[0]->date1 : 'No data' }}</td>
                                <td>{{ (isset($VolLo[0])) ? number_format($VolLo[0]->VolumeLow, "2") : 'No data' }}</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5"></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="row-fluid">
                        <?php if (isset($PriceHi[0])) { ?>
                            <div class="span3 pull-left">
                                <p class="green-title"><strong>Highest Price</strong></p>
                                <div class="alert alert-success">
                                    Highest price during this period is <strong>{{ $PriceHi[0]->PriceHigh }}</strong> on {{ $PriceHi[0]->date1 }} 
                                </div>
                            </div> 
                        <?php } ?>

                        <?php if (isset($PriceLo[0])) { ?>
                            <div class="span3 pull-left">
                                <p class="red-title"><strong>Lowest Price</strong></p>
                                <div class="alert alert-error">
                                    Lowest price during this period is <strong>{{ $PriceLo[0]->PriceLow }}</strong> on {{ $PriceLo[0]->date1 }}
                                </div>
                            </div> 
                        <?php } ?>

                        <?php if (isset($VolHi[0])) { ?>
                            <div class="span3 pull-left">
                                <p class="green-title"><strong>Highest Volume ('00)</strong></p>
                                <div class="alert alert-success">
                                    Highest volume ('00) during this period is <strong>{{ number_format($VolHi[0]->VolumeHigh,"2") }}</strong> on {{ $VolHi[0]->date1 }}
                                </div>
                            </div> 
                        <?php } ?>

                        <?php if (isset($VolLo[0])) { ?>
                            <div class="span3 pull-left">
                                <p class="red-title"><strong>Lowest Volume ('00)</strong></p>
                                <div class="alert alert-error">
                                    Lowest volume ('00) during this period is <strong>{{ number_format($VolLo[0]->VolumeLow, "2") }}</strong> on {{ $VolLo[0]->date1 }}
                                </div>
                            </div> 
                        <?php } ?>



                    </div>


                </div>
                <!-- end tab hi-lo -->
            </div>	
            <!-- End portlet -->

            <div class="form-actions none-bg"> <a href="javascript:void(0);" class="btn btn-red" onclick="Addsavepage('corporategeneral', '');">Save &amp; Preview &nbsp;<i class="fa fa-search"></i></a>&nbsp; <button type="submit" class="btn btn-blue">Save &amp; Publish &nbsp;<i class="fa fa-globe"></i></button>&nbsp; <a href="#" class="btn btn-green">Cancel &nbsp;<i class="glyphicon glyphicon-ban-circle"></i></a> </div>

            {{Form :: close()}}
        </div>
    </div>
</div>
@stop