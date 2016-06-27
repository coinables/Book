$url = "http://127.0.0.1:3030/merchant/YOUR-GUID/login?password=YOUR-PASSWORD&api_code=YOUR-API-CODE";
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);        curl_setopt($ch, CURLOPT_URL, $url);
$ccc = curl_exec($ch);
$json = json_decode($ccc, true);
echo "<pre>";
var_dump($json);
echo "</pre>";