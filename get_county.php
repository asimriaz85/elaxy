<?php require_once('lib/config.php');
require_once('lib/function.php');
$mod=new HomeListing();
 $models = $mod->GetSearchList("county",array('region_id'=>$_POST['cid'])); 
 ?><option value="">---Select---</option><?php
		  	foreach($models as $model){
					?>
                    <option value="<?php echo $model['id']; ?>"><?php echo $model['county_name']; ?></option>
                    <?php
			}
		  ?>