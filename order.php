<?php
session_start();
$message = "";

function checkValue($data)
{
    if (isset($_POST[$data])) {
        return "true";
    } else {
        return 'false';
    }
}
include 'db/dbconnect.php';


$UserID =  $_SESSION["UserID"];
$PackageID = $_GET['id'];
$ProviderID = $_GET['p'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $size =  $_POST['size'];
    $status =  $_POST['status'];
    $height =  $_POST['height'];
    $width =  $_POST['width'];
    $postal_code =  $_POST['postal_code'];
    $price =  $_POST['total_price'];

    $send_address =  $_POST['send_address'];
    $receiving_address =  $_POST['receiving_address'];


    $stamp =  checkValue('stamp');
    $box =  checkValue('box');
    $wraping =  checkValue('wraping');


    $sql = "INSERT INTO `orders` (`size`, `status`,`height`,`width`,`stamp`,`box`,`wraping`,`postal_code`,`UserID`,`PackageID`,`ProviderID`,`send_address`,`receiving_address`,`price`  ) 
    VALUES ('$size', '$status','$height','$width','$stamp','$box','$wraping','$postal_code','$UserID','$PackageID' ,'$ProviderID','$send_address','$receiving_address','$price')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $message = "<strong>Success! </strong> Added to cart..!";
        header("Location: /CourierBD/cart.php?success=$message");
    }
}
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
</head>

<body>
    <?php

    include 'include/header.php';
    $sql =  "SELECT * FROM `packages` WHERE `PackageID`='$PackageID'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $PackageID   = $row['PackageID'];
        $UserID = $row['UserID'];
        $to = $row['to'];
        $from = $row['from'];
        $price = $row['price'];
        $image = $row['image'];
    }

    ?>

    <div class="container">

        <div class="row">
            <div class="col-md-8 col-lg-6 col-11 mx-auto shadow-lg p-3 p-md-5 my-5 bg-white rounded">
                <?php
                if ($message) {
                    echo '
          <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          ' . $message . '
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>

          ';
                }

                ?>
                <h5 class="mb-3">Order</h5>
                <form action="" method='post' class="row">

                    <div class="col-12">
                        <label for="post_code">Product Status:</label>
                        <select class="form-select" name="status" id="status" required>
                            <option disabled selected>Select One</option>
                            <option>Heavy</option>
                            <option>Light</option>
                            <option>Low</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Size:</label>
                        <input type="text" class="form-control " id="size" name="size" required>
                    </div>
                    <div class="col-md-6">
                        <label for="name">Width: </label>
                        <input type="text" class="form-control " id="width" name="width" required>
                    </div>
                    <div class="col-md-6">
                        <label for="mobile">Height:</label>
                        <input type="text" class="form-control " id="height" name="height" required>
                    </div>
                    <div class="col-md-6">
                        <label for="postal_code">Postal Code:</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                    </div>

                    <div class="col-12">
                        <label for="receiving_address">Receiving Address:</label>
                        <textarea class="form-control" id="receiving_address" name="receiving_address" rows="2" required></textarea>
                    </div>
                    <div class="col-12">
                        <label for="send_address">Send Address:</label>
                        <textarea class="form-control" id="send_address" name="send_address" rows="2" required></textarea>
                    </div>

                    <div class="col-sm-4 my-1">
                        <input type="checkbox" class="form-check-input" id="stamp" name="stamp">
                        <label class="form-check-label" for="stamp">Stamp</label>
                    </div>

                    <div class="col-sm-sm-4 my-1">
                        <input type="checkbox" class="form-check-input" id="box" name="box">
                        <label class="form-check-label" for="box">Box</label>
                    </div>
                    <div class="col-sm-4 my-1">
                        <input type="checkbox" class="form-check-input" id="wraping" name="wraping">
                        <label class="form-check-label" for="box">Wraping</label>
                    </div>
                    <div class="d-flex my-3">
                        <h6 class="me-2">Total Price: </h6>
                        <small id="price" class="text-muted"><?php echo $price ?> BDT</small>
                        <input type="text" name="total_price" id="total_price" value="<?php echo $price ?>" class="d-none">
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100 my-2 fw-bold">Add to cart</button>
                </form>
            </div>
        </div>

    </div>
    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>


</body>

</html>