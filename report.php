<?php
session_start();
$Report_to  =  $_GET["p"];

$message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db/dbconnect.php';

    $report =  $_POST['report'];
    $UserID =  $_SESSION["UserID"];

    $image =  $_FILES['image']['name'];
    $tmp_name =  $_FILES['image']['tmp_name'];
    $size =  $_FILES['image']['size'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    if ($image) {
        if ($ext == 'jpg' or $ext == 'png' or $ext == 'jpeg') {
            if ($size <= 2097152) {
                $sql = "INSERT INTO `reports` (`report`,`Report_by`,`Report_to`,`image` ) 
                VALUES ('$report','$UserID','$Report_to','$image')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $path = "../assets/img/report/" . $UserID;
                    if (!is_dir($path)) {
                        mkdir($path);
                    }
                    move_uploaded_file($tmp_name, $path . "/" . $image);
                    $success = "<strong>Success! </strong> submitted...";
                    header("Location: /CourierBD/?success=$success");
                }
            } else {
                $message = "Image should be or Less or Equal 2 MB!";
            }
        } else {
            $message = "Your file is invalid! Please upload PBG or JPG file";
        }
    } else {
        $sql = "INSERT INTO `reports` (`report`,`Report_by`,`Report_to` ) 
        VALUES ('$report','$UserID','$Report_to')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $success = "<strong>Success! </strong> submitted...";
            header("Location: /CourierBD/?success=$success");
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
    <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
    <?php include 'include/header.php' ?>
    <div class="container my-5">

        <div class="row">
            <div class="col-md-6 mx-auto shadow-lg p-3 py-5 bg-light rounded">
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
                <h5 class="mb-3">Report to Admin</h5>
                <form action="" method='post'>
                    <div class="form-group">
                        <textarea class="form-control" id="report" name="report" rows="2" required></textarea>
                    </div>
					 <div class="form-group my-3">
                        <label for="image">Select image</label>
                        <input type="file" class="form-control-file my-2" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-outline-dark w-100 my-3">Send</button>
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