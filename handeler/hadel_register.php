<?php
session_start();
include "core/function.php";

$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}
if (checkmethod("POST")){

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
     
        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');
     
        if(mysqli_num_rows($select) > 0){
           $message[] = 'user already exist!';
        }else{
           mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
           $message[] = 'registered successfully!';
           header('location:login.php');
        }
           
     

}else{
echo "method not allow";

}



}
?>