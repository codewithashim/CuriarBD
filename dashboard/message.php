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
            <table class="table bg-white " style="font-size: 13px;">
            <thead class="bg-white">
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Email </th>
                    <th scope="col">Meaasge </th>
                    <th scope="col">Time </th>
                    <th scope="col">Replay </th>

                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php
                $sql =  "SELECT * FROM `contact`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {?>
            <tr>
    
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['msg'] ?></td>
                <td><?php echo $row['time'] ?></td>
                <td>
                    <?php echo "<a href='replay.php?ContactID=$row[ContactID]' class='btn btn-dark'>Replay</a>"; ?>
                </td>
            </tr>
    

             <?php   }

                ?>


            </tbody>
        </table>

       </div>
    </div>




    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>