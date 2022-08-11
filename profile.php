<?php
session_start();
$UserID =  $_SESSION["UserID"];


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

    <title>CourierBD</title>
</head>

<body>
    <?php
    include 'include/header.php';
    include 'db/dbconnect.php';
    $sql =  "SELECT * FROM `users` WHERE `UserID`='$UserID'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $UserID  = $row['UserID'];
        $full_name = $row['full_name'];
        $username = $row['username'];
        $image = $row['image'];

        if ($image) {
            $img = '<img class="w-100 rounded-circle" src="/CourierBD/assets/img/profile/' . $username . '/' . $image . '" alt="">';
        } else {

            $img = '<i class="fa fa-user-circle fa-5x" aria-hidden="true"></i>';
        }
    }

    ?>

    <div class="container ">
        <div class="row">
            <div class="col-md-8 col-lg-6 col-11 mx-auto shadow-lg p-3 p-sm-5 my-5 bg-white rounded">
                <div class="text-center  mx-auto" style="max-width: 120px;">
                    <?php echo $img ?>
                    <h6 class="my-2 text-muted">
                        <?php echo $full_name ?>
                    </h6>

                </div>

            </div>


        </div>


        <h5 class="pt-3">Reports Informations</h5>

        <table class="table bg-white " style="font-size: 13px;">
            <thead class="bg-white">
                <tr>
                    <th scope="col">Report ID </th>
                    <th scope="col">Report to </th>
                    <th scope="col">Report </th>
                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php

                $sql =  "SELECT * FROM `reports` WHERE `Report_by`=$UserID  ";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $ReportID    = $row['ReportID'];
                    $Report_to    = $row['Report_to'];
                    $report    = $row['report'];


                    $sql2 =  "SELECT * FROM `users` WHERE `UserID`='$Report_to'";
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



    <?php include 'include/footer.php' ?>
    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>