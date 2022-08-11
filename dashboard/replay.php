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

        <h5 class="py-3">Messages</h5>

       <div class="container">
     <?php 
$get_ContactID = $_GET['ContactID'];

 $sql =  "SELECT * FROM `contact` WHERE ContactID='$get_ContactID'";
 $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

             ?>
     <div class="row">
     	<div class="col-lg-2"></div>
     	<div class="col-lg-8">
     	 <div class="card p-4">
     		<form action="" method='post'>
        
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control my-1" value="<?php echo $row['byEmail']; ?>" id="email" name="email" required>
          </div>
          <div class="form-group my-2">
            <label for="msg">Enter Message </label>
            <textarea class="form-control my-1" id="msg" name="msg" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-outline-dark w-100 my-3 fw-bold">Submit</button>
        </form>
     	</div>
     	</div>
     	<div class="col-lg-2"></div>
     </div>
       </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

 include '../db/dbconnect.php';
  $name =  "CourierBD";
  $email =  $_POST['email'];
  $msg =  $_POST['msg'];
  $toEmail = $row['byEmail'];
  $byEmail = "admin@gmail.com";
  $sql = "INSERT INTO `contact` (`name`,`byEmail`, `toEmail`,`msg`) VALUES ('$name', '$byEmail','$toEmail','$msg')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    echo "<script>alert('Message send success');</script>";
  }
}

?>



    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>