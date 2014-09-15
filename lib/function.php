<?php
class HomeListing{
public function home_listing($type=0){
	
	$sql_home=mysql_query("SELECT * FROM `stock` WHERE `Status` = {$type}");
	
	
	$row = mysql_num_rows($sql_home);
	if($row > 0){
 
	 	while($rs_home=mysql_fetch_array($sql_home)){
			 $result[] = $rs_home;
		}
	
	} else { $result[] = 'nothing found';}
	return $result;
	}
	public  function GetSearchList($table='',$val=array(),$cri='AND'){


		
			$query = $this->build_query($table,$val,$cri);
			$sql_home=mysql_query($query);
			
			
			$row = mysql_num_rows($sql_home);
			if($row > 0){
		 
				while($rs_home=mysql_fetch_array($sql_home)){
					 $result[] = $rs_home;
				}
			
			} else { $result[] = 'nothing found';}
			return $result;		
	
/*	$sql=mysql_query($query);
	$rs=mysql_fetch_array($sql);
	$count=mysql_num_rows($sql);
	if($count>0){
		do {
		
		
		} while($rs=mysql_fetch_array($sql)); 
		}else
		{
			
			echo "No Record";
		}*/
	
	}

	public function build_query($table="",$val_array=array(),$cri='AND',$oderby="DESC"){
		
		$i = 1;
		$query= "SELECT * FROM {$table}  ";		
		if(!empty($val_array)){
			foreach($val_array as $key=>$v){
				
				if(!empty($v) || $v != ""){
					if($i ==1){
						$query .= " WHERE " . $key . " = '" . $v . "'";
						$i = 2;
					} else {
						$query .= " ".$cri." " . $key . " = '" . $v . "' ";
					}
				}
			}
		}
		$query .= " ORDER BY '{$oderby}' ";
		return $query;		
	}
	
	public function GetName($table,$where,$value,$display){
		$query= mysql_query("SELECT * FROM {$table} WHERE ".$where."= ".$value." ");
		
		$rs=mysql_fetch_array($query);
		return $rs[$display];
		
		}

}

	function search_tables($query=array(),$stockid=0){
		$stock = array();
		
		if(!empty($query[0])){
			$rs = mysql_query("select Make_id from make where Make_Name LIKE '%{$query[0]}%' ");
			$row = mysql_num_rows($rs);
			if($row > 0){
				$makeids = mysql_fetch_row($rs);	
			}
		}
		
		if(!empty($query[1])){
			if(!empty($makeids)){
				$findin = implode(",",$makeids);
				$rs1 = mysql_query("select Model_Make from model where Model_Make IN ({$findin}) AND Model_Name LIKE '%{$query[1]}%' ");
				$row1 = mysql_num_rows($rs1);
				if($row1 > 0){
					$modids1 = mysql_fetch_row($rs1);	
					$findm = implode(",",$modids1);
					$rss = mysql_query("select * from stock where Make IN ({$findm}) ORDER BY stockid DESC");
					$rows = mysql_num_rows($rss);
					if($rows > 0){
						$stock = mysql_fetch_array($rss);
						$ressult = $stock;	
					}					
					
				}
			}
		} else {
			$findin = implode(",",$makeids);
			$rss = mysql_query("select * from stock where Make IN ({$findin}) ORDER BY stockid DESC");
			$rows = mysql_num_rows($rss);
			if($rows > 0){
				$stock = mysql_fetch_array($rss);
				$ressult = $stock;	
			}			
		}
		
		return $stock;		
		
	}

	function get_by_id($table,$req_filed = array(), $id_n_val=array()){
		$values = implode(",",$req_filed);
		$query= "SELECT $values FROM {$table} WHERE {$id_n_val[0]} = {$id_n_val[1]} ";
		$rs = mysql_query($query);
		$row = mysql_num_rows($rs);
		

		if($row > 0){
			$result = mysql_fetch_array($rs);	
			
			if(count($req_filed) == 1){
				return $result[0];
			} else {
				return $result;
			}			
			
		} else { $result = false; }
		
	}
	
	
	
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}	


function get_port_name($id){
	$query= "SELECT port_name from port where port_id={$id}";
		$rs = mysql_query($query);
		$row = mysql_fetch_array($rs);
	return $row['port_name'];
	
	}
	function get_country_name($id){
	$query= "SELECT country_name from country where country_id={$id}";
		$rs = mysql_query($query);
		$row = mysql_fetch_array($rs);
	return $row['country_name'];
	
	}

?>