<?php
	session_start();
	$db = mysqli_connect ('localhost','root','','ecom-web');
	
	if(isset($_POST['registerdeletebtn'])){
		$id = $_POST['delete_id'];

		$sql = "DELETE FROM admin_register WHERE ad_id='$id'";
		$sql_run = mysqli_query($db, $sql);

		if($sql_run){
			$_SESSION['message'] = "You data have been deleted.";
			header("location: admin.php");
		}
		else{
			$_SESSION['message'] = "Failed to Delete.";
			header("location: admin.php");
	}
}
?>