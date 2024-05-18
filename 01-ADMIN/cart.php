<?php 
	
include 'connection.php';
		session_start();
		$user_id = $_SESSION['user_id'];

		

		if (isset($_POST['update_cart'])) 
		{
			$update_quantity = $_POST['cart_quantity'];
			$update_quantity_id = $_POST['cart_quantity_id'];
			$update_query = mysqli_query($conn, "UPDATE `cart2` SET quantity = '$update_quantity' WHERE id = '$update_quantity_id' ");

			if ($update_query) 
			{
				header('location: cart.php');
			};
		};

		if(isset($_GET['remove']))
		{
			$remove_id = $_GET['remove'];
			mysqli_query($conn, "DELETE FROM `cart2` WHERE id = '$remove_id' AND user_id = '$user_id'");

			header('location: cart.php');
		}

		if(isset($_GET['delete_all']))
		{
			mysqli_query($conn, "DELETE FROM `cart2`");

			header('location: cart.php');
		}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Figuriniza | Cart</title>
	<link rel="stylesheet" href="../css/welcome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
</head>
<body>

		<?php 	

			include 'navbar.php';

		 ?>

		<div class="container">
			<section class="shopping-cart">
				<h1 class="heading">shopping cart</h1>

				<table>
					<thead>
					<th>image</th>
					<th>name</th>
					<th>price</th>
					<th>quantity</th>
					<th>total price</th>
					<th>action</th>
					</thead>
					<tbody>
					<?php 
					$cart_query = mysqli_query($conn, "SELECT * FROM `cart2` WHERE user_id = '$user_id'") or die('query failed');

				$grand_total = 0;

				 if(mysqli_num_rows($cart_query) > 0)
				 {
				 	while($fetch_cart = mysqli_fetch_assoc($cart_query))
				 	{
				 		?>
				 		<tr>
				 			<td><img src="../uploaded_img/<?php echo $fetch_cart['image']; ?>" height = "100px" alt=""></td>
				 			<td>	<?php 	echo $fetch_cart['name']; ?></td>
				 			  <td>$<?php echo number_format($fetch_cart['price']); ?>/-</td>
				 			<td>
				 				<form action="" method="post">
				 					<input type="hidden" min="1" name="cart_quantity_id" value="<?php  echo $fetch_cart['id']; ?>">
				 					<input type="number" min="1" name="cart_quantity" value="<?php  echo $fetch_cart['quantity']; ?>">
				 					<input type="submit" name="update_cart" value="update">
				 				</form>
				 			</td>
				 			<td>$<?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
				 			<td><a href="cart.php?remove=<?php  echo $fetch_cart['id']; ?>" onclick = "return confirm('remove item from the cart?')" class = "remove-btn"><i class="fas fa-trash" class="btn-delete"></i>Remove</a></td>
				 		</tr>
				<?php
						$sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
           			$grand_total += $sub_total;
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="product.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td>$<?php echo number_format($grand_total); ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
						 </tr>
					</tbody>
				</table>


				<div class="check-out-btn">
					<a href="checkout.php" class="btn-checkout <?= ($grand_total > 1)?'': 'disabled';?> ">Proceed to Checkout</a>
				</div>
			</section>
		</div>
<?php 	

				include'footer.php';

			 ?>

</body>
</html>