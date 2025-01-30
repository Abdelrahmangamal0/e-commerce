<?php
session_start();
include "core/function.php";

$conn = mysqli_connect("localhost", "root", "", "e-commerce");

if (!$conn) {

   echo "connected error" . mysqli_connect_error($conn);
}

$error = [];

if ((checkmethod("POST")) && isset($_POST['update'])) {

   $id = $_POST['id'];
   $name = $_POST['name'];
   $price = $_POST['price'];
   $image = $_FILES['image'];
   $image_location = $_FILES['image']['tmp_name'];
   $image_name = $_FILES['image']['name'];
   $image_up = "images/" . $image_name;


   if (checkname($name)) {
      $error[] = 'name requerd';
   }
   if (checkname('price')) {
      $error[] = 'price requerd';
   }

   if (move_uploaded_file($image_location, $image_up)) {
   
   } else {

      $error[] = 'product not added';
   }

   if (empty($error)) {

      $sql = "UPDATE prod SET name='$name' , price='$price' , image='$image_name' WHERE id=$id  ";
      $query = mysqli_query($conn, $sql);
      $_SESSION['success'] = " data updated succesfully";
      header("location:user/index.php");
   } else {
      header("location: db/update.php");
      $_SESSION['error'] = " All filds must be completed ";
   }
}
