<?php require_once('lib/config.php');
require_once('lib/function.php');
$mod=new HomeListing();
 $models = $mod->GetSearchList("town",array('county_id'=>$_POST['cid'])); 
 ?><option value="">---Select---</option><?php
		  	foreach($models as $model){
					?>
                    <option value="<?php echo $model['town_name']; ?>"><?php echo $model['town_name']; ?></option>
                    <?php
			}
		  ?>