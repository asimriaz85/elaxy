<!DOCTYPE html>
<html>
<head>
<?php // require_once('inc/meta.php'); ?>
 <link rel="stylesheet" href="main.css">
 
 <style>
     ul{
         list-style:none;
     }
</style>

</head>

<body>
<?php  include("connection.php");




$url = $_GET['url'];
if($url == 'all'){
	$sql = "SELECT * FROM `categories` where parent_off =0 group by cat_url  ";
	} else {
$sql = "SELECT * FROM `categories` WHERE cat_url = '{$url}' group by cat_url ";		
		}

$rs = mysql_query($sql);

while($res = mysql_fetch_array($rs)){
	$catid = $res['id'];
	$subid = $res['parent_off'];
	$main[$res['id']]=  '<a href="test.php?url='.$res['cat_url'].'">'.$res['name'] . '</a>';
	
	
	$sql1 = "SELECT * FROM `categories` WHERE parent_off= " . $res['id'];
	$rs1 = mysql_query($sql1);
	while($res1 = mysql_fetch_array($rs1)){
		//echo '<a href="test.php?url='.$res1['cat_url'].'">'.$res1['name'] . '</a> ('.($res1['countt']).')<br>';
		
		
	}	
}
//echo '<br><br><br>';

	if($url != all){
        echo '<ul><li><a href="test.php?url=all">All Cats</a><br></li>';

            $pid = $catid;
        do{
            $sql3 = "SELECT * FROM `categories` WHERE id =" . $pid." group by cat_url ";

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
               
                echo '<li><a href="test.php?url='.$ex[2].'">'.$ex[1].'</a></li>';  
                              
            } else {
                
                
                echo '<li>' . $ex[1] . '</li>';
                $sql1 = "SELECT * FROM `categories` WHERE parent_off= " . $ex[0];
                
                $rs1 = mysql_query($sql1);
                while($res1 = mysql_fetch_array($rs1)){
                    
                // count
                    
                    // get all the sub cats of current id
                        $ids = get_sub_cat($res1['id']);
                    // end of getting all sub cats
                    
                    $sqlcount = "select count(id) from  `postcode_location` WHERE main_cat_id IN (" .$ids . ")" ;
                    $rscount = mysql_query($sqlcount);
                    $rescount = mysql_fetch_array($rscount);
                // end cout                    
                
                    echo '<li><a style="margin-left:10px;" href="test.php?url='.$res1['cat_url'].'">'.$res1['name']. ' id = '.$res1['id'] . '</a> ('.$rescount[0].') </li>';


                }  
                echo '</ul></li>';
            }



            }
    } else {
       
    echo '<ul>';
        foreach($main as $key=>$m){
                    $ids = get_sub_cat($key);
                    $sqlcount = "select count(id) from  `postcode_location` WHERE main_cat_id IN (" . $ids . ")";
                    $rscount = mysql_query($sqlcount);
                    $rescount = mysql_fetch_array($rscount);            
            echo '<li>' . $m . '(' . $rescount[0] . ') </li>';
        }
        echo '</ul>';
    }

    
    


function get_sub_cat($id=0){
   
    $ids = $id;
    
    // Add this line to the function 
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
