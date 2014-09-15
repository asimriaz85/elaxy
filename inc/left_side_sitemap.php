<style>
.menu_container {
 	width: 248px;
}
.menu_head {
	/*background: url(images/red.png) brown;*/
	background-color:#778811;
    color: white;
    cursor: pointer;
    font-family: arial;
    font-size: 14px;
	margin: 0 0 1px 0;
    padding: 7px 11px;
	font-weight: bold;
}
.menu_body {
	/*background: lightgray;*/
}
.menu_body p{
	padding: 5px;
	margin: 0px;
}
.plusminus{
	float:right;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(".menu_body").hide();
	//toggle the componenet with class menu_body
	$(".menu_head").click(function(){
		$(this).next(".menu_body").slideToggle(600); 
		var plusmin;
		plusmin = $(this).children(".plusminus").text();
		
		if( plusmin == '+')
		$(this).children(".plusminus").text('-');
		else
		$(this).children(".plusminus").text('+');
	});
});
</script>


<section class="left_search">

<div id="container">

<div class="menu_container">
		<p class="menu_head" style="color:#FFF;">Cities<span class="plusminus">+</span></p>
			<div class="menu_body" style="display: none;">
		       <?php
            $query="select * from  county ORDER BY county_name";
			$run_query=mysql_query($query) or die(mysql_error());
		   ?>

<div class="sitemap_county">
<ul>
                        <tr>
                          <?php
		
		   
		   
           while($fetch=mysql_fetch_array($run_query)){
			   
			    
			
			?>
                   <li><?php echo $fetch['county_name']; ?></li>
                   
                   
                          <?php
			
			}
	?>
                        </tr>
                      </ul></div>
			</div>
		<p class="menu_head" style="color:#FFF;">Region<span class="plusminus">+</span></p>
			<div class="menu_body" style="display: none;">
			<p><?php
            $query_region="select * from   region ORDER BY region_name";
			$run_query_region=mysql_query($query_region) or die(mysql_error());
		   ?>

<table width="150" border="0" cellspacing="5" cellpadding="2" style="color:#FFF;">
                        <tr>
                          <?php
		
		   
		   
           while($fetch_region=mysql_fetch_array($run_query_region)){
			   
			    
			if($num_region >=2){
			$num_region=0;
			echo "</tr><tr>";
}
			?>
                          <td width="100" height="82"><table width="58" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="94%"><?php echo $fetch_region['region_name']; ?></td>
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
                      </table></p>
			</div>
	</div>
 
 
  
 
</div>
       
       
       
          

</section>