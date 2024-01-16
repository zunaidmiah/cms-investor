<?php

try {
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'lienhoecorporati_lhchart');
	define('DB_PASSWORD', '777aJuyiGq9z');
	define('DB_DATABASE', 'lienhoecorporati_charts');
	$connection = mysql_connect(DB_SERVER, DB_USERNAME,DB_PASSWORD) or die(mysql_error());
	$database = mysql_select_db(DB_DATABASE) or die(mysql_error());

$fp = fopen('log_file_update_ohlcvs.txt', 'w');
	fwrite($fp, 'Update ohlcvs table start point- date time- '.date('Y-m-d H:i:s'));

	$sql_ohlcvs = mysql_query("SELECT id,open,high,low,date,close,last_done FROM ohlcvs order by id desc");

	$i = 0;
	while($row_ohlcvs = mysql_fetch_assoc($sql_ohlcvs)) {
		if(empty($row_ohlcvs['last_done'])) {
			$ohlcvs_date = $row_ohlcvs["date"];
			$arr_ohlcvs_date_arr = explode(" ", $ohlcvs_date);

			$ohlcvs_date = $arr_ohlcvs_date_arr[0];
			$ohlcvs_time = $arr_ohlcvs_date_arr[1];

			//convert to date time
			$arr_ohlcvs_date = explode("-", $ohlcvs_date);
			$ohlcvs_date = $arr_ohlcvs_date[2]."-".$arr_ohlcvs_date[1]."-".$arr_ohlcvs_date[0];
			$ohlcvs_date_time = $ohlcvs_date." ".$ohlcvs_time;

			//convert to hour
			$arr_ohlcvs_time = explode(":", $ohlcvs_time);
			$ohlcvs_hour = $arr_ohlcvs_time[0];

			$sql_ohlc = "SELECT id,date,last_done FROM ohlc where date = '".$ohlcvs_date_time."' limit 1";
			$sql_ohlc_res = mysql_query($sql_ohlc);
			$row_ohlc_row = mysql_fetch_assoc($sql_ohlc_res);

			if(empty($row_ohlc_row['last_done'])) {
				$sql_ohlc = "SELECT id,date,last_done FROM ohlc where date like '".$ohlcvs_date." ".$ohlcvs_hour."%' limit 1";
				$sql_ohlc_res = mysql_query($sql_ohlc);
				$row_ohlc_row = mysql_fetch_assoc($sql_ohlc_res);
			}

			if(empty($row_ohlc_row['last_done'])) {
				$sql_ohlc = "SELECT id,date,last_done FROM ohlc where date like '".$ohlcvs_date."%' limit 1";
				$sql_ohlc_res = mysql_query($sql_ohlc);
				$row_ohlc_row = mysql_fetch_assoc($sql_ohlc_res);
			}

			$last_done = $row_ohlc_row['last_done'];

			if(empty($last_done)) {
				$last_done = $row_ohlcvs['close'];

			}
			$ohlcvs_id = $row_ohlcvs['id'];
			$res = mysql_query("update ohlcvs set last_done='".$last_done."' where id=".$ohlcvs_id);
		}
	}
} catch(\Exception $e) {
	echo $e->getMessage();
}
?>
