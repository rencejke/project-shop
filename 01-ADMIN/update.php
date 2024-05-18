<?php 	
	
	include 'connection.php';

if (isset($_POST['add-product'])) 
	{
		$product_Name = $_POST['product-name'];
		$product_Price = $_POST['product-price'];
		$product_Image = $_FILES['product-image']['name'];
		$product_Image_Temp_Name = $_FILES['product-image']['tmp_name'];
		$product_Image_Folder = '../uploaded_img/' .$product_Image;

		$insert_Query = mysqli_query($conn, "INSERT INTO `products` (name, price, image) VALUES ('$product_Name', '$product_Price', '$product_Image')") or die('query failed');

		if ($insert_Query) 
		{
			move_uploaded_file($product_Image_Temp_Name, $product_Image_Folder);
			$message[] = 'product added successfully';
		}
		else
		{
			$message[] = 'The product is not allowed';
		}

	};


			if (isset($_GET['delete']))
			{
				$delete_id = $_GET['delete'];
				$delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die('query failed');


				if ($delete_query)
				 {
					
					$message[] = 'product has been deleted';		
				}
				else
				{
				
					$message[] = 'product cant be deleted ';	
				}
			};


			if (isset($_POST['update_product'])) 
			{
				$update_product_id = $_POST['update_product_id'];
				$update_product_name = $_POST['update_product_name'];
				$update_product_price = $_POST['update_product_price'];
				$update_product_image = $_FILES['update_product_image']['name'];
				$update_product_image_tmp_name = $_FILES['update_product_image']['tmp_name'];
				$update_product_image_folder = '../uploaded_img/' .$update_product_image;


	$update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_product_name', price = '$update_product_price', image = '$update_product_image' WHERE id = '$update_product_id'") or die('query failed');

			if ($update_query) 
			{
				move_uploaded_file($update_product_image_tmp_name, $update_product_image_folder);
				$message[] = 'product updated successfully';
			}
			else
			{
				$message[] = 'product cant be updated';
			}
			}


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Figuriniza | Update products</title>

	<link rel="stylesheet" type="text/css" href="../css/welcome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
</head>
<body>

	
	<?php 	

	include 'navbar.php';

	
	 ?>
<button id="buttontoscrollUp">
	<i class="fa fa-arrow-up"></i>
</button>
<section class="edit-form-container">
	
	<?php 	

	if (isset($_GET['edit'])) 
	{
		$edit_id = $_GET['edit'];
		$edit_query = mysqli_query($conn, "SELECT * from `products` WHERE id = $edit_id");

		if (mysqli_num_rows($edit_query) > 0) 
		{
			while ($fetch_edit = mysqli_fetch_assoc($edit_query)) 
			{
				
				?>

				<div class="container ">
				<form action="" method="post" enctype="multipart/form-data">
				<center>
					<h3>Update your Product</h3>
				<img src="../uploaded_img/<?php echo $fetch_edit['image']; ?>" height = "100" alt="">
				<input type="hidden" name="update_product_id" value="<?php echo $fetch_edit['id']; ?>">
				<input type="text" class="square"  required name="update_product_name" value="<?php echo $fetch_edit['name']; ?>"> 
				<input type="number" min="0" class="square" required name="update_product_price" value="<?php echo $fetch_edit['price']; ?>">
				<input type="file"  name="update_product_image" required accept="image/png, image/jpg, image/jpeg," class="square" required>	
				<input type="submit" value="update the product" name="update_product" class="edit-btn">
				<input type="reset" value="cancel" id="close-edit"  class="cancel-btn" onclick="this.parentElement.style.display = `none`";>
				</center>
				</form>
				</div>
			<?php 

			}
		}
	}
	 ?>
</section>
<section id="update-product">
	
	<div class="container">
			<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
			<h3>Add new product</h3>
			<?php 	

	if (isset($message))
	{
		foreach($message as $message)
		{
			echo '<div class = "message"> <span>' .$message. '</span> <i class = "fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
		}
	};
	 ?>
				<input type="text" name="product-name" placeholder="Enter the product" class="square" required>
				<input type="number" min="0" name="product-price" placeholder="Enter the price" class="square" required>
				<input type="file" name="product-image" accept="image/png, image/jpg, image/jpeg," class="square" required>
				<input type="submit" value="add the product" name="add-product" class="update-btn">
			</form>
	</div>
</section>	

<section class="display-product-table">
	<table>
		<thead>
			<th>Product Image</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>action</th>
		</thead>

		<tbody>
			

			<?php 

			$select_products = mysqli_query($conn, "SELECT * from `products`");

			if (mysqli_num_rows($select_products) > 0) 
			{
				while($row = mysqli_fetch_assoc($select_products))
				{
					?>

					<tr>
					<td class="center-td"><img src="../uploaded_img/<?php echo $row['image']; ?>" height = "100" alt=""></td>
					<td class="center-td"><?php echo $row['name']; ?> </td>
					<td class="center-td">$<?php echo $row['price']; ?>/- </td>
					<td>
						<a href="update.php?delete=<?php echo  $row['id'] ?>" class="delete-btn" onclick="return confirm('are you sure you want to delete this?');"><i class="fas fa-trash"></i>delete</a>
						<a href="update.php?edit=<?php echo  $row['id'] ?>" class="option-btn" ><i class="fas fa-edit"></i> update </a>
					</td>
					</tr>
				<?php 
				};
			}
			else
			{

				echo "<div class='empty'> no product added </div>";
			}
			?>
		</tbody>
	</table>
</section> 

<br>

<?php 
include 'footer.php';

 ?>
</body>
<script src="../js/script.js"></script>
</html>