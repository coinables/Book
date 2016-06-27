$api_key = "your_blockchain_api_Key";
$xpub = "xpubYour_extended_public_key";
$secret = "your_secret"; //this can be anything you want
$rootURL = "http://yourrooturl.com/directory";        $orderID = uniqid();
 
$callback_url = $rootURL."/callback.php?invoice=".$orderID."&secret=".$secret;
$receive_url = "https://api.blockchain.info/v2/receive?key=".$api_key."&xpub=".$xpub."&callback=".urlencode($callback_url);
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $receive_url);
$ccc = curl_exec($ch);
$json = json_decode($ccc, true);
$payTo = $json['address']; 

echo $payTo; 