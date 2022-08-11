<?php
 include '../db/dbconnect.php';


$id=$_GET['id'];

$status=0;
$query = "UPDATE coverageMaps SET status='$status' WHERE id='$id'";
$cov =mysqli_query($conn,$query);


if($cov){
	?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/CourierBD/dashboard/coverage-map.php">
      

	<?php
}else{

}
