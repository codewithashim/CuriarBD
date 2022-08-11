<?php
session_start();

$message = "";

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
   // header("Location: /CourierBD/");
} else {
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'user') {
        //header("Location: /CourierBD/");
    }
}


$current_path = "/CourierBD/dashboard/users.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='/CourierBD/assets/bootstrap/css/bootstrap.min.css'>
    <link rel=" stylesheet" href='/CourierBD/assets/css/style.css'>
    <link rel="stylesheet" href='/CourierBD/assets/font-awesome/css/font-awesome.min.css'>

    <title>CourierBD || Dashboard</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon" />
</head>

<body id="admin_root">

    <?php include 'header.php' ?>
    <?php include '../db/dbconnect.php' ?>

    <div class="container">
    <div class="container my-5">

<h5 class="py-3">User Information</h5>

<table class="table bg-white " style="font-size: 13px;">
    <thead class="bg-white">
        <tr>
            <th>No</th>
            <th scope="col">Image</th>
            <th scope="col">Product Title</th>
            <th scope="col">Product Size</th>
            <th scope="col">Product height</th>
            <th scope="col">Product width</th>
            <th scope="col">Category</th>
            <th scope="col">Price</th>
            <th scope="col">Time</th>

        </tr>
    </thead>

    <tbody class="text-secondary bg-light">

        <?php
        $sql =  "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) { ?>
          
          <tr>
          <td class="font-weight-bold"><?php echo $row['id'] ?></td>
              <td class="font-weight-bold">
              <img src="../<?php echo $row['image']; ?>" style="width:60px;height:60px;border-radius:50%;"alt="">
              </td>
              <td class="font-weight-bold"><?php echo $row['title'] ?></td>
              <td class="font-weight-bold"><?php echo $row['size'] ?></td>
              <td class="font-weight-bold"><?php echo $row['length'] ?></td>
              <td class="font-weight-bold"><?php echo $row['width'] ?></td>
              <td class="font-weight-bold"><?php echo $row['category'] ?></td>
              <td class="font-weight-bold"><?php echo $row['price'] ?></td>
              <td class="font-weight-bold"><?php echo $row['time'] ?></td>

          </tr>


           
    <?php    }  ?>


    </tbody>
</table>
</div>
    </div>





    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>