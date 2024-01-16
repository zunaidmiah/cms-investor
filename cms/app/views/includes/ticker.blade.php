        
                <div class="container">
                   <div class="row">
                     <div class="info_vertical">
                            <ul id="ticker01">
                            @foreach($stockdata as $ticker)
                              <li><span><div class="divGap">&nbsp;</div></span></li>            
                              <li> Stock Name &nbsp;<span class="stock_number_standard">FEHB (5029)</span></li>
                              <li> Open &nbsp; <span class="stock_number_standard">@if($ticker->open == 0) - @else {{$ticker->open}} @endif</span></li>
                              <li> Previous Close &nbsp; <span class="stock_number_up">@if($ticker->close == 0) - @else {{$ticker->close}} @endif</span></li>
                              <li>
                                 Change &nbsp; 
                                 <?php
                                    if ($ticker->adj > 0)
                                    {
                                        $sclass = "stock_number_up";
                                        $iclass = "icon-arrow-up";
                                    }
                                    else if ($ticker->adj < 0)
                                    {
                                        $sclass = "stock_number_down";
                                        $iclass = "icon-arrow-down";
                                    }
                                    else{
                                        $sclass = "";
                                        $iclass = "";
                                    }

                                 ?>
                                 <span class="{{ $sclass }}"><i class="{{ $iclass }}"></i>@if($ticker->adj == 0) - @else {{$ticker->adj}} @endif</span>
                               </li>
                              <li> 
                                Change % &nbsp; 
                                <?php
                                   if ($ticker->percentage_change > 0)
                                   {
                                       $sclass = "stock_number_up";
                                       $iclass = "icon-arrow-up";
                                   }
                                   else if ($ticker->percentage_change < 0)
                                   {
                                       $sclass = "stock_number_down";
                                       $iclass = "icon-arrow-down";
                                   }
                                   else{
                                        $sclass = "";
                                        $iclass = "";
                                    }
                                ?>
                                <span class="{{ $sclass }}"><i class="{{ $iclass }}"></i>@if($ticker->percentage_change == 0) - @else {{$ticker->percentage_change}} @endif</span>
                              </li>
                              <li> Volume ('00) &nbsp; <span class="stock_number_standard">@if($ticker->volume == 0) - @else {{$ticker->volume}} @endif</span></li>
                              <li> High &nbsp; <span class="stock_number_up">@if($ticker->high == 0) - @else {{$ticker->high}} @endif</span></li>
                              <li> Low &nbsp; <span class="stock_number_down">@if($ticker->low == 0) - @else {{$ticker->low}} @endif</span></li>
                              <li> Last Done &nbsp; <span class="stock_number_standard">{{$ticker->close}}</span></li>         
                              <li> Last Updated &nbsp; <span class="stock_number_standard normal">{{date('d F Y H:i:s', strtotime($ticker->date))}}.</span></li>
                            @endforeach
                            </ul>
            </div>
                   </div><!-- end row --> 
                </div><!-- end container -->