<?php
    session_start();
	$db = new mysqli("localhost","root","","farmer");

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$address = $_POST['address'];
		$phnno = $_POST['phnno'];

		$query = "INSERT INTO registration(name, password, email, address, phoneNumber) VALUES ('$name' , '$password', '$email','$address','$phnno')";
		$run = mysqli_query($db, $query);

		if($run){
			$message1 = "Registration Successful.!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}else{
			echo "error".mysql_error($db);
		}
	}
	if(isset($_POST['login'])){

		$lname = $_POST['lname'];
		$password = $_POST['lpassword'];

		$mysqli = new mysqli("localhost","root","","farmer");
		$result = $mysqli->query("SELECT * FROM registration WHERE name = '$lname' AND password ='$password' ");
		$row = $result->fetch_assoc();
		if($row['name'] == $lname && $row['password'] == $password ){
			header("Location:farmerPage1.php");
        exit();
		}
		else{
			$message2 = "Login Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message2');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="css/user_style.css">
</head>
<body>
	<div class="login-page">
		<div class="form">
			<form action="farmerLogin.php" method="post" class="register-form">	
			    <p class="msg">Farmer Registration</p>
			    <input type="text" placeholder="Enter Name" name="name" required>
			    <input type="number" placeholder="Enter phone number" name="phnno" required>
                <input type="text" name="address" placeholder="Enter address" required>
			    <input type="text" name="email" placeholder="Enter email" required>
			    <input type="password" placeholder="Enter Password" name="password" required>
				<button name="submit">Create</button> 				
				<p class="message"><a href="#">Already Registered? Login</a></p>
			</form>

			<form action="farmerLogin.php" method="post" class="login-form">
				<p class="msg">Farmer Login</p>
				<input type="name" name="lname" placeholder="name">
				<input type="password" name="lpassword" placeholder="password">
				<button name="login">Log in</button>
				<p class="message"><a href="#">Not Registered?  Register</a></p>
			</form>
		</div>
	</div>

	<script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstarp.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
		$('.message a').click(function(){
			$('form').animate({height: "toggle",opacity: "toggle"}, "slow");
		});
	</script>

</body>
</html>