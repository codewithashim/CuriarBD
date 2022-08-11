<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
  <body>
  <?php include 'include/header.php' ?>   

<div class="container my-5">
    <div class="row">
       

        <div class="col-lg-5">
        <?php
        include 'db/dbconnect.php';
        $get_id=$_GET['PackageID'];

        $sql =  "SELECT * FROM `packages` WHERE PackageID='$get_id'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
         
            $UserID = $row['UserID'];
   
			$to = $row['to'];
            $from = $row['from'];
            $price = $row['price'];
            $image = $row['image'];


       

            $sql1 =  "SELECT * FROM `users` WHERE `UserID`='$UserID'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $PeoviderName = $row1['full_name'];

        ?>
            <div class="card shadow mx-auto" style="">
            <div class="d-flex p-1">
                <h5><?php echo $PeoviderName ?></h5>
            </div>
            <img src="/CourierBD/assets/img/packages/<?php echo $UserID . "/" . $image ?>" class="card-img-top"style="height:260px;" alt="...">
            <div class="card-body py-2">  
        </div>
        </div>

       <?php } ?>
       <div class="card pt-4 p-2">
       <h5 class="card-title text-center"><b>Rating and Review</b></h5>
       <form method="POST">
                            <div class="form-group">
                            <select name="rating" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" class="text-success font-weight-bold">*</option>
                                    <option value="2">**</option>
                                    <option value="3">***</option>
                                    <option value="4">****</option>
                                    <option value="5">*****</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                            <input type="text" name="review" class="form-control"value="<?php ?>" placeholder="Review" required>
                                <div class="input-group-append">
                                    <button type="submit" name="submit" class=" btn btn-dark text-white font-weight-bold">
                                    <i class='fas fa-arrow-right' style='font-size:24px;color:white;'></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <!--------------------Review and rating Insert Data------------>
                    <?php
                        if(isset($_POST['submit'])){
                            $UserID =  $_SESSION["UserID"];
                            $get_id=$_GET['PackageID'];
                        
                            $rating =$_POST['rating'];
                            $review = $_POST['review'];
                            $date =date("h:m:a d-m-Y");
                            $rating = "INSERT INTO review VALUES(NULL,'$UserID','$get_id','$rating','$review','$date')";
                            $rating_run= mysqli_query($conn,$rating);
                            if($rating_run){
                                echo "<script>alert('Rating and review added');</script>";
								
                            }else{
                                echo "<script>alert('Not addedl');</script>";
								
                            }

                        }
                    
                    
                    ?>
                     <!--------------------End Review and rating Insert Data------------>
       </div>
        </div>
            <div class="col-lg-7">

                <div class="card shadow mx-auto" style="">
                    <div class="d-flex p-1">
                        <h5>Reting and review</h5>
         
                    </div>

       <!-------------------rating and review view--------->            
  <div class="card-body py-2">
 
 <?php

$one = "<i class='fas fa-star star-dark text-warning'></i>";
$two = "<i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i>";
$three= "<i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i>";
$four= "<i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i>";
$five= "<i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i><i class='fas fa-star star-dark text-warning'></i>";

?>


<?php 
 $get_id=$_GET['PackageID'];
 $rat_query =  "SELECT SUM(rating) AS rating FROM review WHERE package_id='$get_id'";
 $rat_run = mysqli_query($conn,$rat_query);
 $num_of_rows = mysqli_num_rows($rat_run);
$ave = mysqli_fetch_assoc($rat_run);
$rating = $ave['rating']/5;

?>

<h2 class="text-warning">Rating <?php echo $rating; ?>/5</h2>

<?php
   $review_query =  "SELECT * FROM review WHERE package_id='$get_id'";
   $review_run = mysqli_query($conn,$review_query);
 
   while($review = mysqli_fetch_assoc($review_run)){
       
    
     $get_id=$_GET['PackageID'];

if($review['package_id'] == $get_id){ ?>
    <div class="card">
       
         <div class="card-header bg-light">
           <div class="row">
         
           <div class="col-lg-5 text-light">
            <?php if($review['rating'] == 1){
                   echo $one;
               }
               if($review['rating'] == 2){
                   echo $two;
               }
                   if($review['rating'] == 3){
                   echo $three;
               }
                   if($review['rating'] == 4){
                   echo $four;
               }
               if($review['rating'] == 5){
                   echo $five;
               }
               else{

               }?>
</div>
<div class="col-lg-6 text-dark">
    <?php echo $review['review']; ?>
</div>
</div>
</div>
             <?php  }?> 
             <?php } ?>
</div>


</div>
                      <!-------------------rating and review view--------->
                       
                      
                    </div>

                </div>
                
            </div>

    </div>
<br><br><br><br>
</div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>