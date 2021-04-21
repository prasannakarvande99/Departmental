<?php
session_start();
require_once("config.php");



if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	
	case "add":
		if(!empty($_POST["quantity"])) {
			$pid=$_GET["pid"];
			$result=mysqli_query($con,"SELECT * FROM items WHERE id='$pid'");
	          while($productByCode=mysqli_fetch_array($result)){
			$itemArray = array($productByCode["id"]=>array('iname'=>$productByCode["iname"],'quantity'=>$_POST["quantity"],'des'=>$productByCode["des"], 'der'=>$productByCode["der"], 'price'=>$productByCode["price"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			}  else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	}
	break;

	
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["iname"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="css/1.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>



<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<a id="btnEmpty" href="proceed.php?action=empty">Proceed</a>
<a id="btnEmpty" href="index.php?action=empty">Back</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:right;" width="5%">Description</th>
<th style="text-align:right;" width="10%">Quantity</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["der"]; ?> " class="cart-item-image" /><?php echo $item["iname"]; ?></td>
				<td><?php echo $item["des"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=empty" class="btnRemoveAction"><img src="uploads/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				if($total_quantity<20)
				{
				$total_quantity += $item["quantity"];
	
				$total_price += ($item["price"]*$item["quantity"]);
				}
				else{
					echo "store can only deliver 20 orders";
				}
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>




<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM items ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&pid=<?php echo $row["id"]; ?>">
			<div class="product-image"><img src="<?php echo $row["der"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $row["iname"]; ?></div>
			<div class="product-title"><?php echo $row["des"]; ?></div>
			<div class="product-price"><?php echo "$".$row["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";

	}
	?>
</div>



</BODY>
</HTML>