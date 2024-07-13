<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	if (strlen($_SESSION['bpmsaid']==0)) {
		header('location:logout.php');
	} else {
		$sid=$_GET['dropid'];
		$query=mysqli_query($con, "delete from tblservices where ID='$sid'");
		if ($query) {
			$_SESSION['data']=3;
			header("location:manage-services.php"); 
		}
	}
?>
