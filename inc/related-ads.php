<div id="contant_area" style="width:700px;">
  <?php



$df='main_cat_id';


$rel_id=get_related_sub_cat($mainct);


$tbl_name="postcode_location";



$adjacents = 3;



$sql_search_view1 = "SELECT * FROM postcode_location INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id WHERE postcode_location.status ='1' AND postcode_location.$df=".$sub_cat_id." AND postcode_location.id !=".$newpostid;
//$sub_cat_id;


$total_pages = mysql_query($sql_search_view1);
$total_num_rows=mysql_num_rows($total_pages);
 $total_pages = $total_num_rows;
 $page = !empty($_GET['page']) ? $_GET['page'] : 1; // Setting a default value to the page
	
	$per_page = 10; // message to show per page
 
 $pagination = new Pagination($page, $per_page, $total_num_rows); // create an object of clas agination	
	// end of pagination default variables 

 $sql_search_view = "SELECT * FROM postcode_location INNER JOIN ad_title_description ON ad_title_description.postcode_loaction_id = postcode_location.id WHERE postcode_location.status ='1' AND postcode_location.$df=".$sub_cat_id." AND postcode_location.id !=".$newpostid." LIMIT {$per_page} OFFSET {$pagination->offset()}";	
$result_search_view = mysql_query($sql_search_view);
	$num_rows_views=mysql_num_rows($result_search_view);

 	

	if($num_rows_views >0){

		while($row_search_view = mysql_fetch_array($result_search_view))

		{

			$user_id=$row_search_view['user_id'];

			 $post_id=$row_search_view['postcode_loaction_id'];

			

			$published_date=$row_search_view['date'];

			$town=$row_search_view['town'];

			

			

			$daysago = (strtotime($cdate) - strtotime($published_date)) / (60 * 60 * 24);

			

			 $select_image_query="SELECT postcode_loaction_id,file_name FROM users_images WHERE postcode_loaction_id='".$post_id."'  ";

			$run_image_query=mysql_query($select_image_query);

			

			$fetch_image_query=mysql_fetch_array($run_image_query);

			 $image_name=$fetch_image_query['file_name'];

			//End Image//

			

			

			$title=$row_search_view['title'];
			$url=$row_search_view['url'];

			$description=$row_search_view['description'];

			

			//End Title Description//

			

			$feature_name=$row_search_view['name'];

				$feature_price=$row_search_view['item_price'];

				$ad_price_days=$row_search_view['days'];

				

				

				$email="SELECT email,phone FROM registration WHERE id='".$user_id."'";

				$run_email=mysql_query($email);

				$fetch_email=mysql_fetch_array($run_email);

				$email_id=$fetch_email['email'];

				$phone=$fetch_email['phone'];

?>


  <section class="listing-box">
    <div class="list-image"><?php if(!empty($image_name)) { ?><a href="http://elaxy.co.uk/ad/<?=$url?>"><img src="/uploads/<?php echo $image_name; ?>" width="121" height="84" alt="" /></a> <?php } else { ?><img src="/images/noimage_thumbnail.png" width="121" height="84" alt="" />  <?php } ?></div>
    <div class="list-detail">
      <div class="list-hd"><a href="http://elaxy.co.uk/ad/<?=$url?>"><?php echo $title; ?></a></div>
      <div class="list-cnt"><?php echo substr($description, 0, 70)."....."; ?></div>
      <div class="list-loc"><?php echo $town; ?></div>
    </div>
    <?php if($feature_name!="Free Ad"){ ?>
    <div class="list-feature" style="display:none;"> <?php echo $feature_name;   ?></div>
    <?php } ?>
    <div class="list-star"></div>
    <div class="list-pricing">
   
	 <?php if($mainct == 4) { ?>
                   
                    <?php } else if ($mainct == 5){ ?>
                    <?php } else if ($mainct == 9){ ?>
                    
                    <?php } else if ($mainct == 8){ ?>
                     <?php } else if ($mainct == 84){ ?>
                    
                    <?php } else if ($mainct == 85){ ?>
                    <?php } else { ?>
                   <?php echo "&pound;".$feature_price; ?>
                    <?php } ?>
	
    
    
     <span><?php echo $daysago." "."days ago"; ?></span></div>
    <span>
    <?php //echo $phone; ?>
    </span> </section>
  <?php }  

 }  else{ ?>
  <?php echo "Sorry no result found"; } ?> <br />
  <br />
  <div class="clear"></div>
  <div style="margin-top:15px;"><?php
  $targetpage =  "http://elaxy.co.uk/ad/".$_GET['url']."/page"; ?>
   <div class="pagination">
   <?php
   if($pagination->total_pages() > 1) { // start of pageination code ?>
  
<?php
			if($page != 1){
			if($pagination->has_previous_page()) { 
				
				
					echo "<li><a href=\"$targetpage/";
					echo $pagination->previous_page();
				echo "\">&laquo; Previous</a></li> "; 
				}
				
			}// End of if sttarment
			
			}
			for($i=1; $i <= $pagination->total_pages(); $i++) { // for looop to count number of"." pages to be displayed
					if($i == $page) {
						
						echo "<li class='active'><a href='#'> {$i} </a> </li> ";
						
					} else {																								
						echo "<li> <a href=\"$targetpage/{$i}\"> {$i} </a> </li>";
						} 
					
			}// End of for loop
			if($pagination->has_next_page()) { 
					echo "<li> <a href=\"$targetpage/";

					echo $pagination->next_page();
					echo "\">Next &raquo;</a></li> "; 
					
					
					
			}// end of if steatemetn
		echo "</div>";
		
		// End of pagination code	 ?></div></div>
  <div id="demo3"> </div>
</div>
<?php
function get_related_sub_cat($id=0){
   
    $ids = $id;
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