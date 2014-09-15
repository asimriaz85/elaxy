// JavaScript Document

<!-- Begin
function delcheck(fd){

	var conf=false;

	for (i = 0; i < fd.length; i++){
				if(fd[i].checked==true){
		 		conf=confirm('Are you sure to delete these records');
				break;
				}
	            }

		if(conf){
		document.myform.submit();
		}
        }

function checkAll(field)
    {

	for (i = 0; i < field.length; i++){
	field[i].checked = true ;
	
	}
    }

function uncheckAll(field)
    {
for (i = 0; i < field.length; i++)
	field[i].checked = false ;
    }
//  End -->
