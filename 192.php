$url = "https://coinbase.com/api/v1/prices/spot_rate";
$json = json_decode(file_get_contents($url), true);
$price = $json["amount"];
$usdPrice = $_SESSION['cost']; 
$calc = $usdPrice / $price;
$itemPrice = round($calc, 4);
