<?php
session_start();
$message = "";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    header("Location: /CourierBD/");
}
$current_path = "/CourierBD/auth/signup.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/dbconnect.php';

    $full_name =  $_POST['signupName'];
    $username =  $_POST['signupUsername'];
    $birthday =  $_POST['signupBirthday'];
    $mobile =  $_POST['signupMobile'];
    $address =  $_POST['signupAddress'];
    $pass1 =  $_POST['signupPassword1'];
    $pass2 =  $_POST['signupPassword2'];

    $image =  $_FILES['image']['name'];
    $tmp_name =  $_FILES['image']['tmp_name'];
    $size =  $_FILES['image']['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);


    $existsql = "SELECT * FROM `users` WHERE `username` = '$username'";

    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);


    if ($numRows > 0) {
        $showError = "User already in use";
        header("Location: $current_path?error=$showError");
    } else {
        if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
            if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
                if ($size <= 2097152) {
                    $sql = "INSERT INTO `users` (`full_name`, `user_pass`,`username`,`birthday`,`mobile`,`address`,`image`) VALUES ('$full_name', '$hashpass','$username','$birthday','$mobile','$address','$image')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $path = "../assets/img/profile/" . $username;
                        if (!is_dir($path)) {
                            mkdir($path);
                        }
                        move_uploaded_file($tmp_name, $path . "/" . $image);

                        $success = "<strong>Success! </strong>You can now login!";
                        header("Location: /CourierBD/auth/signin.php?success=$success");
                    }
                } else {
                    $message = "Image should be or Less or Equal 2 MB!";
                }
            } else {
                $message = "Your file is invalid! Please upload PBG or JPG file";
            }
        } else {
            $message = "Passwords do not match";
        }
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

    <title>CourierBD || Registration</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include '../include/header.php' ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-11 mx-auto shadow-lg p-3 p-sm-5 my-5 bg-light rounded">
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
                <h5 class="mb-3" style="text-align:center;">Create account</h5>
                <form action="" method='post' enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="signupName">Full Name: </label>
                        <input type="text" minlength="5" class="form-control my-1" id="signupName" name="signupName"  required>
                    </div>
                    <div class="form-group">
                        <label for="signupUsername">Email:</label>
                        <input type="email" minlength="5" class="form-control my-1" id="signupUsername" name="signupUsername" aria-describedby="emailHelp"  required>
                    </div>
                    <div class="form-group">
                        <label for="signupMobile">Mobile:</label>
                        <input type="text" minlength="5" class="form-control my-1" id="signupMobile" name="signupMobile" aria-describedby="emailHelp"  required>
                    </div>
                    <div class="form-group">
                        <label for="signupBirthday">Date of Birth:</label>
                        <input type="date" class="form-control my-1" id="signupBirthday" name="signupBirthday"  required>
                    </div>

                    <div class="form-group">
                        <label for="signupPassword1">Password:</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password1" name="signupPassword1"  required>
                    </div>
                    <div class="form-group">
                        <label for="signupPassword2">Confirm Password:</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password2" name="signupPassword2"  required>
                    </div>
                    <div class="form-group">
                        <label for="signupAddress">Address:</label>
                        <textarea class="form-control" id="signupAddress" name="signupAddress" rows="2"  required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Select image</label>
                        <input type="file" class="form-control-file my-2" id="image" name="image"  required>
                    </div>
                    <div class="form-group form-check my-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1"  required>
                        <small>
                            <label class="form-check-label" for="exampleCheck1">I agree to <b>CourierBD's</b> Terms of Service and Privacy Policy.</label>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100 my-3"><b>Registration</b></button>
                </form>
                <div class="text-center">
                    <small>Already have an account?
                        <a class="" href="/CourierBD/auth/signin.php">login</a>
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