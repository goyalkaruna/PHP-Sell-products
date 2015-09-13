<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Sell It </title>
</head>

<body align="center">
  <p><center><img src="sell_it_postit.jpg"/></center></p>
<fieldset align="center">      
  <legend ><H3>Posted Ads !!</H3></legend>
      <p>
          <?php
try {
                // Connect to the database.
                $con = new PDO("mysql:host=localhost;dbname=BladeRunner",                               
                               "BladeRunner", "root");
                $con->setAttribute(PDO::ATTR_ERRMODE,
                                   PDO::ERRMODE_EXCEPTION);

                $city     = filter_input(INPUT_POST, "city");
               
        
                $query = "SELECT * FROM product where city= '$city'";  

                // We're going to construct an HTML table.
                print "<table border='1' align='center'>\n";
                
                // Fetch the database field names.
                $result = $con->query($query);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                
                if($row <= 0){
                  print "<p>No data with this city<br></p>";
                }
                else{
                  
                // Construct the header row of the HTML table.
                print "            <tr>\n";
                foreach ($row as $field => $value) {
                    print "                <th>$field</th>\n";
                }
                print "            </tr>\n";
                
                // Fetch the matching database table rows.
                $data = $con->query($query);
                $data->setFetchMode(PDO::FETCH_ASSOC);

                // Construct the HTML table row by row.
                foreach ($data as $row) {
                    print "            <tr>\n";
                    
                    foreach ($row as $name => $value) {
                        print "                <td>$value</td>\n";
                    }
                    
                    print "            </tr>\n";
                }
                
                print "        </table>\n"; 
                
                }
 }
            catch(PDOException $ex) {
                echo 'ERROR: '.$ex->getMessage();
            } 
          ?>
      </p>
<br>
</br>
<br>
</br>
	<a href="postAd.html">Post Ad for your stuff  </a><p>  </p>
	<a href="getAds.php"> Fetch all Ads</a>
</fieldset>

</body>
</html>
