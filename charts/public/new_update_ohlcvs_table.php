<?php

try {
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'lienhoecorporati_lhchart');
	define('DB_PASSWORD', '777aJuyiGq9z');
	define('DB_DATABASE', 'lienhoecorporati_charts');
	$connection = mysql_connect(DB_SERVER, DB_USERNAME,DB_PASSWORD) or die(mysql_error());
	$database = mysql_select_db(DB_DATABASE) or die(mysql_error());
	
	$fp = fopen('new_log_file_update_ohlcvs.txt', 'w');
	fwrite($fp, 'Update ohlcvs table start point- date time- '.date('Y-m-d H:i:s'));

	$sql_ohlcvs = mysql_query("SELECT id,open,high,low,date,close,last_done FROM ohlcvs WHERE open=0 AND high=0 AND low=0 order by id desc");

	$i = 0;
	while($row_ohlcvs = mysql_fetch_assoc($sql_ohlcvs)) {
		if(!empty($row_ohlcvs['last_done'])) {

			fwrite($fp, 'Going into the else point--');
			$ohlcvs_id = $row_ohlcvs['id'];
			$open = $row_ohlcvs['open'];
			$high = $row_ohlcvs['high'];
			$low = $row_ohlcvs['low'];
			$last_done = $row_ohlcvs['last_done'];
			fwrite($fp, 'Before update the data ohlcvs_id='.$ohlcvs_id.'open='.$open.'high='.$high.'low='.$low.'last_done='.$last_done);
			if($open == 0 && $high == 0 && $low == 0) {
			fwrite($fp, 'ohlcvs_id='.$ohlcvs_id.'open='.$open.'high='.$high.'low='.$low.'last_done='.$last_done);
			
			$resnew = mysql_query("update ohlcvs set open='".$last_done."', high='".$last_done."', low='".$last_done."' where id=".$ohlcvs_id);
			fwrite($fp, 'resnew response='.$resnew);
            
		}
    }
    fclose($fp);
}
} catch(\Exception $e) {
    fwrite($fp, 'error message='.$e->getMessage());
    fclose($fp);
	echo $e->getMessage();
}
?>
