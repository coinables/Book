<?php
$url = "https://www.bitstamp.net/api/ticker/";
$fgc = file_get_contents($url);
$json = json_decode($fgc, TRUE);
$lastPrice = $json["last"];
$highPrice = $json["high"];
$lowPrice = $json["low"];
$lastPrice = number_format($lastPrice, 2);
$highPrice = number_format($highPrice, 2);
$lowPrice = number_format($lowPrice, 2);
//calc 24 hr change
$openPrice = $json["open"];
if($openPrice < $lastPrice)
{
	$operator = "+";
	$change = $lastPrice - $openPrice;
	$percent = $change / $openPrice;
	$percent = $percent * 100;
	$percentChange = $operator.number_format($percent, 1);
	$color = "green";
}
if($openPrice > $lastPrice)
{
	$operator = "-";
	$change = $openPrice - $lastPrice;
	$percent = $change / $openPrice;
	$percent = $percent * 100;
	$percentChange = $operator.number_format($percent, 1);
	$color = "red";
}
$date = date("m/d/Y - h:i:sa");

?>

<!DOCTYPE html>
<html>
<head>
<title>My BTC Widget</title>
<style>
#container{
	width: 275px;
	height: 90px;
	overflow: hidden;
	background-color: #2f2f2f;
	border: 1px solid #000;
	border-radius: 5px;
	color: #fefdfb;
}
#lastPrice{
	font-size: 24px;
	font-weight: bold;
}
#dateTime{
	font-size: 9px;
	color: #999;
}
</style>
</head>
<body>
<div id="container">
<table width="100%">
<tr>
	<td rowspan="3" width="60%" id="lastPrice">
	$<?php echo $lastPrice; ?>
	</td>
	<td align="right" style="color: <?php echo $color; ?>;">
	<?php echo $percentChange; ?>%
	</td>
</tr>
	<td align="right">
	H: <?php echo $highPrice; ?>
	</td>
<tr>
	<td align="right">
	L: <?php echo $lowPrice; ?>
	</td>
</tr>
<tr>
	<td align="right" colspan="2" id="dateTime">
	<?php echo $date; ?>
	</td>
</tr>
</table>
</div>
</body>
</html>