<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'system');


if (isset($_POST['pay'])) {
	$dtime=$_POST['dtime'];
	$addr=$_POST['addr'];

	$query="INSERT INTO `checkdate`(`dtime`, `addr`) VALUES ('$dtime','$addr')";
	mysqli_query($db, $query);
  	
  	$_SESSION['success'] = "Success";
  	$_SESSION['addr'] = $addr;
		$_SESSION['dtime'] = $dtime;
  	

  	header('location: payment.php');

}