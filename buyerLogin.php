<?php
    session_start();
	$db = new mysqli("localhost","root","","farmer");

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		
		$address = $_POST['address'];
		$phnno = $_POST['phnno'];

		$query = "INSERT INTO Bregistration(name, password, email, address, phoneno) VALUES ('$name' , '$password', '$email','$address','$phnno')";
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
		$result = $mysqli->query("SELECT * FROM Bregistration WHERE name = '$lname' AND password ='$password' ");
		$row = $result->fetch_assoc();
		if($row['name'] == $lname && $row['password'] == $password ){
			header("Location:viewAdvertisement.php");
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
	<style>
		body{
	background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.6)),url(../index.jpg);
	background-size: auto 500px;
	height: 100vh;
	background-size: cover;
	background-position: center;
	font-family: Arial;
}

.login-page{
	width: 30%;
	padding: 10% 0 0;
	margin: auto;
}

.form{
	position: relative;
	z-index: 1;
	background: transparent;
	width: auto;
	margin: 0 auto 100px;
	padding: 45px;
	text-align: center;
}

.form input{
	font-family: "Roboto", sans-serif;
	outline: 1;
	background: #f2f2f2;
	width: 100%;
	border: 0;
	margin: 0 0 15px;
	padding: 15px;
	box-sizing: border-box;
	font-size: 14px;
	border-radius: 10px;
}

.form button{
	font-family: "Roboto", sans-serif;
	text-transform: uppercase;
	outline: 0;
	background: #4caf50;
	width: 100%;
	border: 0;
	padding: 15px;
	color: #ffffff;
	font-size: 14px;
	cursor: pointer;
}

.form button:hover, .form button:active{
	background: #4caf50;
}

.form .message{
	margin: 15px 0 0;
	color:  white;
	font-size: 18px;
}

.form .message a{
	color: white;
	text-decoration: none;
}
.form .msg{
	font-weight: bold;
	color: #37d0c4;
	font-size: 30px;
}

.form .register-form{
	display: none;
}
</head>
<body>
	<div class="login-page">
		<div class="form">
			<form action="buyerLogin.php" method="post" class="register-form">	
			    <p class="msg">Buyer Registration</p>
			    <input type="text" placeholder="Enter Name" name="name" required>
			    <input type="number" placeholder="Enter phone number" name="phnno" required>
                <input type="text" name="address" placeholder="Enter address" required>
			    <input type="text" name="email" placeholder="Enter email" required>
			    <input type="password" placeholder="Enter Password" name="password" required>
				<button name="submit">Create</button> 				
				<p class="message"><a href="#">Already Registered? Login</a></p>
			</form>

			<form action="buyerLogin.php" method="post" class="login-form">
				<p class="msg">Buyer Login</p>
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