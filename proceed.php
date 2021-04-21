<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Proceed</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
</head>
<body>
  <div class="header">
  	<h2>Proceed</h2>
  </div>
	 
  <form method="post" action="code.php">
  	<?php include('errors.php'); ?>
    <div class ="input-group">
       <label >Delivery Time Slot</label>
       <input type="datetime-local" id="datetimepicker" name="dtime">
    </div>
  	
  	<div class="input-group">
  		<label>Delivery Address</label>
    <textarea  name="addr" placeholder="Write something.." rows="4" cols="50"></textarea>
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="pay">Pay Now</button>
  	</div>
    
    <div class="foot"> <a href="index.php">Back</a> </div>

    
  
  </form>
</body>
</html>