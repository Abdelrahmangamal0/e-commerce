<?php

$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_array($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['get']= $row['email']  ;
      header('location:shop.php');
   
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  "  rel="stylesheet">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../sy.css">
   <style>
      input{
         text-align: center;
      }
     </style>
</head>
<body>
   <?php
   include '../inc/nav.php';
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
  
<div class="form-container">

   <form action="" method="post">
      <h3> Login</h3>
      <input type="email" name="email" required placeholder="email" class="box">
      <input type="password" name="password" required placeholder="password" class="box">
      <input type="submit" name="submit" class="btn" value="login">
      <p>Do you already have an account ? <a href="register.php">Register</a></p>
   </form>

</div>

</body>
</html>