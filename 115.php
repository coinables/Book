$url = "https://btc-e.com/api/3/ticker/btc_usd";
$fileGet = file_get_contents($url);
$json = json_decode($fileGet, TRUE);