<?php
  // Create database connection
  $db = mysqli_connect("localhost", "root", "", "farmer");

  // Initialize message variable
  $msg = "";
  $result = mysqli_query($db, "SELECT * FROM advertisement");


    while ($row = mysqli_fetch_array($result)) {
        echo "<div id='img_div'>";
            echo "<img src='".$row['image']."' >";
            echo "Code :- ".$row['code']."</p>";
            echo "Name :- ".$row['itemName']."</p>";
            echo "Quantity :- ".$row['quantity']."</p>";
            echo "Price :- ".$row['price']."</p>";
            echo "Seller Phone No :- ".$row['phoneNumber']."</p>";
        echo "</div>";
      }
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 4px solid #cbcbcb;
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
   	height: 200px;
   }
</style>
</head>
<body>
<div id="content">
  

</div>
</body>
</html>