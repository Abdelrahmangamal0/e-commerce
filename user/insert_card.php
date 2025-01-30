<?php
session_start();
$conn= mysqli_connect("localhost","root","","e-commerce");

 if(!$conn){
 
 echo "connected error". mysqli_connect_error($conn);
 
 }
 
 $id=$_POST['id'];
$user_id=$_SESSION['user_id'];
 $sql= "SELECT * FROM prod WHERE id=$id";
 $result=mysqli_query($conn,$sql);
 
 $row=mysqli_fetch_array($result);

 if(isset($_POST['add'])){

     $name =$_POST['name'];
     $price=$_POST['price'];
     $image_name= $row['image'];
    
$insert="INSERT INTO add_card(user_id,name,price,image) VALUES($user_id,'$name','$price','$image_name') ";

$query=mysqli_query($conn,$insert);

header('location: shop.php ');

 }



?>