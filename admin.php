<?php
session_start();
include "core/function.php";

$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}

$error=[];

if ((checkmethod("POST")) && isset($_POST['upload']) ){
       
     $name=$_POST['name'];  
     $price=$_POST['price'];  
     $image= $_FILES['image'] ;
     $image_location= $_FILES['image']['tmp_name'];
     $image_name= $_FILES['image']['name'];
     $image_up="images/".$image_name;
     
     
    if(checkname($name)){
    $error[]='name requerd'; 
    }
    if(checkname('price')){
       $error[]='price requerd'; 
    }
    
    if(move_uploaded_file( $image_location, $image_up)) {

    }else {
     
       $error[]='product not added';
    
          }
 
if (empty($error)){
   
    $sql="INSERT INTO `prod`(name,price,image) values('$name','$price','$image_name')" ;
    $query= mysqli_query($conn,$sql); 
    $_SESSION['success'] = " data inserted succesfully" ;
    header("location:user/index.php");
   }else{
      $_SESSION['error'] = " All filds must be completed " ;
      header("location:user/index.php");  
   }
   

}else{echo 'METHOD NOT EXIST'; }



?>