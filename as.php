<!DOCTYPE html>
<html>
<body>

<?php

$db = mysqli_connect('localhost', 'root', '', 'system');

$username=$_POST['username'];

$sql = "SELECT `id`, `username`, `c1`, `cvv` FROM `card` WHERE username='$username'";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["c1"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($db);
?>

</body>
</html>