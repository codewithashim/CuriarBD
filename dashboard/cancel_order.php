<?php
 include '../db/dbconnect.php';





 $delivery_id=$_GET['OrderID'];
$query = "DELETE FROM orders WHERE OrderID='$delivery_id'";
$delivery =mysqli_query($conn,$query);


if($delivery){
	?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/CourierBD/dashboard/order.php">
      

	<?php
}else{

}




 ?>