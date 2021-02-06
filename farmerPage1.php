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
		$rf_name = $_POST['rf_name'];
		
		$query = "DELETE FROM advertisement WHERE code='$r_code' AND itemName='$rf_name'";
		$run = mysqli_query($db, $query);

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
	<link rel="stylesheet" type="text/css" href="css/admin_page1.css">
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
			    <b>Quantity</b>
			    <input type="number" placeholder="Enter Quantity" name="Pquantity" required><br>
				<b>Image</b>
			    <input type="file" name="fileToUpload"  id="fileToUpload" required><br>
			    <b>Price</b>
			    <input type="number" placeholder="Enter..." name="amount" required><br>
				<b>Phone Number</b>
			    <input type="number" placeholder="Enter..." name="phoneNumber" required><br>
			    <button type="submit" name="af_submit" class="registerbtn" value="upload">Submit</button>
        </form>
        </div>

        	<div id="Remove" class="tabcontent"><br>
        		<form action="farmerPage1.php" method="post" enctype="multipart/form-data">
					    <h1>	<center>Remove Items</center> </h1><br><br>
					    <b>Code</b>
					    <input type="text" placeholder="Enter .." name="r_code" required>
					    <b>Item Name</b>
					    <input type="text" placeholder="Enter name" name="rf_name" required><br>

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
</html>