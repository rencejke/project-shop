<?php 

include 'connection.php';

if (!isset($_SESSION))
{
	session_start();
	$user_id = $_SESSION['user_id'];
}


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
 </head>
 
 <body>
 <header id="header">
		<nav id="main-navigation" class="navbar navbar-expand-lg bg-nav fixed-top">
			<a href="" class="navbar-logo">
				<img src="../background/new logo.png" class="logo">
			</a>
			<button class="navbar-toggler" data-toggle = "collapse" data-target = "#main-navigation">
				
			</button>

			<div class="collapse navbar-collapse" id="#main-navigation">
				<ul class="navbar-nav ml-auto">
					
					<li class="nav-item">
						<a href="welcome.php" class="nav-link">Home</a>
					</li>

					<li class="nav-item">
						<a href="product.php" class="nav-link">Shop</a>
					</li>

					<li class="nav-item">
						<a href="about_us.php" class="nav-link">About us</a>
					</li>

					<li class="nav-item">
						<a href="update.php" class="nav-link">Update</a>
					</li>

						<?php 

		$select_rows = mysqli_query($conn, "SELECT * FROM `cart2` WHERE user_id = '$user_id'") or die ('query failed');
		$row_count = mysqli_num_rows($select_rows);

		 ?>

					<li class="nav-item">
						<a href="cart.php" class="nav-link"><span><i class="fa fa-shopping-cart" class="out-btn"></i></span> Cart <span>[<?php echo $row_count; ?></span>]</a>
					</li>

					<li class="nav-item">
						<a href="profile.php" class="nav-link"><span><i class="fa fa-user" class="out-btn"></i></span>  Profile</a>
					</li>

					<button class="logout">
					<a href="logout.php" class="logout"><span><i class="fa fa-sign-out" class="out-btn"></i></span>  Logout</a>
					</button>
				</ul>
			</div>
		</nav>

		

	</header>
 </body>
 </html>
