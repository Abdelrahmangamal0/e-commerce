<?php
session_start(); 

include '../inc/nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="style.css"> -->
     <style>
        h3 {
   font-family: "Rubik", sans-serif;
   font-weight: bold;
}

.card {
   float: right;
   margin-top: 20px;
   margin-left: 10px;
   margin-right: 10px;

}

.card img {
   width: 100%;
   height: 200px;
}

main {
   width: 60%;
}
     </style>
 

</head>
<body>
<center>
<br>
<h3> All products available</h3>
</center>

<?php
 
$conn= mysqli_connect("localhost","root","","e-commerce");

if(!$conn){

echo "connected error". mysqli_connect_error($conn);

}

$sql="SELECT * FROM  `prod` ";

$query= mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($query)){

      echo "
  <center>
     
  <main>
     <div class='card' style='width: 20rem ;'>
        <img src=' ../images/$row[image]' class='card-img-top'>
            <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <h5 class='card-text'>$row[price]</h5>
                    <a href='../db/update.php ? id=$row[id]' class='btn btn-primary' >Eidet product</a>
                    <a href='../db/delete.php ? id=$row[id]' class='btn btn-danger'  >Delete product</a>
                
            </div>
      </div>
  </main>
     
  </center>
     "; 
}

?>


</body>