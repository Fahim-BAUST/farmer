<!DOCTYPE html>
<html>
<head>
	<title>WEB DEV </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	*{
	margin:  0;
	padding: 0;
	font-family: Arial;
}
header{
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.7)), url(../index.jpg);
	height: 100vh;
	background-size: cover;
	background-position: center;
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
	border: 1px solid transparent;
	transition: 0.7s ease;
	display: block;
}
ul li a:hover{
	background-color: #176b0a;
	color: #000;
}
ul li.active a{
	background-color: #176b0a;
	color: #000;
}
.logo img{
	float: left;
	width: 150px;
	height: auto;

}
.main{
	max-width: 1200px;
	margin: auto;

}
.title{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.title h1{
	color: #fff;
	font-size: 50px;
}
ul li ul li{
	display: inline;
	display: none;
}
ul li:hover ul li{
	display:block;
	background-color: #176b0a;
}
</style>
</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img src="logo_transparent.png">
			</div>
			<ul>
				<li class="active"> <a href="#"> <i class="fa fa-fw fa-home"></i>HOME</a></li>
				<li> <a href="viewAdvertisement.php"><i class="fa fa-fw fa-info"></i>BUYER</a>
				</li>
				<li> <a href="knowledge.php"><i class="fa fa-fw fa-info"></i>KNOWLEDGE</a>
				</li>
				
				<li> <a href="#"><i class="fa fa-fw fa-user"></i>LOG IN</a>
					<ul>
					    <li> <a href="farmerLogin.php">Farmer</a></li>
						<li> <a href="buyerLogin.php">Buyer</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="title">
			<h1><center>WELCOME <br/>  TO <br/>farmers.com</center></h1>
		</div>
	</header>

</body>
</html>