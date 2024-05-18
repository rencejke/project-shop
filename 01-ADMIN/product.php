<?php 	

		include 'connection.php';
		session_start();
		$user_id = $_SESSION['user_id'];
		
		if (isset($_POST['add_to_cart']))
		{
			$product_name = $_POST['product-name'];
			$product_price = $_POST['product-price'];
			$product_image = $_POST['product-image'];
			$product_quantity = 1;


			 $select_cart = mysqli_query($conn, "SELECT * FROM `cart2` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

			 if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }
   else{
      mysqli_query($conn, "INSERT INTO `cart2`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Figuriniza | Products</title>
	<link rel="stylesheet"  href="../css/welcome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">



</head>
<body>
		<?php 	

		include 'navbar.php';


		 ?>


	
<section id="products">
<div class="container">	
<h1 class="heading">latest products</h1>
<?php 

if (isset($message))
	{
		foreach($message as $message)
		{
			echo '<div class = "message"> <span>' .$message. '</span> <i class = "fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
		}
	};

 ?>
<button id="buttontoscrollUp">
	<i class="fa fa-arrow-up"></i>
</button>
	<div class="box-container">
		
		<?php 	
			
			$select_products = mysqli_query($conn, "SELECT * FROM `products`");
			if (mysqli_num_rows($select_products) > 0) 
			{
				while($fetch_product = mysqli_fetch_assoc($select_products))
				{
					?>

					<form action="" method="post">
						<div class="box2">
							<img src="../uploaded_img/<?php echo $fetch_product['image']; ?>" 	height = "250px" width="250px" alt="">
							<h3><?php 	echo  $fetch_product['name']?></h3>
							<div class="price2">$<?php 	echo  $fetch_product['price']; ?></div>

							<input type="hidden" name="product-name" value="<?php echo $fetch_product['name'];?>">
							<input type="hidden" name="product-price" value="<?php echo $fetch_product['price'];?>">
							<input type="hidden" name="product-image" value="<?php echo $fetch_product['image'];?>">
							<input type="submit" class="test-btn" value="add to cart" name="add_to_cart">
						</div>
					</form>

					<?php 
				}
			}

		 ?>

	</div>





</section>
</div>
<?php 	

		include '../01-ADMIN/footer.php';


		 ?>
</body>
<script src="../js/script.js"></script>
</html>