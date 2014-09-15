<?php

$hostname="localhost";

$username="elaxyco_elaxy";

$password="elaxy";

$db_name="elaxyco_elaxy";

$con=mysql_connect("$hostname","$username","$password") or die(mysql_error("Database Not Connected"));

//$select=mysql_select_db("$db_name",$con)or die(mysql_error("Database Not Selected"));

$selec=mysql_select_db($db_name,$con)or die(mysql_error("Database Not Selected"));



?>