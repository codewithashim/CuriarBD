<?php
session_start();
$message = "";

$current_path = "/CourierBD/auth/signup.php";


  include 'db/dbconnect.php';

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
<!-------------------------B4------------->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!---------------------end B4--------------->
  <title>CourierBD</title>
  <link rel="shortcut icon" href=".CourierBD/assets/img/favicon.ico" type="image/x-icon" />
</head>

<body>
  <?php include 'include/header.php';
 
  ?>
  <div class="container my-5">

    <div class="row">
      <div class="col-md-10 col-lg-10 col-11 mx-auto shadow-lg p-3 my-5 bg-light rounded">

        <h5 class="mb-3 text-center">Notice</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Dalete</th>
                </tr>
            </thead>
            <?php 
            $UserID =  $_SESSION["UserID"];
             $sql =  "SELECT * FROM users WHERE UserID='$UserID'";
             $result = mysqli_query($conn, $sql);
             while ($row = mysqli_fetch_assoc($result)){
             $username = $row['username'];

            $contact_sql =  "SELECT * FROM contact WHERE toEmail='$username' ORDER BY ContactID DESC";
            $contact_result = mysqli_query($conn, $contact_sql);
             while($contact = mysqli_fetch_assoc($contact_result)){ ?>

            <tbody>
                <tr>
                    <td scope="row"><?php echo $contact['name'] ?></td>
                    <td scope="row"><?php echo $contact['byEmail'] ?></td>
                    <td ><span class="font-weight-bold"><?php echo $contact['msg'] ?></span></td>
                    <td scope="row"><span class="badge badge-primary"><?php echo $contact['time'] ?></span</td>
                    <td>
                    <?php echo "<a class='btn-btn-danger' href='delete_message.php?ContactID=$contact[ContactID]'
                     onclick='return checkdelete()'>Delete</a>";?>
                    </td>
                </tr>
            </tbody>
            <?php } }?>
        </table>
      </div>
    </div>
  </div>
  <script>
  function checkdelete(){
			return confirm('Are you sure???');
  }
</script>
  <?php include 'include/footer.php' ?>
  <!--  JS Files -->
  <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
  <script src='/CourierBD/assets/js/app.js'></script>
</body>

</html>