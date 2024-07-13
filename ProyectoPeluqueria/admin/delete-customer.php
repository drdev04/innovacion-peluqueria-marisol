<?php
	session_start();
	error_reporting(0);
	include('includes/dbconnection.php');
	if (strlen($_SESSION['bpmsaid']==0)) {
		header('location:logout.php');
	} else {
		$did=$_GET['dropid'];
		$query=mysqli_query($con, "delete from tbcliente where ID='$did'");
		if ($query) {
			$_SESSION['data']=3;
			header("location:customer-list.php"); 
		}
	}
?>
