
<?php
session_start();


$username = "";
$email    = "";
$errors = array(); 


$db = mysqli_connect('localhost', 'root', '', 'system');

if (isset($_POST['payment'])) {
  
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $c1 = mysqli_real_escape_string($db, $_POST['c1']);
  $c2 = mysqli_real_escape_string($db, $_POST['c2']);
  $cvv = mysqli_real_escape_string($db, $_POST['cvv']);

  
  if (empty($username)) { array_push($errors, "Customer Name is required"); }
  if (empty($cvv)) { array_push($errors, "CVV is required"); }
  if (empty($c1)) { array_push($errors, "Card number is required"); }
  if ($c1 != $c2) {
	array_push($errors, "The two Card numbers does not match");
  }
  




  
  $user_check_query = "SELECT * FROM card WHERE username='$username' OR c1='$c1' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  
  if (count($errors) == 0) {
    
    
    $query= "INSERT INTO `card`(`username`, `c1`, `cvv`) VALUES ('$username',$c1,$cvv)";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
   
    header('location: success.php');
    
    
  }
}