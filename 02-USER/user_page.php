<?php

include 'connection.php';

session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id))
   header('location:loginForm.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Figuriniza | User page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   <?php    


         $select_user = mysqli_query($conn, "SELECT * FROM `userform` WHERE id = '$user_id'")
         or die ('query failed');

         if (mysqli_num_rows($select_user) > 0) 
         {
            $fetch_user = mysqli_fetch_assoc($select_user);
         };

       ?>
<div class="container">

   <div class="content">
      <h3>hi, <span><?php echo $fetch_user['name']; ?></span></h3>
      <h1>welcome <span><?php echo $fetch_user['email']; ?></span></h1>
      <p>Welcome to the shop</p>
      <a href="welcome.php" class="btn">Proceed to the Shop</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>