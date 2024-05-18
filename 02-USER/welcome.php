<?php 	

include 'connection.php';
if (!isset($_SESSION))
{
	session_start();
	$user_id = $_SESSION['user_id'];
}
	 $select_user = mysqli_query($conn, "SELECT * FROM `userform` WHERE id = '$user_id'")
         or die ('query failed');

         if (mysqli_num_rows($select_user) > 0) 
         {
            $fetch_user = mysqli_fetch_assoc($select_user);
         };
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home page | Welcome <?php echo $fetch_user['name']; ?></title>
	<link rel="stylesheet" type="text/css" href="../css/welcome.css">
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
				</ul>
			</div>
		</nav>
			<div class="top-carousel">
			<div id ="work" class ="carousel slide" data-ride = "carousel">	<div class="banner-content text-left">
				<h1>Shop <span> that we build <br> just</span> for you</h1>

				<p class="col-md-5" adjust>
					Figuriniza is a toy store for collectors, pop culture addicts, and toy hobbyists. Figuriniza has the best selection of toy collectibles available, whether you're a serious collector or a toy photographer. Figuriniza allows anyone to enjoy toy collecting, whether they are plastic modelers, superhero comic fans, or bobblehead collectors. These collectibles provide a distinct and satisfying sense of achievement. Figuriniza is the only place to explore the world of collectible statues, toys, and more!
				</p>
					<br>

					<p class="pt-4">
						<a href="product.php" class="btn btn-lg">
							Shop Now!!
						</a>
					</p>
			</div>
		<ol class="carousel-indicators">
		<li data-target = "#work" data-slide-to = "0" class="active"></li>
		<li data-target = "#work" data-slide-to = "1"></li>
		<li data-target = "#work" data-slide-to = "2"></li>
		</ol>

		<div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../background/1bg.png" class="d-block w-100" alt="">  
           
      </div>
      <div class="carousel-item">
        <img src="../background/2bg.png" class="d-block w-100" alt="">
      </div>
      <div class="carousel-item">
        <img src="../background/3bg.png" class="d-block w-100" alt="">
      </div>
    </div>
		</div>
			</div>
	</header>

	<section class="shop-info">
		<center>
		<div class="container">
			<div class="row">
			<div class="col-md-3">
				<div class="icons">
				<i class="fas fa-truck"></i>
				<p>Fast Delivery</p>
				</div>
			</div>

				<div class="col-md-3">
				<div class="icons">
				<i class="fa fa-exchange"></i>
				<p>90 days return</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="icons">
				<i class="fa fa-lock"></i>
				<p>Secure Payment</p>
				</div>
			</div>

			<div class="col-md-3">
				<div class="icons">
				<i class="fa fa-headphones"></i>
				<p>24/7 Online Support</p>
				</div>
			</div>

			</div>
		</div>
		</center>
	</section>

	<section id="show-products">
<div class="container">
	<h3 class="title-products"> <span class="underline">Ne</span>w Arrivals</h3>
	<div class="products-container">
	<div class="row">

				<div class="col-md-4">
		<div class="product" data-name ="p-1">
			<img src="../pictures/A Couple of Cuckoos/Erika Amano (2).jpg">
			<h3>Erika Amano Figure</h3>
			<div class="price">$50</div>
			
				<di class="preview-buttons">
				<a href="product.php">Check Shop</a>
		</div>
		</div>

			<div class="col-md-4">
				<div class="product" data-name ="p-2">
			<img src="../pictures/Black Rock Shooter/Empress 3.jpg">
			<h3>Empress Figure</h3>
			<div class="price">$50</div>
		
				<div class="preview-buttons">
				<a href="product.php">Check Shop</a>
				</div>

		</div>
			</div>


			<div class="col-md-4">
				<div class="product" data-name ="p-3">
			<img src="../pictures/Cowboy Be Bop/Ed & Ein.jpg">
			<h3>Ed and Ein Figure</h3>
			<div class="price">$50</div>
		
				<div class="preview-buttons">
					<a href="product.php">Check Shop</a>
				</div>
		</div>
			</div>
</div>

<div class="row">
	<div class="col-md-4">
			<div class="product" data-name ="p-4">
			<img src="../pictures/Demon Slayer/Nezuko.jpg">
			<h3>Nezuko Figure</h3>
			<div class="price">$70</div>
				<div class="preview-buttons">
					<a href="product.php">Check Shop</a>
				</div>
		</div>
	</div>

	<div class="col-md-4">
			<div class="product" data-name ="p-5">
			<img src="../pictures/Blood Blockade Battlefront/Zapp.jpg">
			<h3>Zapp Figure</h3>
			<div class="price">$65</div>
			
				<di class="preview-buttons">
				<a href="product.php">Check Shop</a>
				</di>
			</div>
	</div>

	<div class="col-md-4">
			<div class="product" data-name ="p-6">
			<img src="../pictures/Berserk/Berserk 4.jpg">
			<h3>Berserk Figure</h3>
			<div class="price">$100</div>
				<di class="preview-buttons">
					<a href="product.php">Check Shop</a>
				</di>
			</div>
	</div>
</div>

<details>
	<summary>More...</summary>
	<div class="row">
	<div class="col-md-4">
			<div class="product" data-name ="p-4">
			<img src="../pictures/Konosuba/Aqua 2.jpg">
			<h3>Aqua Figure</h3>
			<div class="price">$70</div>
				<div class="preview-buttons">
					<a href="product.php">Check Shop</a>
				</div>
		</div>
	</div>

	<div class="col-md-4">
			<div class="product" data-name ="p-5">
		<img src="../pictures/Konosuba/Darkness 2.jpg">
			<h3>Darkness Figure</h3>
			<div class="price">$65</div>
			
				<di class="preview-buttons">
				<a href="product.php">Check Shop</a>
				</di>
			</div>
	</div>

	<div class="col-md-4">
			<div class="product" data-name ="p-6">
			<img src="../pictures/Konosuba/Kazuma 2.jpg">
			<h3>Kazuma Figure</h3>
			<div class="price">$100</div>
				<di class="preview-buttons">
					<a href="product.php">Check Shop</a>
				</di>
			</div>
	</div>
</div>
</details>


</div>
</section>

<?php 	


include 'footer.php';

 ?>





</body>
<script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
</html>

		
		
	