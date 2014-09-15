<?php

//include("checklogin.php");
include("connection.php");
$sql="select name,parent_off,cat_url, count(cat_url) as counter from categories
Group by name Having (count(cat_url) > 1)";
$query=mysql_query($sql);

$rs=mysql_fetch_array($query);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Duplicate</title>
</head>

<body>

<table width="350" border="0" align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
  <tr>
    <td><strong>MR Number</strong></td>
    <td><strong>Name</strong></td>
    <td><strong>Count</strong></td>
    <td>&nbsp;</td>
  </tr>
  <?php do { ?>
  <tr>
    <td><strong>
      <?=$rs['name']?>
    </strong></td>
    <td><strong>
      <?=$rs['cat_url']?>
    </strong></td>
    <td><strong>
      <?=$rs['counter']?>
    </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4" valign="top"><table width="350" border="0" align="center" style="border:1px solid #03C;">
      
      <?php $listsql=mysql_query("select cat_url,name from categories where cat_url='".$rs['cat_url']."'");
	  		$rssql=mysql_fetch_array($listsql);
	  do {
	   ?>
      <tr>
        <td><?=$rssql['name']?></td>
        <td><?=$rssql['cat_url']?></td>
        <td>&nbsp;</td>
        </tr>
     <?php } while($rssql=mysql_fetch_array($listsql)); ?>
    </table></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  
  <?php } while($rs=mysql_fetch_array($query)); ?>
</table>
</body>
</html>