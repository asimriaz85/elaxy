<?php
include("connection.php");
$query="select * from  county ORDER BY county_name";
		/*	$select=mysql_query("SELECT * FROM gallery $offset, $rowsPerPage");*/
			$run_query=mysql_query($query) or die(mysql_error());
		   ?>

<table width="80" border="0" cellspacing="5" cellpadding="2">
                        <tr>
                          <?php
		
		   
		   
           while($fetch=mysql_fetch_array($run_query)){
			   
			    
			if($num >=22){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td width="195" height="82"><table width="58" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="94%"><?php echo $fetch['county_name']; ?></td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                              </tr>
                          </table></td>
                          <?php
			 $num++;
			}
	?>
                        </tr>
                      </table>