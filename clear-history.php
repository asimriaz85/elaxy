<?php session_start();
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = $_GET["return_url"]; //return url
	session_destroy();
	header('Location:'.$return_url);
}
?>