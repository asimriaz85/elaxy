<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Demo Zip Code API</title>
        <link href="demo.css" rel="stylesheet" type="text/css" />
    </head>
	<body>
        <h1>
           Demo Zip Code API
    	</h1>
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="zipform">
            <label>Enter your ZIP Code: <input type="text" name="zipcode" size="6"   /></label>
            <br />
            <label>Select a distance in miles from this point:</label>
            <select name="distance">
                <option>5</option>
                <option<?php if($_POST['distance'] == "10") { echo " selected=\"selected\""; } ?>>10</option>
                <option<?php if($_POST['distance'] == "25") { echo " selected=\"selected\""; } ?>>25</option>
                <option<?php if($_POST['distance'] == "50") { echo " selected=\"selected\""; } ?>>50</option>
                <option<?php if($_POST['distance'] == "100") { echo " selected=\"selected\""; } ?>>100</option>
            </select>
            <br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        <br />
        <?php
			if(isset($_POST['submit'])) {
				if(empty($_POST['zipcode'])) {
					echo "<p><strong>You did not enter a properly formatted ZIP Code.</strong> Please try again.</p>\n";
				}
				elseif(!preg_match('/^[0-9]{1,3}$/', $_POST['distance'])) {
					echo "<p><strong>You did not enter a properly formatted distance.</strong> Please try again.</p>\n";
				}
				else {
					//connect to db server; select database
					$link = mysql_connect('localhost', 'elaxyco_elaxy', 'elaxy') or die('Cannot connect to database server');
					mysql_select_db('elaxyco_elaxy') or die('Cannot select database');
					
					//query for coordinates of provided ZIP Code
					if(!$rs = mysql_query("SELECT * FROM uk_postcodes WHERE postcode = '$_POST[zipcode]'")) {
						echo "<p><strong>There was a database error attempting to retrieve your ZIP Code.</strong> Please try again.</p>\n";
					}
					else {
						if(mysql_num_rows($rs) == 0) {
							echo "<p><strong>No database match for provided ZIP Code.</strong> Please enter a new ZIP Code.</p>\n";	
						}
						else {
							//if found, set variables
							$row = mysql_fetch_array($rs);
							$lat1 = $row['latitude'];
							$lon1 = $row['longitude'];
							$d = $_POST['distance'];
							$r = 3959;
							
							//compute max and min latitudes / longitudes for search square
							$latN = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(0))));
							$latS = rad2deg(asin(sin(deg2rad($lat1)) * cos($d / $r) + cos(deg2rad($lat1)) * sin($d / $r) * cos(deg2rad(180))));
							$lonE = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(90)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
							$lonW = rad2deg(deg2rad($lon1) + atan2(sin(deg2rad(270)) * sin($d / $r) * cos(deg2rad($lat1)), cos($d / $r) - sin(deg2rad($lat1)) * sin(deg2rad($latN))));
							
							//display information about starting point
							//provide max and min latitudes / longitudes
							echo "<table class=\"bordered\" cellspacing=\"0\">\n";
							echo "<tr><th>county</th><th>town</th><th>Lat</th><th>Lon</th><th>Max Lat (N)</th><th>Min Lat (S)</th><th>Max Lon (E)</th><th>Min Lon (W)</th></tr>\n";
							echo "<tr><td>$row[county]</td><td>$row[town]</td><td>$lat1</td><td>$lon1</td><td>$latN</td><td>$latS</td><td>$lonE</td><td>$lonW</td></tr>\n";
							echo "</table>\n<br />\n";
							
							//find all coordinates within the search square's area
							//exclude the starting point and any empty city values
							$query = "SELECT * FROM uk_postcodes WHERE (latitude <= $latN AND latitude >= $latS AND longitude <= $lonE AND longitude >= $lonW) AND (latitude != $lat1 AND longitude != $lon1) AND town != '' ORDER BY county, town, latitude, longitude";
							if(!$rs = mysql_query($query)) {
								echo "<p><strong>There was an error selecting nearby ZIP Codes from the database.</strong></p>\n";
							}
							elseif(mysql_num_rows($rs) == 0) {
								echo "<p><strong>No nearby ZIP Codes located within the distance specified.</strong> Please try a different distance.</p>\n";								
							}
							else {
								//output all matches to screen
								echo "<table class=\"bordered\" cellspacing=\"0\">\n";
								echo "<tr><th>City</th><th>State</th><th>ZIP Code</th><th>Latitude</th><th>Longitude</th><th>Miles, Point A To B</th></tr>\n";
								while($row = mysql_fetch_array($rs)) {
									echo "<tr><td>$row[county]</td><td>$row[town]</td><td>$row[postcode]</td><td>$row[latitude]</td><td>$row[longitude]</td><td>";
									echo acos(sin(deg2rad($lat1)) * sin(deg2rad($row['latitude'])) + cos(deg2rad($lat1)) * cos(deg2rad($row['latitude'])) * cos(deg2rad($row['longitude']) - deg2rad($lon1))) * $r;
									echo "</td></tr>\n";	
								}
								echo "</table>\n<br />\n";
							}
						}
					}
				}
			}
		?>
     
	</body>
</html>