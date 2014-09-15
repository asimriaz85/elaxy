<section class="left_search">













<ul id="list" class="leftside_ul">

<?php



if(empty($get_postcode))

{

$url = $_GET['caturl'];

}else

{

	$url = "all";

	}

if($url == 'all'){

	$sql = "SELECT * FROM `categories` where parent_off =0 group by cat_url";

	} else {

$sql = "SELECT * FROM `categories` WHERE cat_url = '{$url}' group by cat_url ";		

		}



$rs = mysql_query($sql);



while($res = mysql_fetch_array($rs)){

	$catid = $res['id'];

	$subid = $res['parent_off'];

	$main[$res['id']]=  '<a href="/cat/'.$res['cat_url'].'" style="color:#fff; font-size:14px;">'.$res['name'] . '</a>';

	

	

	$sql1 = "SELECT * FROM `categories` WHERE parent_off= " . $res['id']." order by name asc";

	$rs1 = mysql_query($sql1);

	

	while($res1 = mysql_fetch_array($rs1)){

		//echo '<a href="/cat/'.$res1['cat_url'].'">'.$res1['name'] . '</a> ('.($res1['countt']).')<br>';

		

		

	}	

}

//echo '<br><br><br>';



	if($url != all){

        echo '<ul><li><a href="/cat/all" style="color:#fff; font-size:16px;">All Categories</a><br></li>';



            $pid = $catid;

        do{

            $sql3 = "SELECT * FROM `categories` WHERE id =" . $pid." group by cat_url order by name asc";



            $rs3 = mysql_query($sql3);

            $res3 = mysql_fetch_array($rs3);

            $arr[] = $res3['id'] .'|'. $res3['name'] . '|' . $res3['cat_url'];

            $pid = $res3['parent_off'];		



        }while($pid !=0);

        //print_r($arr);

        krsort($arr);

        //print_r($arr);

        //echo '<br><br><br><br>';

         echo '<li><ul>';

        foreach($arr as $key=>$list){

            $ex = explode("|",$list);



            if($ex[2] != $url){

               

                echo '<li><a href="/cat/'.$ex[2].'" style="color:#fff;">'.$ex[1].'</a></li>';  

                              

            } else {

                

                

                echo '<li style="color:#fff;">' . $ex[1] . '</li>';

                $sql1 = "SELECT * FROM `categories` WHERE parent_off= " . $ex[0]." ORDER BY name ASC LIMIT 0,5";

                

                $rs1 = mysql_query($sql1);

                while($res1 = mysql_fetch_array($rs1)){

                      $ids = get_sub_cat($res1['id']);

                // count

                    $sqlcount = "select count(id) from  `postcode_location` WHERE main_cat_id IN (" .$ids . ") and status=1" ;

                    $rscount = mysql_query($sqlcount);

                    $rescount = mysql_fetch_array($rscount);

                // end cout                    

                

                    echo '<li style="color:#fff; font-size:12px;"><a style="margin-left:5px; color:#fff; font-size:12px;" href="/cat/'.$res1['cat_url'].'">'.$res1['name'] . '</a> ('.$rescount[0].') </li>';





                }  

                echo '</ul></li>';

            }







            }

    } else {

        

    echo '<ul>';

        foreach($main as $key=>$m){

         $ids = get_sub_cat($key);

                    $sqlcount = "select count(id) from  `postcode_location` WHERE main_cat_id IN (" . $ids . ")  and status=1";

                    $rscount = mysql_query($sqlcount);

                    $rescount = mysql_fetch_array($rscount);            

            echo '<li style="color:#fff;">' . $m . '(' . $rescount[0] . ') </li>';

        }

        echo '</ul>';

    }

	









	

?>



           

            <li id='more' style="cursor:pointer; color:#FFF;">View more</li>

           

           

     <?php 

	 

	           $sql2 = "SELECT * FROM `categories` WHERE parent_off= " . $ex[0]." order by name asc limit 5,300";

               

                $rs2 = mysql_query($sql2);

                while($res2 = mysql_fetch_array($rs2)){

                     $ids = get_sub_cat($res2['id']);

                     

                // count

                    $sqlcount = "select count(id) from  `postcode_location` WHERE main_cat_id IN (" . $ids . ")  and status=1";

                    $rscount = mysql_query($sqlcount);

                    $rescount = mysql_fetch_array($rscount);

                // end cout  

	 



	 

	 ?>      

           

           

           

            

        

  	 <li id="<?php echo $res2['id']; ?>" style="font-size:12px; display:none; margin-left:5px;"><a  style="color:#FFF;" href="http://elaxy.co.uk/cat/<?=$res2['cat_url'];?>"><?php echo $res2['name']; ?> (<?=$rescount[0]?>)</a></li>

	

           

      <?php } ?>

           

           

       

            <br /><li id='less' style='display:none; cursor:pointer; color:#000;'>View less</li>

            </li>

        </ul>

        </li>

        

        

        </li>

    </ul>

<script>

$('#more').click(function(){

    $('#more').css('display','none');

	<?php 

$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' ORDER BY name asc LIMIT 5,300";

$run_select_cat=mysql_query($select_cat);

while($fetch_select_cat=mysql_fetch_array($run_select_cat)){

	

	$cat_id=$fetch_select_cat['id'];

	?>

    $('#<?php echo $cat_id; ?>').css('display','block');

     <?php } ?> 

    $('#less').css('display','block');    

});

                 

$('#less').click(function(){

    $('#less').css('display','none');

	<?php 

$select_cat="SELECT * FROM categories WHERE parent_off='".$sub_cat_id."' ORDER BY name asc LIMIT 5,300";

$run_select_cat=mysql_query($select_cat);

while($fetch_select_cat=mysql_fetch_array($run_select_cat)){

	

	$cat_id=$fetch_select_cat['id'];

	?>

    $('#<?php echo $cat_id; ?>').css('display','none');

   <?php } ?>   

    $('#more').css('display','block');    

});

</script>







<section class="search-ad">



 

 <?php



 	if($_GET['searchby'] == 'town'){

		?>

        	<ul style="list-style:none"><li><a style="color:#FFF;" href="/search_result.php?region=<?php echo $_GET['region']; ?>&searchby=region"><?php echo $_GET['region']; ?></a>

            	<ul><li><a style="color:#FFF;" href="http://elaxy.co.uk/county/<?php echo $_GET['county'];?>/<?=$_GET['region']?>"><?php echo $_GET['county'];?></a></li></ul></li></ul>

        <?php

	} else 

	if($_GET['searchby'] == 'county'){

		?>

        	<ul style="list-style:none;">



            <li><a style="color:#FFF;" href="http://elaxy.co.uk/region/<?php echo $_GET['region']; ?>"><?php echo $_GET['region']; ?></a>

            

            	<ul style="list-style:none; color:#CCC;"><li><?=$_GET['county']?>

                <?php

								$county_id = mysql_query("select id from county where county_name = '" . mysql_real_escape_string($_GET['county']) . "'");

								$cid = mysql_fetch_array($county_id);

	

	

								$rs_by_county = mysql_query("select id, town_name from town where county_id = {$cid[0]} order by town_name asc");

								echo '<ul style="list-style:none;">';

								

								

								

								

								while($towns = mysql_fetch_array($rs_by_county)){

									$count_ads = mysql_query(" select count(id) from postcode_location where town ='{$towns['town_name']}' ");

								$numads = mysql_fetch_array($count_ads);

								if($numads[0] > 0){ $numadstext = " (" . $numads[0] . ")"; } else { $numadstext = ""; }

								?>

                                <li><a style="color:#FFF;" href="http://elaxy.co.uk/town/<?=$towns['town_name']?>/<?php echo $_GET['county'];?>/<?=$_GET['region']?>"><?php echo $towns['town_name'] . $numadstext; ?></a></li>

                                <?php

									

								}

								echo '</ul>';				

				?>

                </li></ul>

            </li>

            	

            </ul>

        <?php

	} else

 

 	if($_GET['searchby'] == 'region'){

		// IF region is selected

		?>

        <?php  $select_states="SELECT id,state_name FROM states ORDER BY state_name asc"; ?>



<ul class="leftside_ul" style="list-style:none;">

<li style="color:#000;">United Kingdom</li>

<?php 





$run_states=mysql_query($select_states);

while($fetch_states=mysql_fetch_array($run_states)){

	$state_id=$fetch_states['id'];

	$state_name=$fetch_states['state_name'];

	

	

	



?>

 <li style="margin-left:10px;"><a style="color:#FFF;" href="http://elaxy.co.uk/region/<?php echo $state_name;?>"><?php echo $state_name; ?></a>

 </li>        

        <?php

			$regionname = mysql_real_escape_string($_GET['region']);

			if($regionname == $state_name){

				if($state_id == 1 || $_GET['region'] == 'England'){

					$insql = '1,2,3,4,5,6,7,8,9';

				} else {

					$insql = "SELECT id FROM `region` WHERE region_name = '{$regionname}' ";	

				}

				$sql_counties = "select id, county_name from county where region_id IN($insql) order by county_name";

			

			   

				$rs_counties = mysql_query($sql_counties);

				$row_counties = mysql_num_rows($rs_counties);

				if($row_counties > 0){

					?><ul style="list-style:none;"><?php

					while($county = mysql_fetch_array($rs_counties)){

						

						$count_ads = mysql_query(" select count(id) from postcode_location where town IN(select town_name from town where county_id = ".$county[0].")  ");

						$numads = mysql_fetch_array($count_ads);

						if($numads[0] > 0){ $numadstext = " (" . $numads[0] . ")"; } else { $numadstext = ""; }

						?>

						   <li style="margin-left:10px;"><a style="color:#FFF;" href="http://elaxy.co.uk/county/<?php echo $county[1];?>/<?=$regionname?>"><?php echo $county[1] . $numadstext; ?></a>

		 </li> 

							

						<?php

					}

					?></ul><?php

				}

			}

		?>

        </ul>

        <?php

		

	}

 ?>

        <?php	

		

		// End of if region is select3ed

	} else {

		?>

<?php  $select_states="SELECT id,state_name FROM states ORDER BY state_name asc"; ?>



<ul class="leftside_ul" style="list-style:none;">

<li style="color:#000;">United Kingdom</li>

<?php 





$run_states=mysql_query($select_states);

while($fetch_states=mysql_fetch_array($run_states)){

	$state_id=$fetch_states['id'];

	$state_name=$fetch_states['state_name'];

	

	

	



?>

 <li style="margin-left:10px;"><a style="color:#FFF;" href="http://elaxy.co.uk/region=<?php echo $state_name;?>"><?php echo $state_name; ?></a>

 </li>        

        <?php

		if($state_id == 1){

			 $sql_counties = "select id, county_name from county where region_id IN(1,2,3,4,5,6,7,8,9) order by county_name asc";

		

		   

			$rs_counties = mysql_query($sql_counties);

			$row_counties = mysql_num_rows($rs_counties);

			if($row_counties > 0){

				?><ul style="list-style:none;"><?php

				while($county = mysql_fetch_array($rs_counties)){

					

					$count_ads = mysql_query(" select count(id) from postcode_location where town IN(select town_name from town where county_id = ".$county[0].")  ");

					$numads = mysql_fetch_array($count_ads);

					if($numads[0] > 0){ $numadstext = " (" . $numads[0] . ")"; } else { $numadstext = ""; }

					?>

					   <li style="margin-left:10px;"><a style="color:#FFF;" href="http://elaxy.co.uk/county/<?php echo $county[1];?>/<?=$state_name?>"><?php echo $county[1] . $numadstext; ?></a>

	 </li> 

						

					<?php

				}

				?></ul><?php

			}

		}

		?>

        <?php } ?>

 

</ul>

        <?php

		

	}

 ?>

 





</section>









<br />







	<section class="search-ad" >

    <!--<img src="images/web_protection-128.png" />-->

    <br />

  <div class="clear"></div>

    <?php if(isset($sub_cat_id)){  

	

	 $select_par="SELECT parent_off,name,id FROM categories WHERE id='".$sub_cat_id."' order by name asc";

	$run_par=mysql_query($select_par);

	

	$fetch_par=mysql_fetch_array($run_par);

	$parent_d=$fetch_par['parent_off'];

	$name=ucfirst($fetch_par['name']);
	$safid=get_sub_cat($sub_cat_id);

//$tipids=get_sub_cat();	

	 $select_tips="SELECT * FROM safity_tipds WHERE cat_id IN (".$safid.")";

	$run_tips=mysql_query($select_tips);

	$num_rows=mysql_num_rows($run_tips);

	$fetch_tips=mysql_fetch_array($run_tips);

	

	if($num_rows > 0){

	?>

    

    <div style="color:#FFF; font-size:16px; margin-bottom:15px;"><?php echo $name." "."Safity Tips"; ?></div>

    <?php } do { 
	$tips_des=$fetch_tips['tips_des']; ?>

    <div style="color:#FFF"><?php echo $tips_des ?></div>

    <?php } while($fetch_tips=mysql_fetch_array($run_tips)); } ?>

    

    <?php if(isset($parent_categories)){  

	

	 

	

	 $select_tips2="SELECT * FROM safity_tipds WHERE cat_id='".$parent_categories."'";

	$run_tips2=mysql_query($select_tips2);

	$fetch_tips2=mysql_fetch_array($run_tips2);

	$tips_des2=$fetch_tips2['tips_des'];

	?>

    <div style="color:#FFF"><?php echo $tips_des2 ?></div>

    <?php } ?>

    

    </section>

    

<?php if(!empty($left_ad['AdCode'])){ echo $left_ad['AdCode']; } else if(!empty($left_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $left_ad['Image']; ?>"> <?php } ?>

<?php if(!empty($left_ad['AdCode'])){ echo $left_ad['AdCode']; } else if(!empty($left_ad['Image'])){?><img src="admin_xel/media/upl_gallery/<?php echo $left_ad['Image']; ?>"> <?php } ?>

 </section>

 

 <?php 

 

 function get_sub_cat($id=0){

   

    $ids = $id;

	

	$res_ids[] = $ids;

	

    do{

        $subsql = "select id from `categories` where parent_off IN (" . $ids . ") "; 

        $subrs = mysql_query($subsql); 

        $row = mysql_num_rows($subrs);

        if($row > 0){

            while($res = mysql_fetch_array($subrs)){

                $res_ids[] = $res[0];

                $ids_to_search[] = $res[0];

            }

            $ids = implode(',',$ids_to_search);

            $ids_to_search = '';

        }

    }while($row !=0);

    

    return !empty($res_ids) ? implode(',',$res_ids) : 0;

    

}

 

 ?>