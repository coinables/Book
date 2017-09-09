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
</style>
</head>
<body>
<div id="container">
   <img src="bitcoin.jpg"><br>
   $<?php echo $json["amount"]; ?>
</div>
</body>
</html>
