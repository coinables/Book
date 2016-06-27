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