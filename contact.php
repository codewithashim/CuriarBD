<?php
session_start();
$message = "";

$current_path = "/CourierBD/auth/signup.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'db/dbconnect.php';

  $name =  $_POST['name'];
  $email =  $_POST['email'];
  $msg =  $_POST['msg'];
  $byEmail = "admin@gmail.com";
  $sql = "INSERT INTO `contact` (`name`,`byEmail`, `toEmail`,`msg`) VALUES ('$name', '$email','$byEmail','$msg')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $message = "<strong>Success! </strong> Form submitted...";
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
  <link rel="stylesheet" href='/CourierBD/assets/font-awesome/css/font-awesome.min.css'>

  <title>CourierBD</title>
  <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
  <style><?php include './assets/css/style.css' ?></style>
  <?php include 'include/header.php' ?>

  <div class="">
    <div class="contact-wrapper">
      <div class="contact__side-img">
        <img src="./assets/img/undraw_mobile_user_re_xta4.svg" alt=""  >
      </div>
      <div class="form">
        <h2 class="text-center">
          Contact Us
        </h2>
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
        <form action="" method='post'>
          <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" class="form-control my-1" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control my-1" id="email" name="email" required>
          </div>
          <div class="form-group my-2">
            <label for="msg">Enter Message </label>
            <textarea class="form-control my-1" id="msg" name="msg" rows="3"></textarea>
          </div>

          <button type="submit" class="btn btn-dark w-50  mx-auto fw-bold">Submit</button>
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