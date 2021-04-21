<?php include('paymentprocess.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Payment</h2>
  </div>
	  
  <form method="post" action="payment.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Enter Name on CARD</label>
  	  <input type="text" name="username">
  	</div>
  	
  	<div class="input-group">
  	  <label>Enter CARD number</label>
  	  <input type="number" name="c1">
  	</div>
  	<div class="input-group">
  	  <label>Enter CARD number Again</label>
  	  <input type="number" name="c2">
  	</div>

    <div class="input-group">
      <label>Enter CVV</label>
      <input type="number" name="cvv">
    </div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="payment">Confirm Payment</button>
  	</div>
  
  </form>


</body>
</html>