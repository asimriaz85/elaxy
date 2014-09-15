<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE> Add/Remove dynamic rows in HTML table </TITLE>

<!--Date picker-->
   <link rel="stylesheet" href="jquery-ui.css" />
<script src="jquery-1.9.1.js"></script>
<script src="ui-1.10.2-jquery-ui.js"></script>

<script>
// jQuery
jQuery(document).ready(function($) {
  $('.datepicker').datepicker({
     autoclose: true
  });
});



</script>

    <SCRIPT language="javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 			
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
				
				
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
				
				newcell.className = 'datepicker';
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
							
							newcell.childNodes[0].className = "datepicker";
							
							
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
    </SCRIPT>

</head>

<body>
<INPUT type="button" value="Add Row" onclick="addRow('dataTable')" />
 
    <INPUT type="button" value="Delete Row" onclick="deleteRow('dataTable')" />
 
    <TABLE id="dataTable" width="350px" border="1">
        <TR>
            <TD><INPUT type="checkbox" name="chk"/></TD>
            <TD><INPUT type="text" name="txt" class="datepicker"/></TD>
            <TD>
                <SELECT name="country">
                    <OPTION value="in">India</OPTION>
                    <OPTION value="de">Germany</OPTION>
                    <OPTION value="fr">France</OPTION>
                    <OPTION value="us">United States</OPTION>
                    <OPTION value="ch">Switzerland</OPTION>
                </SELECT>
            </TD>
        </TR>
        </TABLE>
</body>
</html>