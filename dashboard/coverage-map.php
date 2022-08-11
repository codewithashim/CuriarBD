<?php
session_start();
$UserID = $_SESSION["UserID"];

if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
  //  header("Location: /CourierBD/");
} else {
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'user') {
       // header("Location: /CourierBD/");
    }
}

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
</head>

<body id="admin_root">

    <?php include 'header.php' ?>
    <?php include '../db/dbconnect.php' ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                
        <h5 class="py-3">Manage Coverage map</h5>

<div class="container">
     <table class="table bg-white " style="font-size: 13px;">
     <thead class="bg-white">
         <tr>
             <th scope="col">Id </th>
             <th scope="col">Area </th>
             <th scope="col">Location </th>
             <th scope="col">Status </th>
         

         </tr>
     </thead>

     <tbody class="text-secondary bg-light">

         <?php
         $sql =  "SELECT * FROM coverageMaps";
         $result = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($result)) {?>
     <tr>

         <td style="font-weight:bold"><?php echo $row['id'] ?></td>
         <td style="font-weight:bold"><?php echo $row['area'] ?></td>
         <td style="font-weight:bold"><?php echo $row['location'] ?></td>
         <td style="font-weight:bold">
             <?php 
             if($row['status']==1){
                echo "<a href='disable-map.php?id=$row[id]' class='btn btn-danger text-white'>Disable</a>";
             }else{
                echo "<a href='able-map.php?id=$row[id]' class='btn btn-dark text-white'>Enable</a>";
             }
             ?>
         </td>
     </tr>


      <?php   }

         ?>


     </tbody>
 </table>

</div>
<div class="col-lg-2"></div>
            </div>
        </div>
    </div>




    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>