<?php

include('lib/config.php');

include('lib/db_setting.php');

include('lib/db.class.php');
include('lib/states.class.php');
include('lib/region.class.php');
include('lib/county.class.php');
$statelist=State_Class::find_all();


 ?>
 <h4>Select Location</h4>

Select Country: <select name="country">
<option value="">--Select--</option>
<?php $statelist=State_Class::find_all();

foreach($statelist as $state){
	?>
<option value="<?=$state->id?>"><?=$state->state_name?></option>	
	<?php }
	
	 ?>

</select>

Select Region:
<select name="region">
<option value="">--Select--</option>


</select>

Select County:
<select name="county">
<option value="">--Select--</option>


</select>
<br>
<br>
Select Town:
<select name="town">
<option value="">--Select--</option>


</select>


<script type="text/javascript">

$( "select[name=country]" ).change(function () {
  var str = "";
  //$( "select[name=make] option:selected" ).each(function() {
     str = $("select[name=country] option:selected").attr("value");
		$.post("get_region.php",{cid:str},function(result){
			$("select[name=region]").html(result);
		  });	  
    //});
  });

$( "select[name=region]" ).change(function () {
  var str = "";
  //$( "select[name=make] option:selected" ).each(function() {
     str = $("select[name=region] option:selected").attr("value");
		$.post("get_county.php",{cid:str},function(result){
			$("select[name=county]").html(result);
		  });	  
    //});
  });
  
  $( "select[name=county]" ).change(function () {
  var str = "";
  //$( "select[name=make] option:selected" ).each(function() {
     str = $("select[name=county] option:selected").attr("value");
		$.post("get_town.php",{cid:str},function(result){
			$("select[name=town]").html(result);
		  });	  
    //});
  });
</script>