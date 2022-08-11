<style>
    .form-control:focus{
        box-shadow: none !important;
        background: transparent;
    }
</style>
<div class="row fixed-top " id="_modal" >
    <div class="col-md-5  col-lg-4 col-11 mx-auto shadow-lg p-3 p-sm-5 mt-5 rounded" style="background: lightcyan; ">
        <span class="modal_close " onclick="modal_colse()" style="color: #000; 
    top: -40px;
    right: -260px;"><i class="fa fa-close" aria-hidden="true"></i></span>
        <h4 style="font-weight: 700;">Subcribe Our Website</h4>
        <small>CourierBD is a Bangladeshi Courier based website. Stay tune to our website for regular updates.</small>
        <form action="" method='post' class="py-4">
            <div class="form-group">
                <input class="form-control" id="email " name="email" type="email" placeholder="Enter your email">
            </div>
            <button type="submit" class="btn btn-outline-dark w-100 my-3">Subscribe</button>
        </form>


    </div>


</div>



<div class="">
    <div id="carouselExampleCaptions" class="carousel slide " data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="/CourierBD/assets/img/slider/s1.jpg" alt="">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/CourierBD/assets/img/slider/s2.jpg" alt="">
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/CourierBD/assets/img/slider/s3.jpg" alt="">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <?php
        include 'db/dbconnect.php';

        $sql =  "SELECT * FROM `packages`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $PackageID   = $row['PackageID'];
            $UserID = $row['UserID'];
            $to = $row['to'];
            $from = $row['from'];
		    $packagename=$row['packageName'];
		    $pw=$row['weight'];
			$pheight=$row['height'];
			$pwidth=$row['width'];
			
            $price = $row['price'];
            $image = $row['image'];
			

            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
                $order_url = 'order.php?id=' . $PackageID . '&p=' . $UserID;
            } else {
                $order_url = '';
            }


            $sql1 =  "SELECT * FROM `users` WHERE `UserID`='$UserID'";
            $result1 = mysqli_query($conn, $sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $PeoviderName = $row1['full_name'];




        ?>
            <div class="col-lg-4 col-md-6  g-5">

                <div class="card shadow mx-auto" style="width:18rem">
                    <div class="d-flex p-1">
                        <h5><?php echo $PeoviderName ?></h5>
                        <div class="dropdown dropstart ms-auto me-2 my-0 py-0">
                            <a class="" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h text-muted"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="report.php?p=<?php echo $UserID ?>">Report</a></li>
                                <li> <?php echo "<a class='dropdown-item' href='rating&review.php?PackageID=$row[PackageID]'>Rating & review</a>";?></li>
                            </ul>
                        </div>
                    </div>

                    <img src="/CourierBD/dashboard/<?php echo $image ?>" class="card-img-top" alt="...">
                    <div class="card-body py-2">
                        <h5 class="card-title text-center"><b>Package Pickup</b></h5>
                        <small class="text-muted d-block"> <b>Location</b> : <?php echo $from ?> - <?php echo $to ?></small>
						<small class="text-muted d-block"> <b>Package Name</b> : <?php echo $packagename ?></small>
						<small class="text-muted d-block"> <b>Package weight</b> : <?php echo $pw ?></small>
						<small class="text-muted d-block"> <b>Package height</b> : <?php echo $pheight ?></small>
						<small class="text-muted d-block"> <b>Package width</b> : <?php echo $pwidth ?></small>
                        <small class="text-muted d-block"> <b>Price</b> : <?php echo $price ?> BDT</small>
                        <a href="<?php echo $order_url ?>" class="btn btn-dark my-2 btn-sm w-100 "><b>Schedule Now</b></a>
                        
                    </div>

                </div>
            </div>

        <?php


        }

        ?>
    </div>




</div>

<script>
    const modal_colse = () => {
        document.getElementById("_modal").style.display = "none";
    }
    <?php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
    ?>
        document.getElementById("_modal").style.display = "none";
    <?php
    }

    ?>
</script>