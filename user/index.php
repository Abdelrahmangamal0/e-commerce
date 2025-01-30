<?php 

session_start(); 

include "../inc/nav.php";
 $conn= mysqli_connect("localhost","root","","e-commerce");

 if(!$conn){
 
 echo "connected error". mysqli_connect_error($conn);
 
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  "  rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../style.css">

</head>
<body>

    <center>
        <div class="main">
    <h2>Online markting website</h2> 
<br>
    <img src= "../../img/logo.png" alt="logo"width="200px">

    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success p-1 text-center"> 
                            
                           <?php echo $_SESSION['success'];
                            unset($_SESSION['success']);
                            ?> </div>
   <?php endif;?>
   
   
   <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger p-1  text-center"> 
                          
                           <?php  echo $_SESSION['error'];
                            unset($_SESSION['error']);
                            ?> 
                            </div>
   <?php endif;?>
    <form action="../admin.php"   method="POST" enctype= 'multipart/form-data'  >
    
    
    <input type="text" name="name" placeholder="name" >
       <br>
       
       <input type="text" name="price" placeholder="price">
       <br>
       
       <input type="file" id="image" name="image"  accept="image/jpg,image/jpeg,image/png" style="display:none;" >
         <label for="image"> Select the product image   </label>
        
         <button name ="upload"> Add product</button>
    <br><br>    
        <a href="product.php">View all products</a>

    </form>
    </div>








</body>
</html>