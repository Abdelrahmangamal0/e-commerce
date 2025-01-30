<?php
session_start();
include '../inc/nav.php';

$conn = mysqli_connect("localhost", "root", "", "e-commerce");

if (!$conn) {

   echo "connected error" . mysqli_connect_error($conn);
}


if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['confirm password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist!';
   } else {
      mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:login.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  " rel="stylesheet">

   <title>register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../sy.css">
   <style>
      input {
         text-align: center;
      }
   </style>
</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

   <div class="form-container">

      <form action="" method="post">
         <h3>Register</h3>
         <input type="text" name="name" required placeholder='name' class="box">
         <input type="email" name="email" required placeholder='email' class="box">
         <input type="password" name="password" required placeholder='password' class="box">
         <input type="password" name="confirm password" required placeholder='confirm password' class="box">
         <input type="submit" name="submit" class="btn" value="Register">
         <p> Do you have an account ? <a href="login.php"> login</a></p>
      </form>

   </div>

</body>

</html>