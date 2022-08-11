<?php
session_start();
$UserID = $_SESSION["UserID"];

$message = "";
if (!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true) {
   // header("Location: /CourierBD/");
} else {
    $user_type = $_SESSION['user_type'];
    if ($user_type == 'user') {
       // header("Location: /CourierBD/");
    }
}


$current_path = "/CourierBD/dashboard/package.php";
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
                    <th scope="col">Package ID </th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
					<th scope="col">Price</th>
					<th scope="col">Package Name</th>
					 <th scope="col">Package weight</th>
					 <th scope="col">Package height</th>
					 <th scope="col">Package width</th>
					
					
      

                </tr>
            </thead>

            <tbody class="text-secondary bg-light">

                <?php
                $sql =  "SELECT * FROM packages";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $PackageID   = $row['PackageID'];
                    $from = $row['from'];
                    $to = $row['to'];
                    $price = $row['price'];
					@$packagename=$row['packageName'];
					@$pw=$row['weight'];
					@$pheight=$row['height'];
	                @$pwidth=$row['width'];
					

                    echo '
                    <tr>
                        <td>' . $PackageID . '</td>
                        <td>' . $from . '</td>
                        <td>' . $to . '</td>
                        <td> ' . $price . ' BDT</td>
						<td>' . $packagename . '</td>
						<td>' . $pw . '</td>
						<td>' . $pheight. '</td>
						<td>' .$pwidth . '</td>
                    </tr>

                ';
                }

                ?>


            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-5 col-11 mx-auto shadow-lg p-3 my-2 bg-white rounded">
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
                <h5 class="mb-3">Add Courier Package</h5>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="from">From:</label>
                        <select class="form-select" name="from" id="from"  required>
                            <option selected>Select One</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Barishal">Barishal</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Mymensungh">Mymensungh</option>
							<option value="Jassore">Jassore</option>
                        </select>
                    </div>
                    <div class="form-group my-1">
                        <label for="to">To:</label>
                        <select class="form-select" name="to" id="to"  required>
                            <option  selected>Select One</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chattogram">Chattogram</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Mymensungh">Mymensungh</option>
							<option value="Jassore">Jassore</option>
                        </select>
                    </div>
					<div class="form-group">
                        <label for="packagename">Package Name:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="packagename" name="packagename" required>
                    </div>
                        <div class="form-group">
                        <label for="pw">Package Weight:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="pw" name="pw" required>
                    </div>
					
                        <div class="form-group">
                        <label for="pheight">Package Height:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="pheight" name="pheight" required>
                    </div>
					
                        <div class="form-group">
                        <label for="pwidth">Package Width:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="pwidth" name="pwidth" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" minlength="1" class="form-control my-1" id="price" name="price" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Select Image</label>
                        <input type="file" class="form-control-file my-2" id="image" name="uploadfile1" required>
                    </div>
                    <div class="form-group form-check my-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <small>
                            <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
                        </small>
                    </div>
                    <button type="submit"  name="sub" class="btn btn-outline-dark w-100 my-3">Add Package</button>
                </form>
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php


if (isset($_POST['sub'])) {
    include '../db/dbconnect.php';

    $from =  $_POST['from'];
    $to =  $_POST['to'];
    $price =  $_POST['price'];
    $packagename=$_POST['packagename'];
    $pw=$_POST['pw'];
	$pheight =$_POST['pheight'];
	$pwidth=$_POST['pwidth'];
   $user_id=44;

    $filename1 = $_FILES['uploadfile1']['name'];
    $tempname1 =$_FILES['uploadfile1']['tmp_name'];
    $image ="image/".$filename1;
    move_uploaded_file($tempname1,$image);

  

            $sql = "INSERT INTO packages VALUES(null,'$user_id','$packagename','$from','$price','$image','$to','$pw','$pheight','$pwidth')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                 echo "<script>alert('Package added success');</script>";
            }else{
                 echo "<script>alert('package added failed');</script>";
            }
        } 
    

?>
            </div>
        </div>

    </div>
	</div>



    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>