<?php

$item = $_GET["item"];

switch($item){
	case 1:
	  $cost = 20;
	  $product = "Item 1";
	break;
	case 2:
	  $cost = 30;
	  $product = "Item 2";
	break;
	case 3:
	  $cost = 50;
	  $product = "Item 3";
	break;
}

session_start();
$_SESSION["product"] = $product; 
$_SESSION["cost"] = $cost;

?>

<html>
You selected to buy <?php echo $product; ?>
<form method="post" action="pay.php">
Name: <input type="text" name="name"><br>
Address: <input type="text" name="street"><br>
Email: <input type="email" name="email"><br>
<input type="submit" name="checkout" value="Proceed to Payment">
</form>
</html>