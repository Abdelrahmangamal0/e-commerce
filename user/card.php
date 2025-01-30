
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shopping cart </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"  rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
     
    <style>
     h3{
       
        font-family: "Rubik", sans-serif;
     
         
     }
     
     main{
       width: 40%;
       margin-top: 30px; 
    }

     table{
        box-shadow: 1px 1px 10px silver ;  
     }
     thead{
        background-color: #3489DB;
        color:white; 
        text-align:center;  
    }
    
    tbody{
        text-align:center;
    }
    tbody img {
            width: 40px;
            height: 30px;
            
    }
    
  
  
  </style>

</head>
<body>

    <center>
        <h3>Your reserved products</h3>         
    </center>


<?php
 session_start(); 

 $conn= mysqli_connect("localhost","root","","e-commerce");
 
 if(!$conn){
 
 echo "connected error". mysqli_connect_error($conn);
 
 }
 
 $sqli="SELECT * FROM  `prod` ";

$result= mysqli_query($conn,$sqli);

 
 
$user_id=$_SESSION['user_id'];
 
 
 
 
 
 $sql="SELECT * FROM  `add_card` WHERE user_id=$user_id";
 $query= mysqli_query($conn,$sql);
 
 while($row = mysqli_fetch_array($query)){




echo"

     <center>         
        <main>
            <table class='table'>
                <thead>
                    <tr>
                       
                        <th scope='col'> Product image   </th>
                        <th scope='col'> Product name   </th>
                        <th scope='col'> Product price  </th>
                        <th scope='col'> Delete product </th>
                    </tr>
                
                </thead>
                <tbody>
                    <tr>
                       <td><img src='../images/$row[image]' class='card-img-top'>
                       </td>
                       <td>$row[name]</td>
                       <td>$row[price]</td>
                       <td><a href='del_card.php? id=$row[id]'  class='btn btn-danger'  >Delete</a></td>

                    </tr>
                     

                </tbody>
            </table>
        </main>    
    </center>
     " ; 
 }
?>


    <center>
      <a href="shop.php"> Return to the products page</a>
    </center>


</body>