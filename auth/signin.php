<?php
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("Location: /CourierBD/");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/dbconnect.php';
    $loginUsername =  $_POST['loginUsername'];
    $loginPass =  $_POST['loginPassword'];

    $sql = "SELECT * FROM `users` WHERE `username` = '$loginUsername'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    $current_path = "/CourierBD/auth/signin.php";
    if ($numRows == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            // $user_type = $row['user_type'];
            $UserID  = $row['UserID'];
            $user_type = $row['user_type'];
            $user_pass_hash = $row['user_pass'];
            if (password_verify($loginPass, $user_pass_hash)) {
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["UserID"] =   $UserID;
                $_SESSION["user_type"] =   $user_type;
                header("Location: /CourierBD/");
            } else {
                $showError = "Passwords do not match";
                header("Location: $current_path?error=$showError");
            }
        }
    } else {
        $showError = "User not found";
        header("Location: $current_path?error=$showError");
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

    <title>CourierBD || Login</title>
	<link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include '../include/header.php' ?>

    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-lg-5 col-11 mx-auto shadow-lg p-3 p-sm-5 my-5 bg-light rounded">
                <h5 class="mb-3">Login to CourierBD</h5>

                <form action="" method="post">
                    <div class="form-group my-2">
                        <label for="">Username:</label>
                        <input type="text" minlength="5" class="form-control" id="loginEmail" name="loginUsername" aria-describedby="emailHelp" required>

                    </div>
                    <div class="form-group ">
                        <label for="exampleInputPassword1">Password:</label>
                        <input type="password" minlength="8" class="form-control" id="password" name="loginPassword" required>
                        <small>
                            <a href="/CourierBD/auth/reset-password.php" id="" class="text-primary">Forgot password?</a>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100 my-3"><b>Login</b></button>
                </form>
                <div class="text-center">
                    <small>No Account?
                        <a class="" href="/CourierBD/auth/signup.php">Registration</a>
                    </small>
                </div>
            </div>
        </div>

    </div>


    <?php include '../include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>