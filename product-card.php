<?php
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/CourierBD/assets/bootstrap/css/bootstrap.min.css'">
    <link rel=" stylesheet" href='/CourierBD/assets/css/style.css'>
    <link rel="stylesheet" href='/CourierBD/assets/font-awesome/css/font-awesome.min.css'>

    <title>CourierBD</title>
    <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php
    include 'db/dbconnect.php';


    include 'include/header.php';
    $price = 56600;
    $UserID =  $_SESSION["UserID"];


    ?>

    <div class="container my-5">
        <h4 class="text-center my-3">Order Summary</h4>

        <div class="row g-3">

            <?php
            $sql =  "SELECT * FROM `cards` WHERE user_id ='$UserID'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
               $product_id = $row['product_id'];
                $card_sql =  "SELECT * FROM `products` WHERE id='$product_id'";
                $card_result = mysqli_query($conn, $card_sql);
                while ($card_row = mysqli_fetch_assoc($card_result)){

            ?>

                <div class="col-md-10 col-lg-7 col-11 mx-auto shadow-lg p-3 bg-white rounded">
                    <div class="card ">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                            User ID:
                                            <span><?php echo $row['user_id'] ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                            Product ID:
                                            <span><?php echo $row['product_id']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                            Product Title:
                                            <span><?php echo $card_row['title']; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 ">
                                            <div>
                                                <strong>Price:</strong>
                                            </div>
                                            <span><strong><?php echo $card_row['price']; ?> BDT </strong></span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-items-center">
                                    <a href="checkout.php?price=<?php echo $card_row['price']; ?>&OrderID=<?php echo $card_row['id'] ?>" class="btn btn-dark btn-sm px-3">
                                        Buy Now
                                        <i class="fa fa-arrow-circle-o-right mx-2 " aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>




                        </div>
                    </div>


                </div>



            <?php
            } }

            ?>

        </div>
    </div>











    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>
