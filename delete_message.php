<?php 
include 'db/dbconnect.php';

$get_contact_id=$_GET['ContactID'];

$m_query ="DELETE FROM contact WHERE ContactID='$get_contact_id'";

$delete =mysqli_query($conn,$m_query);

if($delete){
	?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/CourierBD/notice.php/">
        
	<?php
}else{

}






 ?>