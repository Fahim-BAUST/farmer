<?php
    session_start();
	$db = new mysqli("localhost","root","","farmer");

	if(isset($_POST['af_submit'])){
		$target_dir = "productImage/";
		$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		$food_name = $_POST['food_name'];
		$quantity = $_POST['Pquantity'];
		$amount = $_POST['amount'];
		$phoneNumber = $_POST['phoneNumber'];
		$code=$_POST['ItemCode'];

		$query = "INSERT INTO advertisement(itemName,	phoneNumber, quantity,image,price,code) VALUES ('$food_name' ,'$phoneNumber', '$quantity', '$target_file', '$amount','$code')";
		$run = mysqli_query($db, $query);

		if($run){
			$message1 = "added successfully.!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}else{
			$message1 = "Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}
	}



	if(isset($_POST['r_submit'])){
		$r_code = $_POST['r_code'];
		
		$query = "DELETE FROM advertisement WHERE code='$r_code'";
		$run = mysqli_query($db, $query);

		$query1 = "DELETE FROM payment WHERE code='$r_code' ";
		$run1 = mysqli_query($db, $query1);


		if($run){
			$message2 = "Item Removed successfully.!";
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}else{
			$message2 = "Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}
	}


	if(isset($_POST['u_submit'])){
		$u_code = $_POST['ItemCode'];
		$u_quantity = $_POST['Pquantity'];
		$u_price = $_POST['amount'];
		$u_phoneNumber=$_POST['phoneNumber'];
		
		$query = "UPDATE advertisement SET price='$u_price',quantity='$u_quantity',phoneNumber='$u_phoneNumber' WHERE code='$u_code' LIMIT 1";
		$run = mysqli_query($db, $query);

		if($run){
			$message3 = "Item updated successfully.!";
			echo "<script type='text/javascript'>alert('$message3');</script>";
		}else{
			$message3 = "Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message3');</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Inventory </title>


	<style>
		*{
	margin:  0;
	padding: 0;
	font-family: Arial;
}
body{
	height: 100vh;
	background-size: cover;
	background-position: center;
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.7)), url(../index.jpg);
	background-size: auto 1000px;
}
ul{
	float: right;
	list-style-type: none;
	margin-top: 25px;

}

ul li{
	display: inline-block;
}
ul li a{
	text-decoration: none;
	color: #fff;
	padding: 5px 20px;
	transition: 0.7s ease;
	display: block;
}
ul li a:hover{
	background-color: #176b0a;
	color: #000;
}

.main{
	max-width: 1200px;
	margin: auto;

}

ul li ul li{
	display: list-item;
	display: none;
}
ul li:hover ul li{
	display:block;
	background-color: #176b0a;
}

.tablink {
  background-color: #555;
  color: white;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  width: auto;
}

.tablink:hover {
  background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    padding: 0px;
	margin: 0px;
	font-family: 'Nunito',sans-serif;
	font-size: 15px;
	position: center;

	height: 100vh;
	background-size: cover;
	background-position: center;
	color: #10e5aa;
}
.tabcontent input, button{
	font-family: 'Nunito',sans-serif;
	font-weight: 700;
}
.tabcontent{
	width: 25%;
	margin: 0px auto;
	margin-top: 20px;
	padding: 20px;
}
.tabcontent input{
	display: block;
	border: 1px solid #ccc;
	border-radius: 5px;
	background: #fff;
	padding: 15px;
	outline: none;
	width: 100%;
	margin-bottom: 20px;
	transition: 0.3s;
	-webkit-transition:0.3s;
	-moz-transition:0.3s;
	background-position: center;
}
.tabcontent button{
	background: #48787e  ;
	color: #fff;
	border: 1px solid #5d8ffc;
	border-radius: 5px;
	padding: 15px;
	display: block;
	width: 100%;
	transition: 0.3s;
	-webkit-transition:0.3s;
	-moz-transition:0.3s;

}
.tabcontent button:hover{
	background: #fff;
	color: #5d8ffc;
	border: 1px solid #5d8ffc;
	cursor: pointer;
}
.tabcontent a{
	color: #fff;
}



	</style>
</head>
<body>
	<header>
		<div class="main">
			<ul>
				<li > <a >Add Advertisement</a>
					<ul>
						<li> <a class="tablink" onclick="openPage('Inventory Details', this, 'green')" ></a> 
						</li>
					    <li> <a class="tablink" onclick="openPage('Add item', this, 'green')" id="defaultOpen">Add Food</a></li>
					</ul>
				</li>
				<li><a>Remove Item</a>
					<ul>
						<li> <a class="tablink" onclick="openPage('Remove', this, 'green')">Remove</a></li>
					</ul>
				</li>
				<li> <a href="#">Update Inventory Details</a>
					<ul>
						<li> <a class="tablink" onclick="openPage('Update', this, 'green')">Update</a></li>
					</ul>
				</li>
				
				<li > <a href="#">View Advertisements</a>
					<ul>
						<li> <a class="tablink" href="viewAdvertisement.php">View</a></li>
					</ul>
				</li>
				<li > <a href="#">View Order</a>
					<ul>
						<li> <a class="tablink" href="vieworder.php">Order</a></li>
					</ul>
				</li>
				<li > <a href="logout.php">Logout</a></li>
			</ul>
			
		</div>
		
        <div id="Add item" class="tabcontent"><br>
        	<form action="farmerPage1.php" method="post" enctype="multipart/form-data">
			   <h1>	<center>Add Items</center> </h1><br><br>
			    <b>Item name</b>
			    <input type="text" placeholder="Enter name" name="food_name" required>
				<b>Item code</b>
			    <input type="text" placeholder="Enter Code- ABC-yourcode" name="ItemCode" required><br>
				<b>Unit price (Per KG= (?)Taka)</b>
			    <input class="price" type="number" placeholder="50" name="unitprice" required><br>
			    <b>Quantity(kg)</b>
			    <input class="quantity" type="number" value="1" placeholder="Enter Quantity" name="Pquantity" required><br>
				<b>Image</b>
			    <input type="file" name="fileToUpload"  id="fileToUpload" required><br>
			    <b>Price(taka)</b>
			    <input class="total" id="total" type="number" placeholder="Enter price(unit price)" name="amount" required><br>
				<b>Phone Number</b>
			    <input type="tel" placeholder="Enter..." name="phoneNumber" pattern="[0-9]{11}" required><br>
			    <button type="submit" name="af_submit" class="registerbtn" value="upload">Submit</button>
        </form>
        </div>
        	<div id="Remove" class="tabcontent"><br>
        		<form action="farmerPage1.php" method="post" enctype="multipart/form-data">
					    <h1>	<center>Remove Items</center> </h1><br><br>
					    <b>Code</b>
					    <input type="text" placeholder="Enter .." name="r_code" required>
					    <button type="submit" name="r_submit" class="registerbtn">Submit</button>
			    </form>

        </div>
        </div>
        	<div id="Update" class="tabcontent"><br>
        		<form action="farmerPage1.php" method="post" enctype="multipart/form-data">
					   <h1>	<center>Update Food Items</center> </h1><br><br>

				<b>Item code</b>
			    <input type="text" placeholder="Enter Code- ABC-yourcode" name="ItemCode" required><br>
			    <b>Quantity</b>
			    <input type="number" placeholder="Enter Quantity" name="Pquantity" required><br>
			    <b>Price</b>
			    <input type="number" placeholder="Enter..." name="amount" required><br>
				<b>Phone Number</b>
			    <input type="number" placeholder="Enter..." name="phoneNumber" required><br>

					    <button type="submit" name="u_submit" class="registerbtn">Submit</button>
			    </form>

        </div>
        
        </div>
         </div>
	</header>
	<script type="text/javascript" src="farmerPage1.js"></script>

</body>

<script>
$(document).ready(function () {
	$(".checkout").on("keyup", ".quantity", function () {
		var price = +$(".price").data("price");
		var quantity = +$(this).val();
		$("#total").text("$" + price * quantity);
	});
});

</script>
</html>