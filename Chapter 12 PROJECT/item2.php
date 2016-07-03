<?php
$url = "https://btc-e.com/api/2/btc_usd/ticker";
$json = json_decode(file_get_contents($url), true);
$price = $json["ticker"]["last"];
$usdPrice = 30; // SET THE PRICE OF THE ITEM HERE
$calc = $usdPrice / $price;
$itemPrice = round($calc, 4);
?>

<html>
<head>
<style>
.btn{
padding: 8px;
padding-left: 16px;
padding-right: 16px;
border: 1px solid #ccc;
border-radius: 5px;
text-decoration: none;
color: #666;
font-weight: strong;
}
</style>
</head>
<table width="80%">
<tr>
  <td width="40%">
  <img src="images/item2.jpg" width="95%"></td>
  <td width="60%">
  <h2>Item 2 Title</h2>
  <br><br>
  <h3>$30.00</h3>
  <h3><?php echo $itemPrice; ?>BTC</h3>
  <br>
  <a class="btn" href="checkout.php?item=2">Buy Now</a>
  </td>
</tr>
<tr>
<td colspan="2">Additional longer description of the item will go here.</td>
</tr>
</table>
</html>
