<?php
session_start();
$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}

$id=$_GET['id'];

$sql="SELECT * FROM prod WHERE id= $id ";

$query=mysqli_query($conn,$sql);

$data=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Confirm purchase of products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css  "  rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
       
     <style>
       
       input{

        display:none;
            }
       
       .main{

        width: 30%;
        padding: 20px; 
        box-shadow : 1px 1px 10px silver ; 
        margin-top: 50px;    
       }     
     </style>   
</head>
<body>
<center>   
   <h3>Do you really want to buy this product ? </h3>
   <div class='main'  >
     <form action='insert_card.php' method='POST' >
        <div> 
            <input type="text" name ="id"    value=<?php echo $data['id'];?>>
            <input type="text" name ="name"  value=<?php echo $data['name'];?> >
            <input type="text" name ="price" value=<?php echo $data['price'];?> >
            <button name='add' type='submit' class="btn btn-warning">Confirm addition </button>  
        </div>
        
        <div>
            <a href="shop.php"> Return to the products page </a>
           

        </div>    
     
    
    
     </form>
   </div>
</center>
</body>
</html>