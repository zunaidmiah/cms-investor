<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'lienhoecorporati_lhchart');
define('DB_PASSWORD', '777aJuyiGq9z');
define('DB_DATABASE', 'lienhoecorporati_charts');

$connection = mysql_connect(DB_SERVER, DB_USERNAME,DB_PASSWORD) or die(mysql_error());
$database = mysql_select_db(DB_DATABASE) or die(mysql_error());


$sql=mysql_query("SELECT * FROM charts where published=1");

while($q=mysql_fetch_assoc($sql))
	$result[]=$q;
echo json_encode($result);
?>
