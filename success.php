
<!DOCTYPE html>
<html>
<head>
  <title>Payment Success</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Payment Success</h2>
  </div>

<?php

$db = mysqli_connect('localhost', 'root', '', 'system');
session_start();

$username=$_SESSION['username'];


$sql = "SELECT `id`, `username`, `c1` FROM `card` WHERE username='$username'";
$result = mysqli_query($db, $sql);

$sql1="SELECT `dtime`, `addr` FROM `checkdate` WHERE addr=''";
$result1=mysqli_query($db,$sql1);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {

echo "\nid:" . $row["id"];
        echo "</br>";
        echo "\nusername:".$row["username"];
        echo "</br>";
        echo "\nCard Number:".$row["c1"];
        echo "</br>";
    }
} 

else {
    echo "0 results";
  }

if (mysqli_num_rows($result1) > 0) {
    
    while($row1 = mysqli_fetch_assoc($result1)) {



        echo "\nDelivery Time:" . $row1["dtime"];
        echo "</br>";
        echo "\nDelivery Address:".$row1["addr"];
        echo "</br>";
        
    }
} 

else {
    echo "0 results";
  }


mysqli_close($db);

?>


</body>
</html>