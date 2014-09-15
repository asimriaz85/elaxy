
<?php include("include/header.php"); ?>

<script language='javascript'>
    
function main() {
	
	alert(main);
    for (var i = 1; i < 6; i++)
        document.getElementById(i).addEventListener('click', loadText);
    
    function loadText() {
        document.getElementById('inputboxID').value = this.innerHTML || this.innerText;
    }
}
    
</script>

<div id="abc">
        <input type="text" name="inputbox" id="inputboxID" class="inptBx"/>
        <ol>
            <li id="1">sam</li>
            <li id="2">joe</li>
            <li id="3">dan</li>
            <li id="4">tom</li>
            <li id="5">dick</li>
        </ol>
    </div>
    <!-- call the javascript function above, after all of the html content is loaded -->
    <script>main();</script>
    
    
    
    
    
    

</body>
</html>