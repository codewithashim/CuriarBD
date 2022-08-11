<?php
session_start();
include 'db/dbconnect.php';

$UserID  =  $_SESSION["UserID"];

$sql = "SELECT * FROM `users` WHERE `UserID`=$UserID";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$full_name = $row['full_name'];
$birthday = $row['birthday'];
$mobile = $row['mobile'];
$address = $row['address'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['full_name'])) {
        $full_name = $_POST['full_name'];
        $birthday = $_POST['birthday'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        $sql = "UPDATE `users` SET `full_name` = '$full_name', `birthday` = '$birthday', `mobile` = '$mobile' , `address`='$address'  WHERE `UserID` =$UserID";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            $current_path = "/CourierBD/settings.php";
            $success = "<strong>Success! </strong>Profile Updated";
            header("Location: $current_path?success=$success");
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

    <title>CourierBD</title>
</head>

<body>
    <?php include 'include/header.php' ?>

    <div class="container my-3">
        <div class="row">
            <div class="col-lg-8 mx-auto shadow p-3  bg-white rounded">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                        <button class="nav-link" id="nav-account-tab" data-bs-toggle="tab" data-bs-target="#nav-account" type="button" role="tab" aria-controls="nav-account" aria-selected="false">Account</button>
                        <button class="nav-link " id="nav-security -tab" data-bs-toggle="tab" data-bs-target="#nav-security " type="button" role="tab" aria-controls="nav-security " aria-selected="true">Security </button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                            <div class="col-md-10 mx-auto p-3  bg-white rounded">
                                <h5 class="mb-3">Your Profile Information</h5>
                                <form action="" method='post'>
                                    <div class="form-group">
                                        <label for="full_name">Full Name: </label>
                                        <input type="text" minlength="5" class="form-control my-1" id="full_name" name="full_name" value="<?php echo $full_name ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="mobile">Mobile:</label>
                                        <input type="text" minlength="5" class="form-control my-1" id="mobile" name="mobile" value="<?php echo $mobile ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="birthday">Date of Birth:</label>
                                        <input type="date" class="form-control my-1" id="birthday" name="birthday" value="<?php echo $birthday ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <textarea class="form-control" id="address" name="address" rows="2" required><?php echo $address ?></textarea>
                                    </div>

                                    <div class="form-group form-check my-2">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <small>
                                            <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
                                        </small>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100 my-3"><b>Update Your Profile</b></button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                        <p><strong>Page is under construction.</strong></p>
                    </div>
                    <div class="tab-pane fade " id="nav-security " role="tabpanel" aria-labelledby="nav-security -tab">
                        <p><strong>This is some placeholder content the security tab's associated content.</strong> Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling. You can use it with tabs, pills, and any other <code>.nav</code>-powered navigation.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>