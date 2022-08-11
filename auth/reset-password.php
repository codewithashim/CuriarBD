<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("Location: /CourierBD/");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/dbconnect.php';

    $username =  $_POST['username'];
    $birthday =  $_POST['birthday'];
    $pass1 =  $_POST['password1'];
    $pass2 =  $_POST['password2'];

    $sql1 = "SELECT * FROM `users` WHERE `username`='$username' AND `birthday`='$birthday'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $UserID = $row['UserID'];
    if ($UserID) {
        if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
            $sql = "UPDATE `users` SET `user_pass` = '$hashpass' WHERE `UserID` =$UserID";
            $result = mysqli_query($conn, $sql);
            $success = "<strong>Password Changed! </strong>You can now login!";
            header("Location: /CourierBD/auth/signin.php?success=$success");

        } else {
            $showError = "Passwords do not match";
            header("Location: /CourierBD/auth/reset-password.php?error=$showError");

        }
    } else {
        $showError = "User not found!";
        header("Location: /CourierBD/auth/reset-password.php?error=$showError");

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

    <title>CourierBD || Reset Password</title>
</head>

<body>
    <?php include '../include/header.php' ?>

    <div class="container ">
        <div class="row">
            <div class="col-md-6 col-lg-5 col-11 mx-auto shadow-lg p-3 p-sm-5 my-5 bg-white rounded">
                <h5 class="mb-0">Recover Password</h5>
                <small class="text-muted my-0 ">Enter your email and Date of birth to confirm your account</small>

                <form action="" class="mt-3" method='post'>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" minlength="5" class="form-control my-1" id="username" name="username"  required>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Date of Birth</label>
                        <input type="date" class="form-control my-1" id="birthday" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password1" name="password1" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Confirm Password</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password2" name="password2" required>
                    </div>
                    <button type="submit" class="btn btn-outline-dark fw-bold w-100 my-3">Update Password</button>
                </form>

            </div>
        </div>

    </div>


    <?php include '../include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>