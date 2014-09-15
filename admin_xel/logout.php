<?php session_start();
$_SESSION['Login'] ='';
$_SESSION['er'] ='';
//unset($_SESSION['userlogin']);
unset($_SESSION['username']);

header('Location:index.php');
?>
