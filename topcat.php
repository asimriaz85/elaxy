<?php include("connection.php");
function get_top_cat($id=0){

   


	

    do{

        $subsql = "select id from `categories` where parent_off={$id}"; 

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
echo get_top_cat(7);
?>