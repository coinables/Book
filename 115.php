$url = "https://coinbase.com/api/v1/prices/spot_rate";
$fileGet = file_get_contents($url);
$json = json_decode($fileGet, TRUE);
