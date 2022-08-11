<?php
session_start();

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
    <title>CourierBD</title>
    <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
    <?php include 'include/header.php' ?>
<div class="container"><br><br>
<div class="row">
   
    <div class="col-lg-12">
    <form method="GET">
        <div class="input-group mb-3">
           <input type="text" name="search" class="form-control"value="<?php if(isset($_GET['search'])){ echo $_GET['search']; } ?>" placeholder="Search" required>
             <div class="input-group-append">
                  <button type="submit" name="sear" class=" btn btn-dark text-white font-weight-bold">
                 <i class='fas fa-search' style='font-size:24px;color:white;'></i>
            </button>
         </div>
      </div>
  </form>

    </div>
</div>
<div class="row">
 
    <div class="col-lg-12">
        
<table class="table bg-white" style="width:100%">
    <thead class="bg-dark text-white font-weight-bold text-center">
        <tr>
            <th class="font-weight-bold text-white" style="width:10%">Packet Id</th>
            <th class="font-weight-bold text-white"style="width:5%">Size</th>
            <th class="font-weight-bold text-white"style="width:5%">Height</th>
            <th class="font-weight-bold text-white"style="width:5%">Width</th>
            <th class="font-weight-bold text-white"style="width:15%">Receive address</th>
             <th class="font-weight-bold text-white"style="width:5%">Price</th>
            <th class="font-weight-bold text-white"style="width:10%">Payment</th>
            <th class="font-weight-bold text-white text-center"style="width:44%">Delivery</th>
            
    </thead>
    <tbody>

  <?php 
  include 'db/dbconnect.php';             
$UserID =  $_SESSION["UserID"];
                                    if(isset($_GET['sear']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM orders WHERE UserID='$UserID' and CONCAT(UserID) LIKE '%$filtervalues%' ORDER BY OrderID DESC";

                                      $query_run = mysqli_query($conn, $query);


                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                     ?>

                           <tr class="text-dark  text-center">
                                        
                                          <td class="" style="font-weight: bold;"><?php echo $items['PackageID']; ?></td>
                                          <td class="" style="font-weight: bold;"><?php echo $items['size']; ?></td>
                                           <td class="" style="font-weight: bold;"><?php echo $items['height']; ?></td>
                                            <td class="" style="font-weight: bold;"><?php echo $items['width']; ?></td>
                                         
                                          <td class="" style="font-weight: bold;"><?php echo $items['send_address']; ?></td>
                                          <td class="" style="font-weight: bold;"><strong style="font-size:26px;">&#2547;</strong><?php echo $items['price']; ?></td>
                                          <td class="" style="font-weight: bold;"><?php echo $items['payment']; ?></td>
                                          <td class=" text-center" style="font-weight: bold;margin:auto;text-align: center;position: relative; left:100px;"><div class="row">

                                                <?php 

                                                if($items['delivery']=="pending"){?>
                                                <div class="col-lg-12 text-center"style="width:100%;position: relative;">
                                                  <div style="width:15px;height:15px;background: blue;border-radius: 50%;"></div>
                                                    <p style="position: absolute;font-size: 12px;">Panding</p>
                                                   <div style="position: absolute;width:32%;height:5px;border: 1px solid blue;top:5px;left:15px;"></div>
                                                   <!------------end panding---------->

                                                   <div style="width:15px;height:15px;border: 1px solid blue;border-radius: 50%; top:0px;left:33%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:33%;">Shiping</p>
                                                    <!------------end Shiping---------->
                                                    <div style="position: absolute;width:33%;height:5px;border: 1px solid blue;top:5px;left:33%;"></div>

                                                      <div style="width:15px;height:15px;border: 1px solid blue;border-radius: 50%; top:0px;left:66%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:66%;">Delivered</p>

                                              </div>
                                                <?php }?>
                                                <?php 

                                                if($items['delivery']=="shipped"){?>

                                                 <div class="col-lg-12 text-center"style="width:100%;position: relative;">
                                                  <div style="width:15px;height:15px;background: blue;border-radius: 50%;"></div>
                                                    <p style="position: absolute;font-size: 12px;">Panding</p>
                                                   <div style="position: absolute;width:32%;height:7px;background: blue;top:5px;left:15px;"></div>
                                                   <!------------end panding---------->

                                                   <div style="width:15px;height:15px;background: blue;border-radius: 50%; top:0px;left:33%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:33%;">Shiping</p>
                                                    <!------------end Shiping---------->
                                                    <div style="position: absolute;width:33%;height:7px;border: 1px solid blue;top:5px;left:33%;"></div>

                                                      <div style="width:15px;height:15px;border: 1px solid blue;border-radius: 50%; top:0px;left:66%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:66%;">Delivered</p>

                                              </div>
                                                <?php }?>
                                                <?php
                                                 if($items['delivery']=="delivered"){?>


                                                 <div class="col-lg-12 text-center"style="width:100%;position: relative;">
                                                  <div style="width:15px;height:15px;background: blue;border-radius: 50%;"></div>
                                                    <p style="position: absolute;font-size: 12px;">Panding</p>
                                                   <div style="position: absolute;width:32%;height:7px;background: blue;top:5px;left:15px;"></div>
                                                   <!------------end panding---------->

                                                   <div style="width:15px;height:15px;background: blue;border-radius: 50%; top:0px;left:33%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:33%;">Shiping</p>
                                                    <!------------end Shiping---------->
                                                    <div style="position: absolute;width:33%;height:7px;background: blue;top:5px;left:33%;"></div>

                                                      <div style="width:15px;height:15px;background: blue;border-radius: 50%; top:0px;left:66%;position:absolute;"></div>
                                                    <p style="font-size: 12px;position: absolute;left:66%;">Delivered</p>

                                                <?php }?>
                                             
                                             
                                          </div></td>

                                      </tr>   
                                    <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Product Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
<!---------end search-------------->
 
    </tbody>
</table>

    </div>
   
</div>
</div>











    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>