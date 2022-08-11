<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CourierBD</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<style>
.img{
  position:relative;
}

.fas1{
  position:absolute;
  left:380px;
  top:180px;
  font-size:30px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas2{
  position:absolute;
  left:260px;
  top:260px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas3{
  position:absolute;
  left:420px;
  top:440px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas4{
  position:absolute;
  left:120px;
  top:190px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas5{
  position:absolute;
  left:160px;
  top:380px;
  font-size:30px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas6{
  position:absolute;
  left:260px;
  top:410px;
  font-size:30px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas7{
  position:absolute;
  left:120px;
  top:70px;
  font-size:30px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
.fas8{
  position:absolute;
  left:270px;
  top:180px;
  font-size:30px;
  animation-name: map;
  animation-duration: 4s;
  animation:map 3s linear infinite;
}
@keyframes map{
 0%{
   transform:scale( .65);
 }
 20%{
   transform:scale( 1);
 }
 40%{
   transform:scale( .65);
 }
 60%{
   transform:scale( 1);
 }
 80%{
   transform:scale( .65);
 }
 100%{
   transform:scale( .65);
 }
}
  </style>
</head>
<body>

<?php include 'include/header.php' ?>
<div class="con"style="background-color:#f7f7f7;">

  <h2 class="pl-5 pr-5 pt-3 pb-2 text-dark text-center">Coverage Map</h2>
<!-------------------------Map------------->
<div class="row">
  <div class="col-lg-1"></div>
<div class="col-lg-5">
      <div>
        <img class="img"src="image/map/WhatsApp Image 2022-04-18 at 4.11.36 AM.jpeg" style="
           width:500px;">
  <?php include 'db/dbconnect.php' ?>
<?php 
$sql =  "SELECT * FROM coveragemaps WHERE area='Sylhet'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas1 fa-map-marker-alt' style=''></i>";
  }else{
    echo "<i class='fas fas1 fa-ban'></i>";
  }
}
?>
<?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Dhaka'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas2 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas2 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>

<?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Chattogram'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas3 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas3 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>
  <?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Rajshahi'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas4 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas4 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>   
<?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Khulna'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas5 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas5 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?> 

<?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Rajshahi'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "  <i class='fas fas6 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas6 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>    

<?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Rangpur'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo " <i class='fas fas7 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas7 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>         
  <?php
$sql =  "SELECT * FROM coveragemaps WHERE area='Mymenshingh'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['status']=="1"){
    echo "<i class='fas fas8 fa-map-marker-alt' style='font-size:30px;'></i>";
  }else{
    echo "<i class='fas8 fas fa-ban'style='font-size:30px;'></i>";
  }
}
?>  
            
   
        
         
          
</div>
  </div>
  <div class="col-lg-4"><br><br><br>

                    <!---------------------------area------------------->
                    <h6 class="list-group-item list-group-item-action bg-dark active">All of Bangladesh</h6>
                    <ul class="list-group">
                      <?php

                      $sql =  "SELECT * FROM coveragemaps WHERE status='1'";
                      $result = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_assoc($result)){?>
                      
                        <li class="list-group-item d-flex font-weight-bold align-items-center">
                        <span class="badge badge badge-pill mr-2"><i class="fa fa-angle-right font-weight-bold"></i> </span>
                        <?php echo $row['area']; ?>
                        </li>
                <?php } ?>
                    </ul>
  </div>
  <div class="col-lg-2"> </div>
  </div>
</div>
<!----------------------Map End--------------------->
</div>
<?php include 'include/footer.php' ?>
</body>
</html>
