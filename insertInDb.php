<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>post ad @ Sell It </title>
</head>

<body align="center">
	<p><center><img src="sell_it_postit.jpg"/></center></p>
	<p><H3><I>Selling your unused items could be so easy!
	Enter few relevant details about your product.... </H3></I></p>
       
<fieldset align="center">  
	<legend ><H3>Sell your Product</H3></legend>    
	<p>
        <?php
           
              $product     = filter_input(INPUT_POST, "product");
              $description = filter_input(INPUT_POST, "description");
              $bargain = filter_input(INPUT_POST, "bargain");
              $amount = filter_input(INPUT_POST, "amount");
              $state = filter_input(INPUT_POST, "condition");
              $city = filter_input(INPUT_POST, "city");
           try{
                // Connect to the database.
                $con = new PDO("mysql:host=localhost;dbname=BladeRunner",                               
                               "BladeRunner", "root");
                $con->setAttribute(PDO::ATTR_ERRMODE,
                                   PDO::ERRMODE_EXCEPTION);



	$sql = "INSERT INTO product(product, description, amount, bargain, state, city)
	VALUES ('$product', '$description', $amount, '$bargain', '$state', '$city')";

	// use exec() because no results are returned
	    $con->exec($sql);
	    echo "Your post has been created successfully. GOOD LUCK!!";



if ($bargain == "yes") {
                  print "<p>$product!<br></p>";

                  print "<p>$description!<br></p>";
                  $output = "<p>Its good to Negotiate !! Thanks :)<br></p>";
                  
              }
              else {
                  print "<p>$product!<br></p>";

                  print "<p>$description!<br></p>";
                  $output = "<p>You are rigid on the amount. \n No problem!!<br></p>";
                  
              }

              $output = $output." $product!";
              if ($state == "used"){
                  print "<p>Condition - Used!<br></p>";
              }
              else {
                   print "<p>Its a new product.<br></p>";
              }



              
              print "<p><br></p>";


}
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$con = null;
?>

	<a href="postAd.html">Post Ad your stuff  <br></a>
	<a href="queryFullDb.php"> Fetch all Ads</a>
		      
          
  </p>
 </fieldset>

</body>
</html>
