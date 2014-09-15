<style>
h2, p, ol, ul, li {
    margin:0px;
    padding:0px;
    font-size:13px;
    font-family:Arial, Helvetica, sans-serif;
}
 
#container {
   /* width:300px; */  
    /*margin:auto;*/
    margin-top:100px;
}
 
/* --------- COLLAPSIBLE PANELS ----------*/
 
.expandable-panel {
    width:100%;
    position:relative;
    min-height:50px;
    overflow:auto;
    margin-bottom: 20px;
    border:1px solid #999;
}  
.expandable-panel-heading {
    width:100%;
    cursor:pointer;
    min-height:50px;
    clear:both;
    background-color:#E5E5E5;
    position:relative;
}
.expandable-panel-heading:hover {
    color:#666;
}
.expandable-panel-heading h2 {
    padding:14px 10px 9px 15px;
    font-size:18px;
    line-height:20px;
}
.expandable-panel-content {
    padding:0 15px 0 15px;
    margin-top:-999px;
}
.expandable-panel-content p {
    padding:4px 0 6px 0;
}
.expandable-panel-content p:first-child  {
    padding-top:10px;
}
.expandable-panel-content p:last-child {
    padding-bottom:15px;   
}
.icon-close-open {
    width:20px;
    height:20px;
    position:absolute;
    background-image:url(images/icon-close-open.png);
    right:15px;
}
.expandable-panel-content img {
    float:right;
    padding-left:12px;
}
.header-active {
    background-color:#D0D7F3;
}
</style>

<script>
	(function($) {
    $(document).ready(function () {
        /*-------------------- EXPANDABLE PANELS ----------------------*/
        var panelspeed = 500; //panel animate speed in milliseconds
        var totalpanels = 3; //total number of collapsible panels  
        var defaultopenpanel = 0; //leave 0 for no panel open  
        var accordian = false; //set panels to behave like an accordian, with one panel only ever open at once     
  
        var panelheight = new Array();
        var currentpanel = defaultopenpanel;
        var iconheight = parseInt($('.icon-close-open').css('height'));
        var highlightopen = true;
          
        //Initialise collapsible panels
        function panelinit() {
                for (var i=1; i<=totalpanels; i++) {
                    panelheight[i] = parseInt($('#cp-'+i).find('.expandable-panel-content').css('height'));
                    $('#cp-'+i).find('.expandable-panel-content').css('margin-top', -panelheight[i]);
                    if (defaultopenpanel == i) {
                        $('#cp-'+i).find('.icon-close-open').css('background-position', '0px -'+iconheight+'px');
                        $('#cp-'+i).find('.expandable-panel-content').css('margin-top', 0);
                    }
                }
        }
  
        $('.expandable-panel-heading').click(function() {          
            var obj = $(this).next();
            var objid = parseInt($(this).parent().attr('ID').substr(3,2)); 
            currentpanel = objid;
            if (accordian == true) {
                resetpanels();
            }
              
            if (parseInt(obj.css('margin-top')) <= (panelheight[objid]*-1)) {
                obj.clearQueue();
                obj.stop();
                obj.prev().find('.icon-close-open').css('background-position', '0px -'+iconheight+'px');
                obj.animate({'margin-top':0}, panelspeed);
                if (highlightopen == true) {
                    $('#cp-'+currentpanel + ' .expandable-panel-heading').addClass('header-active');
                }
            } else {
                obj.clearQueue();
                obj.stop();
                obj.prev().find('.icon-close-open').css('background-position', '0px 0px');
                obj.animate({'margin-top':(panelheight[objid]*-1)}, panelspeed);
                if (highlightopen == true) {
                    $('#cp-'+currentpanel + ' .expandable-panel-heading').removeClass('header-active');  
                }
            }
        });
          
        function resetpanels() {
            for (var i=1; i<=totalpanels; i++) {
                if (currentpanel != i) {
                    $('#cp-'+i).find('.icon-close-open').css('background-position', '0px 0px');
                    $('#cp-'+i).find('.expandable-panel-content').animate({'margin-top':-panelheight[i]}, panelspeed);
                    if (highlightopen == true) {
                        $('#cp-'+i + ' .expandable-panel-heading').removeClass('header-active');
                    }
                }
            }
        }
              
  
        $(window).load(function() {
            panelinit();
        }); //END LOAD
    }); //END READY
})(jQuery);
	</script>
<section class="left_search">

<div id="container">
    <div class="expandable-panel" id="cp-1">
        <div class="expandable-panel-heading">
            <h2>Cities<span class="icon-close-open"></span></h2>
         </div>
        <div class="expandable-panel-content">
        <?php
            $query="select * from  county ORDER BY county_name";
			$run_query=mysql_query($query) or die(mysql_error());
		   ?>

<table width="150" border="0" cellspacing="5" cellpadding="2" style="color:#FFF;">
                        <tr>
                          <?php
		
		   
		   
           while($fetch=mysql_fetch_array($run_query)){
			   
			    
			if($num >=2){
			$num=0;
			echo "</tr><tr>";
}
			?>
                          <td width="100" height="82"><table width="58" border="0" cellspacing="0" cellpadding="0">
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
        </div>
    </div>
     
    <div class="expandable-panel" id="cp-2">
        <div class="expandable-panel-heading">
            <h2>Region<span class="icon-close-open"></span></h2>
         </div>
        <div class="expandable-panel-content">
            <?php
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
                      </table>
             
        </div>
  </div>
     
  
 
</div>
       
       
       
          

</section>