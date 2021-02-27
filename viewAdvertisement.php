<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "farmer");

  // Initialize message variable
  $msg = "";
  $result = mysqli_query($db, "SELECT * FROM advertisement");

    while ($row = mysqli_fetch_array($result)) {
      echo "<form name=\"farmer\" action=\"viewAdvertisement.php\" method=\"get\">";
        echo "<div id='img_div'>";
            echo "<img src='".$row['image']."' >";
            echo "Code :- ".$row['code']."</p>";
            echo "Name :- ".$row['itemName']."</p>";
            echo "Quantity :- ".$row['quantity']."</p>";
            echo "Price :- ".$row['price']."</p>";
            echo "Seller Phone No :- ".$row['phoneNumber']."</p>";
            echo "<button  class=\"btn btn-warning\"  name=\"bsubmit\" formaction=\"checkout.php\">BUY NOW</button>";
        echo "</div>";
        echo "</form>";
      }
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<style type="text/css">
body{
    background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.7)), url(../index.jpg);
		height: 100vh;
		background-size: cover;
		background-position: center;
  
}
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
  
   #img_div{
   	width: 90%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 4px solid #cbcbcb;
     border-radius:2ex;
    background-color: #4E9258;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 250px;
   }
</style>
</head>
<body>
<div id="content" >
  

</div>

<script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstarp.min.js"></script>
	<script src="js/custom.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

</body>
</html>