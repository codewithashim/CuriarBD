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

if(isset($_POST['add'])) {
    include '../db/dbconnect.php';

    $title = $_POST['title'];
    $size = $_POST['size'];
    $width = $_POST['width'];
    $length = $_POST['length'];
    $category=$_POST['category'];
    $price =$_POST['price'];
    $description=$_POST['description'];

    $filename1 = $_FILES['uploadfile1']['name'];
    $tempname1 =$_FILES['uploadfile1']['tmp_name'];
     $upload ="../assets/img/product/".$filename1;
    $image ="assets/img/product/".$filename1;
    move_uploaded_file($tempname1,$upload);

   
    $time =date("h:m:a d-m-Y");

    
    $sql = "INSERT INTO products VALUES(NULL,'$title','$size','$width','$length','$category','$price',
    '$description','$image','$time')";
    $query = mysqli_query($conn,$sql);

    
    if($query){
        ?>
         
         <META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/CourierBD/dashboard/all-product.php">
        <?php
      }else{

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

        <h5 class="py-3">Add Product</h5>


    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-5 col-11 mx-auto shadow-lg p-3 my-2 bg-white rounded">
     
                <h5 class="mb-3">Add Product</h5>
                <form action="" method='post' enctype="multipart/form-data">
  
					<div class="form-group">
                        <label >Company Product Title:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="packagename" name="title" required>
					</div>
                        <div class="form-group">
                        <label >Size:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="packagename" name="size" required>
                    </div>
                        <div class="form-group">
                        <label >width:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="packagename" name="width" required>
                    </div>
                        <div class="form-group">
                        <label >Hight:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="packagename" name="length" required>
                    </div>
                        <div class="form-group">
                        <label >Category:</label>
                        <input type="text" minlength="1" class="form-control my-1" id="pheight" name="category" required>
                    </div>
					
                        <div class="form-group">
                        <label >Price:</label>
                        <input type="number" minlength="1" class="form-control my-1" id="pwidth" name="price" required>
                    </div>
                    <div class="form-group">
                        <label >Description:</label>
                        <input type="text" minlength="1" style=""class="form-control my-1" id="price" name="description" required>
                    </div>
                    <div class="form-group">
                        <label >Select Image</label>
                        <input type="file" name="uploadfile1" class=""
                         aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="form-group form-check my-2">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <small>
                            <label class="form-check-label" for="exampleCheck1">Are you sure?</label>
                        </small>
                    </div>
                    <button type="submit"name="add" class="btn btn-outline-dark w-100 my-3">Add Product</button>
                </form>

            </div>
        </div>

    </div>
	</div>



    <!--  JS Files -->
    <script src='/CourierBD/assets/bootstrap/js/bootstrap.bundle.js'></script>
    <script src='/CourierBD/assets/js/app.js'></script>

</body>

</html>