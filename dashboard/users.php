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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/dbconnect.php';

    $full_name =  $_POST['signupName'];
    $username =  $_POST['signupUsername'];
    $birthday =  $_POST['signupBirthday'];
    $mobile =  $_POST['signupMobile'];
    $address =  $_POST['signupAddress'];
    $user_type =  $_POST['user_type'];
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
        $message = "User already in use";
        // header("Location: $current_path?error=$showError");
    } else {
        if ($pass1 == $pass2) {
            $hashpass = password_hash($pass1, PASSWORD_DEFAULT);
            if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
                if ($size <= 2097152) {
                    $sql = "INSERT INTO `users` (`full_name`, `user_pass`,`username`,`birthday`,`mobile`,`address`,`image`,`user_type`) 
                    VALUES ('$full_name', '$hashpass','$username','$birthday','$mobile','$address','$image','$user_type')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        $path = "../assets/img/profile/" . $username;
                        if (!is_dir($path)) {
                            mkdir($path);
                        }
                        move_uploaded_file($tmp_name, $path . "/" . $image);

                        $message = "<strong>Success! </strong>User can now login!";
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
    <link rel="stylesheet" href='/CourierBD/assets/bootstrap/css/bootstrap.min.css'>
    <link rel=" stylesheet" href='/CourierBD/assets/css/style.css'>
    <link rel="stylesheet" href='/CourierBD/assets/font-awesome/css/font-awesome.min.css'>

    <title>CourierBD || Dashboard</title>
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon" />
</head>

<body id="admin_root">

    <?php include 'header.php' ?>
    <?php include '../db/dbconnect.php' ?>

    <div class="container my-5">

        <h5 class="py-3">User Information</h5>

        <table class="table bg-white " style="font-size: 13px;">
            <thead class="bg-white">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">User Type</th>

                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php
                $sql =  "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $UserID  = $row['UserID'];
                    $full_name = $row['full_name'];
                    $address = $row['address'];
                    $mobile = $row['mobile'];
                    $user_type = $row['user_type'];


                    echo '
                    <tr>
                        <td>
                            ' . $full_name . '
                        </td>
                        <td>
                            ' . $address . '
                        </td>
                
                        <td>
                            ' . $mobile . '
                        </td>
                
                        <td>
                            ' . $user_type . '
                        </td>
           
                
                    </tr>

                ';
                }

                ?>


            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-11 mx-auto shadow-lg p-3 p-sm-5 my-2 bg-white rounded">
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
                <h5 class="mb-3">Add Service Provider</h5>
                <form action="" method='post' enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="signupName">Name </label>
                        <input type="text" minlength="5" class="form-control my-1" id="signupName" name="signupName" required>
                    </div>
                    <div class="form-group">
                        <label for="signupUsername">Username</label>
                        <input type="text" minlength="5" class="form-control my-1" id="signupUsername" name="signupUsername" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="signupMobile">Mobile</label>
                        <input type="text" minlength="5" class="form-control my-1" id="signupMobile" name="signupMobile" aria-describedby="emailHelp" required>
                    </div>
                    <div class="form-group">
                        <label for="signupBirthday">Date of Birth</label>
                        <input type="date" class="form-control my-1" id="signupBirthday" name="signupBirthday" required>
                    </div>
                    <div class="form-group">
                        <label for="user_type">User type</label>
                        <select name="user_type" id="user_type" class="form-select my-1" required>
                            <option>admin</option>
                            <option>provider</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="signupPassword1">Password</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password1" name="signupPassword1" required>
                    </div>
                    <div class="form-group">
                        <label for="signupPassword2">Confirm Password</label>
                        <input type="password" minlength="8" class="form-control my-1" id="password2" name="signupPassword2" required>
                    </div>
                    <div class="form-group">
                        <label for="signupAddress">Address</label>
                        <textarea class="form-control" id="signupAddress" name="signupAddress" rows="2" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Select image</label>
                        <input type="file" class="form-control-file my-2" id="image" name="image" requiredrequired>
                    </div>
                    <div class="form-group form-check my-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <small>
                            <label class="form-check-label" for="exampleCheck1">I agree to <b>CourierBD's</b> Terms of Service and Privacy Policy.</label>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-dark w-100 my-3"><b>Add Account</b></button>
                </form>

            </div>
        </div>

    </div>



    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>