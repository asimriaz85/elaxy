<?php session_start();
require_once('../connection.php');
if(isset($_POST['login']))
{
$usernam  = mysql_real_escape_string($_POST['user']);
$passw = mysql_real_escape_string($_POST['pass']);


$sql="SELECT * FROM users WHERE username='{$usernam}' && password ='{$passw}'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$fetch = mysql_fetch_array($result);



if($count >0)
{
$_SESSION['username'] = $fetch['username'];
$_SESSION['userloginid'] = $fetch['id'];
$_SESSION['fullname'] = $fetch['fullname'];
$_SESSION['pk'] = $fetch['pk_number'];


header('Location:dashboard.php');


}
else
{
$_SESSION['er'] = "User Name or Password Mismatch";
header('Location:index.php?err=1');
}



}


?>