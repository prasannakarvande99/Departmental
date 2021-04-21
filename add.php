<?php include('conn.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add items</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Add items</h2>
  </div>
	
  <form method="post" action="upload.php" enctype="multipart/form-data" >
  	<?php include('errors.php'); ?>

  	<div class="input-group">
  	  <label>Item Id</label>
  	  <input type="number" name="itemid" >
  	</div>

  	<div class="input-group">
  	  <label>Item Name</label>
  	  <input type="text" name="iname">
  	</div>

    <div class="input-group">
      <label>Item Description</label>
      <input type="text" name="des">
    </div>

    <div class="input-group">
      <lable>Select image to upload</lable>
      <input type="file" name="fileToUpload" id="fileToUpload">
    </div>

    <div class="input-group">
      <label>Directory</label>
      <input type="text" name="der">
    </div>

    <div class="input-group">
      <label>Price</label>
      <input type="number" name="price">
    </div>

   <div class="input-group">
  	  <button type="submit" class="btn" name="submit">Add item</button>
  	</div>
</form>


</body>
</html>