$url = "https://btc-e.com/api/2/btc_usd/ticker";
$json = json_decode(file_get_contents($url), true);
$price = $json["ticker"]["last"];
$usdPrice = $_SESSION['cost']; 
$calc = $usdPrice / $price;
$itemPrice = round($calc, 4);