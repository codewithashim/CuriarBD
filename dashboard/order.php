<?php
session_start();
$UserID = $_SESSION["UserID"];


if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
   // header("Location: /CourierBD/");
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


    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>CourierBD || Dashboard</title>
</head>

<body id="admin_root" style="background: #f8f8ff;">

    <?php include 'header.php' ?>
    <?php include '../db/dbconnect.php' ?>

    <div class="container my-5">

        <h5 class="py-3">User Informations</h5>

        <table class="table bg-white " style="font-size: 13px; margin-top:20px;">
            <thead style="background: #f8f8ff; ">
                <tr>
                    <th scope="col">Order ID </th>
                   <th scope="col">Product Status </th>
                    <th scope="col">Size </th>
                     <th scope="col">Height </th>
                    <th scope="col">Width </th>
                    <th scope="col">Stamp </th>
                    <th scope="col">Box </th>
                    <th scope="col">Wraping </th>
                    <th scope="col">Sender Address </th>
                    <th scope="col">Receiver Address </th>
                    <th scope="col">Price </th>
                    <th scope="col">Payment </th>
                    <th scope="col">Delivery </th>
                    <th scope="col">Action </th>



                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php
                $sql =  "SELECT * FROM `orders` WHERE ProviderID ='$UserID'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $OrderID    = $row['OrderID'];
                    $status  = $row['status'];
                    $size  = $row['size'];
                    $height  = $row['height'];
                    $width  = $row['width'];
                    $stamp  = $row['stamp'];
                    $box  = $row['box'];
                    $wraping  = $row['wraping'];
                    $send_address  = $row['send_address'];
                    $receiving_address  = $row['receiving_address'];
                    $price  = $row['price'];
                    $payment  = $row['payment'];
                    if ($payment == "pending") {
                        $bg_p = "warning";
                    } else {
                        $bg_p = "success";
                    }
                    $delivery  = $row['delivery'];
                    if ($delivery == "pending") {
                        $bg_d = "warning";
                       
                    } else {
                        $bg_d = "success";
                    }

                   ?>
                    <tr>
                        <td><?php $OrderID ?></td>
                        <td><?php echo $status ?></td>
						<td><?php echo $size ?></td>
						<td><?php echo $height  ?></td>
					    <td><?php echo $width  ?></td>
                        <td><?php echo $stamp ?></td>
                        <td><?php echo $box ?></td>
                        <td><?php echo $wraping ?></td>
                        <td><?php echo $send_address ?></td>
                        <td style="width:50px!important;"><?php echo $receiving_address ?></td>
                        <td><?php echo $price ?></td>
                        <td> <small class="bg-<?php echo $bg_p; ?> px-1 rounded text-white fw-bold"><?php echo $payment; ?></small></td>
                        <td> <small class="bg-<?php echo $bg_d; ?> px-1 rounded text-white fw-bold"><?php echo $delivery; ?></small></td>
           
                        <td>
				  			<div class="nav-item dropdown text-right" >
        								<a class="nav-link text-dark"  data-toggle="dropdown" href="#"><i style="font-size:18px;"class="fa 
        								 fa-ellipsis-v mar" aria-hidden="true" ></i></a>

  									<ul class="dropdown-menu mega-menu text-center" aria-labelledby="navbarDropdown" style="margin-right:100px;">
  										
                                      <?php 
                                       if($row['delivery']!="delivered"){
                                      echo "<a class='dropdown-item btn btn-info font-weight-bold' href='delivery.php? OrderID=$row[OrderID]' onclick='return checkdelete()'>Done</a>";
                                       }else{
                                        echo "<a class='dropdown-item btn btn-dark'  disabled>Delivered</a>";
                                       }
                                      ?>
										 <?php echo "<a class='dropdown-item bg-danger text-white'onclick='return checkcancel()'  href='cancel_order.php?OrderID=$row[OrderID]' >Cancel</a>";?>
                                         <?php echo "<a class='dropdown-item bg-dark text-white'  href='edit_address.php?OrderID=$row[OrderID]' >Change Address</a>";?>
	       						    </ul>
     					   </div>

                </td>
              
                        </td>
    
                    </tr>
               <?php }

                ?>


            </tbody>
        </table>
    </div>


    <script>
 function checkdelete(){
      return confirm('Delivery');
  }
  function checkcancel(){
      return confirm('You want cancel this order ?');
  }
</script>

    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>