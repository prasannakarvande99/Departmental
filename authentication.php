<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "system";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  

    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    
    $username = stripcslashes($username); 
    $password = stripcslashes($password);  
       
         
       
    $username = mysqli_real_escape_string($con, $username);  
    $password = mysqli_real_escape_string($con, $password);  
       
      
       
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $results = mysqli_query($con, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: add.php');
    }else {
      echo "Wrong Username or Password";
    }

        
?>  