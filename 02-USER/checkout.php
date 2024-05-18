<?php 

	include 'connection.php';
	session_start();
		$user_id = $_SESSION['user_id'];

	if (isset($_POST['order_btn'])) 
	{
		   $name = $_POST['name'];
   		   $number = $_POST['number'];
   		   $email = $_POST['email'];
           $method = $_POST['method'];
           $street = $_POST['street'];
           $house = $_POST['house'];
           $city = $_POST['city'];
           $province = $_POST['province'];
           $country = $_POST['country'];
           $zip_code = $_POST['zip_code'];

          
           $cart_query = mysqli_query($conn, "SELECT * FROM `cart2` WHERE user_id = '$user_id'");
           $price_total = 0;

           if (mysqli_num_rows($cart_query) > 0) 
           {
           		while($product_item = mysqli_fetch_assoc($cart_query))
           		{
           	$product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .')';
           	$product_price = number_format($product_item['price'] * $product_item['quantity']);
           	$product_price = $product_item['price'] * $product_item['quantity'];
           	$price_total += $product_price;
           		}
           }




         $total_product = implode(',', $product_name);
      	$detail_query = mysqli_query($conn,  "INSERT INTO `order_form`(user_id, name, person_number, email, method, street, house, city, province, country, zip_code, total_products, total_price)
       	VALUES('$user_id', ' $name', '$number', '$email', '$method', '$street', '$house', '$city', '$province',  '$country', '$zip_code', '$total_product ', '$price_total')") or die ('query failed1');




      		if ($cart_query && $detail_query) 
      		{
      	echo "
      	<div class='order-message'>
		<div class='message-container'>
		<h3>Thank you for Shopping!</h3>
		<div class='order-detail'>
			<span>".$total_product."</span>
			<span class='total'> total: $".$price_total."/- </span>
		</div>

		<div class='customer-details'>
			<p> your name: <span>".$name."</span></p>
			<p> your number: <span>".$number."</span></p>
			<p> your email: <span>".$email."</span></p>
			<p> your address: <span>".$street.", ".$house.", ".$city.", ".$province.", ".$country.", ".$zip_code."</span></p>
			<p> your payment mode: <span>".$method."</span></p>
			<p>(*pay when product arrives*)</p>
		</div>

		<a href= 'product.php' class='continue-shopping-btn'>Continue Shopping</a>
	</div>
</div>";
      		}



	}
 ?>		

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
	<link rel="stylesheet" href="../css/welcome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">

	<style type="text/css">
		.orderbtn
		{
			margin-top: 10px;
			background-color: black;
   			color: white;
   			padding: 10px 10px;
   			border-radius: 5px;
   			font-weight: bold;
		}
	</style>
</head>
<body>
<?php 

include 'navbar.php';

 ?>

 			<div class="container">
 					<h1 class="heading">complete your order</h1>


 					<div class="display-order">
 						<?php 	

 					$select_cart = mysqli_query($conn, "SELECT * FROM `cart2` WHERE user_id = '$user_id'");
 						$total = 0;
 						$grand_total = 0;

 						if (mysqli_num_rows($select_cart )> 0) 
 						{
 							while($fetch_cart = mysqli_fetch_assoc($select_cart))
 							{ 	

 							$total_price =  $fetch_cart['price'] * $fetch_cart['quantity'];
 							


 							$grand_total = $total += $total_price;
 						 ?>
 		
 							<span><?=$fetch_cart['name']; ?>(<?=$fetch_cart['quantity']; ?>)</span>
 						 <?php 

 						 }
 						}
 						else
 						 {
 						 	echo "<div class = 'display-order'><span>Your cart is empty</span></div>";
 						 }

 						  ?>
 			<span class="grand_total"> grand total: $<?= number_format($grand_total); ?></span>
 					</div>
 				<section class="checkout-form">
 					<form action="" method="post">
 					<div class="flex">

 						<div class="input_box">
 							<span>Your name:</span>
 							<input type="text" name="name" placeholder="Enter your name" required>
 						</div>

 						<div class="input_box">
 							<span>Your number:</span>
 							<input type="number" name="number" placeholder="Enter your number" required>
 						</div>

 							<div class="input_box">
 							<span>Your email:</span>
 							<input type="email" name="email" placeholder="Enter your email" required>
 							</div>

 						<div class="input_box">
 							<span>payment method</span>
 							<select name="method">
 							<option value="cash on delivery" selected>cash on delivery(COD)</option>
 							<option value="credit card">Coins.ph</option>
 							<option value="gcash">Gcash</option>
 							<option value="gcash">Paymaya</option>
 							</select>
 						</div>

 						<div class="input_box">
 							<span>address line 1:</span>
 							<input type="text" name="street" placeholder="Enter street address" required>
 						</div>

 						<div class="input_box">
 							<span>address line 2:</span>
 							<input type="text" name="house" placeholder="Enter house number" required>
 						</div>

 						<div class="input_box">
 							<span>city:</span>
 							<input type="text" name="city" placeholder="Enter city" required>
 						</div>

 						<div class="input_box">
 							<span>Province:</span>
 							<input type="text" name="province" placeholder="Enter province" required>
 						</div>

 						<div class="input_box">
 							<span>country:</span>
 							<input type="text" name="country" placeholder="Enter country" required>
 						</div>

 						<div class="input_box">
 							<span>zip code:</span>
 							<input type="text" name="zip_code" placeholder="Enter zip code" required>
 						</div>
 					</div>
 					<input type="submit" value="order now" name="order_btn" class="orderbtn">
 					</form>
 				</section>
 			</div>
  

</body>
</html>