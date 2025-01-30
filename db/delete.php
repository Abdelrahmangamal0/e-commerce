<?php
 session_start(); 

$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}

$id=$_GET['id'];

$sql= "DELETE FROM prod WHERE id=$id";
$query=mysqli_query($conn,$sql);

header('location:../user/product.php');
?>