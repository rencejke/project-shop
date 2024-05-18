<?php 

include 'connection.php';
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) 
{
	$update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
	$update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

	mysqli_query($conn, "UPDATE `userform` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die ('query failed');

	$old_pass = $_POST['old_pass'];
	$update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
	$new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
	$confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

	if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) 
	{
		if ($update_pass !=  $old_pass) {
			$message[] = 'old password not matched!';
		}
		elseif ($new_pass != $confirm_pass) 
		{
			$message[] = 'confirm password not matched!';
		}
		else
		{
			mysqli_query($conn, "UPDATE `userform` SET password = '$confirm_pass' WHERE id = '$user_id'") or die ('query failed');
			$message[] = 'password updated successfully';
		}
	}

	$update_image = $_FILES['update_image']['name'];
	$update_image_size = $_FILES['update_image']['size'];
	$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
	$update_image_folder = '../profile_pics/' .$update_image;

	if (!empty($update_image)) 
	{
		if ($update_image_size > 2000000) 
		{
			$message[] = 'image is too large';
		}
		else
		{
			$image_update_query = mysqli_query($conn, "UPDATE `userform` SET image = '$update_image' WHERE id  = '$user_id'")
			or die ('query failed');

			if ($image_update_query)
			 {
				move_uploaded_file($update_image_tmp_name, $update_image_folder);
			 }
			$message[] = 'image updated successfully';
		}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Figuriniza | Update your Profile</title>
	<link rel="stylesheet" type="text/css" href="../css/welcome.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
</head>
<?php include 'navbar.php'; ?>
<body class="profile">
		<div class="update-profile">
			<center>
			 <form action="" method="post" enctype="multipart/form-data">
			 	<?php 

				$select = mysqli_query($conn, "SELECT * FROM `userform` WHERE id = '$user_id' ")
				or die('query failed');

				if (mysqli_num_rows($select) > 0) 
				{
					$fetch = mysqli_fetch_assoc($select);
				}

				if ($fetch['image'] == '') 
				{
					echo '<img src="../profile_pics/acc1 (3).png">';
					
				}
				else
				{
					echo '<img src="../profile_pics/'.$fetch['image'].'">';
				}

					if (isset($message)) 
					{
						foreach ($message as $message) 
						{
							echo '<div class = "message"> <span>' .$message. '</span> <i class = "fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
						}
					}


			 ?>
			 	<div class="flex"> 
			 		<div class="inputBox">

					
			 			<span>username: </span>
			 			<input type="text" name="update_name" value="<?php echo $fetch['username'] ?>" class = "box">
			 			<span>your email:</span>
			 			<input type="text" name="update_email" value="<?php echo $fetch['email'] ?>" class = "box">
			 			<span>Update your picture</span>
			 			<input type="file" name="update_image" class="box" accept="image/jpg, image/jpeg, image/png">
			 		</div>

			 		<div class="inputBox">

			 			<input type="hidden" name="old_pass" value="<?php echo $fetch['password'] ?>">
			 			<span>Old password:</span>
			 			<input type="password" name="update_pass" placeholder="enter previous password" class="box">

			 			<span>New password:</span>
			 			<input type="password" name="new_pass" placeholder="enter new password" class="box">

			 			<span>Confirm password:</span>
			 			<input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
			 		</div>
			 	</div>
			 	<input type="submit" name="update_profile" class="update_info">
			 	<a href="welcome.php" class="go-back">Go back</a>
			 </form>
		</center>
			 </div>

			 <?php 

			 include 'footer.php';

			  ?>
</body>
</html>