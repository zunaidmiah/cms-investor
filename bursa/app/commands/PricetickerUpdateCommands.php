<?php
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
 
class PricetickerUpdateCommands extends Command{
	
	protected $name = 'priceTicker:cron'; 
    protected $description = 'Command description';  
    public function __construct(){
        parent::__construct();
    } 
    public function fire(){     
		
		   $today = date('Y-m-d');
           $prevCloseData = DB::connection('charts')->select('SELECT close FROM ohlc WHERE "'.$today.'" !=STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `id` DESC LIMIT 0,1');
           $openData = DB::connection('charts')->select('SELECT open FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `id` LIMIT 0,1');
           $dayHighData = DB::connection('charts')->select('SELECT high FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `high` DESC LIMIT 0,1');
           $dayLowData = DB::connection('charts')->select('SELECT low FROM ohlc WHERE "'.$today.'" =STR_TO_DATE(`date`,"%d-%m-%Y") ORDER BY `low` LIMIT 0,1'); 
            $stockdata = DB::connection('charts')->select('SELECT * FROM ohlc ORDER BY `id` DESC LIMIT 0,2'); 
            $yearLastDay = date('Y-m-d', strtotime('-1 year')); 
            $stockhighlowwk = DB::connection('charts')->select("SELECT `id`,`high`,`low`,`date`,MAX(`high`) as maxclose,MIN(NULLIF(`low`, 0)) as minclose,now(),DATEDIFF(now(),STR_TO_DATE(`date`,'%d-%m-%Y  %H:%i:%s')) as nodays FROM `ohlcvs` WHERE date > '".$yearLastDay."'");          
            $laststockdata = DB::connection('charts')->select('SELECT * FROM ohlcvs ORDER BY `id` DESC LIMIT 0,1');
             
            $prevClose = number_format($prevCloseData[0]->close,3);
            $open = number_format((isset($stockdata[0])) ? $stockdata[0]->open : 0,3);
            $dayHigh = number_format((isset($stockdata[0])) ? $stockdata[0]->high : 0,3);
            $dayLow = number_format((isset($stockdata[0])) ? $stockdata[0]->low : 0,3);
            $weekHigh = number_format($stockhighlowwk[0]->maxclose,3);
            $weekLow = number_format($stockhighlowwk[0]->minclose,3);
            $volumeTraded = $stockdata[0]->volume;
            $valueTraded = $volumeTraded * $open;
            $price = number_format($stockdata[0]->close,3);
            $change = number_format($stockdata[0]->adj,3);
            $changePercentage = number_format($stockdata[0]->percentage_change,3); 
            $quotelastupdated = $stockdata[0]->date; 
			/* **************************************************** */
			$chart_vals = DB::connection('klsescreener_charts')->select('SELECT * FROM klsescreener_charts ORDER BY CAST(`created_datetime` AS DATE) DESC LIMIT 0,1');					
			//$chart_vals = DB::connection('klsescreener_charts')->select('SELECT * FROM klsescreener_charts ORDER BY `id` DESC LIMIT 0,1');
			//$chart_vals = DB::connection('klsescreener_charts')->select('SELECT * FROM klsescreener_charts ORDER BY `created_datetime` DESC LIMIT 0,1');
	 $page = Page::where('type', '=', 'priceticker')->where('published', '=', 1)->get();
	 $left_block1_content = $page[0]->left_block1_content; 
	 $left_block1_content='<table class="table table-striped pricepicket-tbl">
	<colgroup>
		<col width="1" />
		<col width="1" />
		<col width="1" />
		<col width="1" />
	</colgroup>
	<tbody>
		<tr>
			<td>Previous Close</td>
			<td><b id="prevclose">'.$prevClose.'</b></td>
			<td>Volume Traded</td>
			<td><strong id="voltraded">'.$volumeTraded.'
</strong></td>
		</tr>
		<tr>
			<td>Open</td>
			<td><strong id="stockopen">'.$open.'</strong></td>
			<td>Market Capitalisation (million)</td>
			<td><strong>'.$chart_vals[0]->market_cap.'</strong></td>
		</tr>
		<tr>
			<td>Day"s High</td>
			<td><strong id="dayhigh">'.$dayHigh.'</strong></td>
			<td>Par Value</td>
			<td><strong id="parvalue">1.000</strong></td>
		</tr>
		<tr>
			<td>Day"s Low</td>
			<td><strong id="daylow">'.$dayLow.'</strong></td>
			<td>Shares per Lot</td>
			<td><strong id="shareperlot">1000</strong></td>
		</tr>
		<tr>
			<td>52 Weeks High</td>
			<td><strong id="weekhigh">'.$weekHigh.'</strong></td>
			<td>No. of Shares Issued (million)</td>
			<td><strong id="marketcap">'.$chart_vals[0]->Shares_mil.'</strong></td>
		</tr>
		<tr>
			<td>52 Weeks Low</td>
			<td><strong id="weeklow">'.$weekLow.'</strong></td>
			<td> </td>
			<td> </td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td> </td>
			<td> </td>
			<td> </td>
			<td> </td>
		</tr>
	</tfoot>
</table> 
';
		$page_data = Page::find($page[0]->id);
		$page_data->left_block1_content = $left_block1_content;
		$page_data->left_block2_title = '<div class="pull-left"><p>All Prices Are Quoted In Ringgit Malaysia.<br /></p></div><div class="pull-right"><p>Quotes Last Updated: <span id="quotelastupdated">'.$quotelastupdated.'</span></p></div><div class="clearfix"></div>';  
		$page_data->save(); 
    }  
}
?>   