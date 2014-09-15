<?php

$db_name = "elaxy";  //mysql name
$db_host = "localhost"; //mysql host
$db_user = "root";  //mysql user
$db_pass = "";	//mysql password

$db = mysql_connect($db_host,$db_user,$db_pass) or die(mysql_error());
mysql_select_db($db_name,$db) or die(mysql_error());

//$sLanguage="english";
//define('DIR_WS','http://shiraz.wcukdev.co.uk/redkite/site/',true);
//define('TITLE','Admin Panel');
//define('ADMIN_EMAIL','test@hotmail.co.uk');
?>