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

$table = <<<EOT
<table width="100%">
<tr>
	<td rowspan="3" width="60%" id="lastPrice">
	$$lastPrice 
	</td>
	<td align="right" id="percentChange" style="color: $color;">
	 $percentChange %
	</td>
</tr>
	<td align="right">
	H: $highPrice 
	</td>
<tr>
	<td align="right">
	L: $lowPrice 
	</td>
</tr>
<tr>
	<td align="right" colspan="2" id="dateTime">
	Powered by: <a href="#" target="_blank">BTCthreads.com</a> $date 
	</td>
</tr>
</table>
EOT;

echo $table;

?>