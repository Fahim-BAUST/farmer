<?php
    session_start();
	$db = new mysqli("localhost","root","","farmer");

	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phnno = $_POST['phnno'];
    $code = $_POST['code'];
    $city = $_POST['city'];
    $transaction = $_POST['tid'];

		$query = "INSERT INTO payment(name, email, address, phoneNumber,code ,city,transactionId) VALUES ('$name' , '$email','$address','$phnno','$code','$city','$transaction')";
		$run = mysqli_query($db, $query);

		if($run){
			$message1 = "Payment Request successfuly done!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}else{
			echo "error".mysql_error($db);
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkout.php" method="post" class="register-form">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="Nahin Rukeiya Jhumur">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="jhumur@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Rangpur">
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted payment system : bkash/rocket/nogod</label>
            <label style="background-color:DodgerBlue; color:white;" for="cname">Give the transaction id if the payment is successful</label>

            <label for="ccode">Item Code No</label>
            <input type="text" id="ccode" name="code" placeholder="A-123">
            <label for="ccnum">Transaction id</label>
            <input type="text" id="ccnum" name="tid" placeholder="aihd7327s">
            <label for="expmonth">Phone Number</label>
            <input type="tel" id="expmonth" name="phnno" pattern="[0-9]{11}" placeholder="01000000000">
          </div>       
        </div>
        <button class="btn" type="submit" name="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
