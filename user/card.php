<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shopping cart </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">

    <style>
        h3 {

            font-family: "Rubik", sans-serif;


        }

        main {
            width: 40%;
            margin-top: 30px;
        }

        table {
            box-shadow: 1px 1px 10px silver;
        }

        thead {
            background-color: #3489DB;
            color: white;
            text-align: center;
        }

        thead #C {
            font-size: 20px;
            /* padding-top: 20px */
        }

        tbody {
            text-align: center;
        }

        tbody img {
            width: 70px;
            height: 60px;

        }

        tbody #A {
            font-size: 25px;
            padding-top: 20px
        }

        tbody #B {
            font-size: 25px;
            padding-top: 15px
        }

        tbody .btn-danger {
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 8px;
        }





        .total-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 40%;
            margin: 20px auto;
            padding: 15px;
            background-color: rgb(60, 61, 104);
            color: white;
            font-size: 22px;
            font-weight: bold;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
        }

        .total-price {
            background-color: white;
            color: #007bff;
            margin: 5px 45px;
            padding: 5px 20px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
        }
    </style>

</head>

<body>

    <center>
        <h3>Your reserved products</h3>
    </center>


    <?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "e-commerce");

    if (!$conn) {

        echo "connected error" . mysqli_connect_error($conn);
    }

    $sqli = "SELECT * FROM  `prod` ";

    $result = mysqli_query($conn, $sqli);



    $user_id = $_SESSION['user_id'];





    $sql = "SELECT * FROM  `add_card` WHERE user_id=$user_id";
    $query = mysqli_query($conn, $sql);

    $total = 0;
    while ($row = mysqli_fetch_array($query)) {
        $total += intval($row['price']);


        echo "

     <center>         
        <main>
            <table class='table'>
                <thead>
                    <tr>
                       
                        <th id='C' scope='col'> Product image   </th>
                        <th id='C' scope='col'> Product name   </th>
                        <th id='C' scope='col'> Product price  </th>
                        <th id='C' scope='col'> Delete product </th>
                    </tr>
                
                </thead>
                <tbody>
                    <tr>
                       <td><img src='../images/$row[image]' class='card-img-top'>
                       </td>
                       <td id='A'>$row[name]</td>
                       <td id='A'>$row[price]</td>
                       <td id='B' ><a href='del_card.php? id=$row[id]'  class='btn btn-danger'  >Delete</a></td>

                    </tr>
                     

                </tbody>
            </table>
        </main>    
    </center>
     ";
    }

    echo "<div class='total-container'>
    <span>Total Price</span>
    <span class='total-price'>$total$</span> 
</div>
"
    ?>


    <center>
        <a href="shop.php"> Return to the products page</a>
    </center>


</body>
