<?php

include 'connection.php';

session_start();

if(isset($_POST['submit'])){
    
   $uname = mysqli_real_escape_string($conn, $_POST['uname']);
   $pass = md5($_POST['password']);

   $select = "SELECT * FROM `userform` WHERE username = '$uname' && password = '$pass'";
   $result = mysqli_query($conn, $select);
   
   if(mysqli_num_rows($result) > 0)
   {
      $row = mysqli_fetch_assoc($result);
      echo $_SESSION['user_id'] = $row['id'];
      header('location:user_page.php');
   }
   else{
      $error[] = 'incorrect password or username.';
   }
}

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Figuriniza | Login</title>
   <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
   <div class="form-container">
      <form action="" method="post">
      <h3>Login now</h3>
      <?php 
      if (isset($error)) 
      {
         foreach ($error as $error) 
         {
            echo '<span class ="error-message">'.$error.'</span>';
         }
      };
       ?>
      <input type="text" name="uname" placeholder="Enter your username" required>
      <input type="password" name="password" placeholder="Password" required>
         <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="registerForm.php">Signup now</a></p>
      </form>
   </div>
</body>
</html>