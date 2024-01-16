@extends('layouts.front')

@section('content')
            
          
<!-- Info white-->
<div class="info_white1 border_bottom">
	<div class="container">
		<h2 class="red-title pull-left">Year <?php echo $year ?></h2>

		<p class="pull-right">View Year:
			<select name="select" id="subject" class="selectNewsYear">
			@foreach($getValidYearsList as $value)
				<option value="<?php echo $value->year ?>" <?php echo $value->year == $year ? 'selected="selected"' : '' ?> >{{ $value->year }}</option>
			@endforeach
			</select>
		</p>

		<div class="clearfix"></div>              
<?php
	for ($i = 0; $i < 12; $i++) {
		$news_in_month[$i] = array();
	}

	foreach($mediaNews as $mediaNewsSingle){
		$month = (int) date('n', $mediaNewsSingle->date) - 1;
		$news_in_month[$month][] = $mediaNewsSingle;
	}

	// Nearest non-empty month index
	$near_month = 0;
	for ($i = 11; $i >= 0; $i--) {
		if (count($news_in_month[$i]) > 0) {
			$near_month = $i;
			break;
		}
	}

	$month_names = array('january','february','march','april','may','june','july','august','september','october','november','december');
?>
		<div class="row-fluid">
		  	<div id="twitter-bootstrap-container">
	            <div id="twitter-bootstrap-tabs">
	                 <ul class="nav nav-tabs">
						@for($i = 11; $i >= 0; $i--)
	                        <li id="month-tab-{{ $i }}">
	                        	<a href="#{{ $month_names[$i] }}">{{ ucfirst($month_names[$i]) }}</a>
	                        </li>
						@endfor
	                </ul>

	                 <div class="panels">
						@for($i = 11; $i >= 0; $i--)
		                    <div id="{{ $month_names[$i] }}">
		                        @if(! empty($news_in_month[$i]))
									<?php $even = $odd = array(); ?>
		                            @foreach($news_in_month[$i] as $key => $value)
		                                @if($key%2 == 0)
		                                    <?php $even[] = $value; ?>
		                                @else
		                                    <?php $odd[] = $value; ?>
		                                @endif
		                            @endforeach 

		                            <div class="span6">
		                                @foreach($even as $evenValue)    
			                                <blockquote>
			                                    @if(!empty($evenValue->date))
			                                    	<div class="label label-info">
			                                    		{{ date('d M, Y', $evenValue->date) }}
			                                    	</div>
			                                    @endif
			                                    <a href="{{ URL::to('news/news_centre_latest_media_news_details?show='.$evenValue->id) }}" target="_blank">{{ stripslashes($evenValue->title) }}</a> 
			                                    <small><cite title="Source Title">{{ $evenValue->footer }}</cite></small>
			                                </blockquote>
		                                @endforeach
		                            </div>
		                            
		                            @if(isset($odd))
		                                <div class="span6">
		                                    @foreach($odd as $oddValue)
		                                    <blockquote>
		                                        @if(!empty($oddValue->date))<div class="label label-info">{{ date('d M, Y', $oddValue->date) }}</div>@endif <a href="{{ URL::to('news/news_centre_latest_media_news_details?show='.$oddValue->id) }}" target="_blank">{{ stripslashes($oddValue->title) }}</a> 
		                                        <small><cite title="Source Title">{{ $oddValue->footer }}</cite></small>
		                                    </blockquote>
		                                    @endforeach
		                                </div>
		                            @endif
		                            
		                        @else
		                        	<p>There is no news at the moment.</p>
		                        @endif
		                    </div>
						@endfor
					</div>
					<!-- end panels -->
	           </div>
			</div>
		      
			<script type="text/javascript">
				$("#twitter-bootstrap-tabs").easytabs({ defaultTab: "li#month-tab-" + {{ $near_month }} });
			</script>
		</div>
	</div>

	<i class="icon-bullhorn right"></i>
</div>
<!-- End Info white -->

@stop