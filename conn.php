<?php
session_start();



$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'system');


if (isset($_POST['submit'])) {
  $itemid = mysqli_real_escape_string($db, $_POST['itemid']);
  $iname = mysqli_real_escape_string($db, $_POST['iname']);
  $des = mysqli_real_escape_string($db, $_POST['des']);
  $price = mysqli_real_escape_string($db, $_POST['price']);

  
  if (empty($itemid)) { array_push($errors, "Item ID is required"); }
  if (empty($iname)) { array_push($errors, "Item Name is required"); }
  if (empty($des)) { array_push($errors, "Enter Description"); }
  if (empty($price)) { array_push($errors, "Enter Price"); }
 
  if (count($errors) == 0) {
  $query = "INSERT INTO `items`(`id`, `iname`, `des`, `der`, `price`) VALUES ($itemid,'$iname','$des','$der','$price')";
  	mysqli_query($db, $query);
  	
  	$_SESSION['success'] = "Success";
  	echo "Succeessss";
  }
}
?>