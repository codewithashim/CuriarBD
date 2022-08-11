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

<body id="admin_root">

    <?php include 'header.php' ?>
    <?php include '../db/dbconnect.php' ?>
<?php $get_id = $_GET['OrderID']; 
$edit_sql =  "SELECT * FROM orders WHERE OrderID='$get_id'";
$edit_result = mysqli_query($conn, $edit_sql);
$edit = mysqli_fetch_assoc($edit_result); 

?>
    <div class="container my-5"><br/><br/>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card p-4">
                        <h4 class="text-center">Change Address </h4>
                <form action="" method='post' enctype="multipart/form-data">
             
                     <div class="form-group">
                        <label for="pheight">Change Address:</label>
                        <input type="text" value="<?php echo $edit['send_address']; ?>" placeholder="Enter new address" class="form-control my-1" id="pheight" name="address" required>
                    </div>
            
                    <button type="submit" name="change" class="btn btn-outline-dark w-100 my-3">Change Address</button>
                </form>
                </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
    </div>

<?php
if(isset($_POST['change'])){
    $get_id = $_GET['OrderID']; 
    $send_address= $_POST['address'];
	$edit_query ="UPDATE orders SET send_address='$send_address' WHERE OrderID='$get_id'";
    $query = mysqli_query($conn,$edit_query);

    if($query){
        ?>
          <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/CourierBD/dashboard/order.php">

        <?php
      }else{

      }
}
?>

    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>