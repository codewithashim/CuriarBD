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


$current_path = "/CourierBD/dashboard/package.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../db/dbconnect.php';

    $location =  $_POST['location'];
    $size =  $_POST['size'];
    $email =  $_POST['email'];
    $mobile =  $_POST['mobile'];
    $price =  $_POST['price'];

    $sql = "INSERT INTO `packages` (`location`, `size`,`email`,`mobile`,`price`,`UserID`) VALUES ('$location', '$size','$email','$mobile','$price','$UserID')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $success = "<strong>Success! </strong>package added!";
        header("Location: $current_path?success=$success");
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

        <h5 class="py-3">Reports Informations</h5>

        <table class="table bg-white " style="font-size: 13px;">
            <thead class="bg-white">
                <tr>
                    <th scope="col">Report ID </th>
                    <th scope="col">Report by </th>
                    <th scope="col">Report </th>



                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php
                $sql =  "SELECT * FROM `reports` ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ReportID    = $row['ReportID'];
                    $Report_by    = $row['Report_by'];
                    $report    = $row['report'];

                    $sql2 =  "SELECT * FROM `users` WHERE `UserID`='$Report_by'";
                    $result2 = mysqli_query($conn, $sql2);
                    while ($row = mysqli_fetch_assoc($result2)) {
                        $full_name = $row['full_name'];
                    }


                    echo '
                    <tr>
                        <td>' . $ReportID . '</td>
                        <td>' . $full_name  . '</td>
                        <td>' . $report  . '</td>


                    </tr>

                ';
                }

                ?>


            </tbody>
        </table>
    </div>




    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>