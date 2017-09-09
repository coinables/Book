<?php
$url = "https://coinbase.com/api/v1/prices/spot_rate";
$fileGet = file_get_contents($url);
$json = json_decode($fileGet, TRUE);
?>
<!DOCTYPE html>
<html>
<head>
<title>My First Web App</title>
<style>
#container{
   font-size: 40px;
   font-family: sans-serif;
   text-align: center;
}
#btc, #usd{
  	width: 175px;
height: 40px;
border: 2px solid #333;
border-radius: 5px;
font-size: 22px;
font-family: sans-serif;
}
</style>
</head>
<body>
<div id="container">
   <img src="bitcoin.jpg"><br>
   <input type="text" id="btc" onchange="btcConvert();" onkeyup="btcConvert();"> 
   <input type="text" id="usd" onchange="usdConvert();" onkeyup="usdConvert();">
</div>
<script>
var btc = <?php echo $json["amount"]; ?>;

function btcConvert(){
 var amount = document.getElementById("btc").value;
 var btcCalc = amount * btc;
 var btcCalc = btcCalc.toFixed(2);
 document.getElementById("usd").value = btcCalc;
};

function usdConvert(){
 var usd = document.getElementById("usd").value;
 var usdCalc =  usd / btc;
 var usdCalc = usdCalc.toFixed(8);
 document.getElementById("btc").value = usdCalc;
}
</script>
</body>
</html>
