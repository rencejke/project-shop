<?php

include 'connection.php';

if(isset($_POST['submit'])) //checks whether a variable is set
{
	$name = mysqli_real_escape_string($conn, $_POST['name']); 
	//Escape special characters in strings
	$uname = mysqli_real_escape_string($conn, $_POST['uname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = md5($_POST['password']);
	$conpass = md5($_POST['conpassword']);


	$select = " SELECT * FROM `userform` WHERE username = '$uname' && password = '$pass'";
	$result = mysqli_query($conn, $select);

	if (mysqli_num_rows($result) > 0) 
	{
		$error[] = 'user already exist!!!';
	}else
		{
			if ($pass != $conpass) 
			{
				$error[] = 'password not matched';
			}
			else
			{
				$insert = "INSERT INTO userform(name, username, email, password) VALUES('$name', '$uname','$email', '$pass')";		
				mysqli_query($conn, $insert);
				header('location:index.php');	
				   
			}

		}
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Figuriniza | Register your account</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/font.css">

</head>
<body>
	<div class="form-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<h3>Register now</h3>
		<?php 
		if (isset($error)) 
		{
			foreach ($error as $error) 
			{
				echo '<span class ="error-message">'.$error.'</span>';
			}
		};
		 ?>
		<input type="text" name="name" placeholder="Enter your Name" required>
		<input type="text" name="uname" placeholder="Enter your username" required>
		<input type="email" name="email" placeholder="Enter your Email" required>
		<input type="password" name="password" placeholder="Password" required>
		<input type="password" name="conpassword" placeholder="Confirm password" required>
		<input type="submit" name="submit" value="register now" class="form-btn">
		<p>already have an account? <a href="index.php">Login</a></p>
		</form>
	</div>
</body>
</html>