<?php
session_start();

$yourEmail = "your@email.com"; //change this to your email address to receive notifications on new orders

//blockchain.info Receive Payments API
$api_key = "your_blockchain_api_Key";
$xpub = "xpubYour_extended_public_key";
$secret = "your_secret"; //this can be anything you want
$rootURL = "http://yourrooturl.com/directory"; //change to your root URL ex. mysite.com/store
$orderID = uniqid();
$callback_url = $rootURL."/callback.php?invoice=".$orderID."&secret=".$secret;
$receive_url = "https://api.blockchain.info/v2/receive?key=".$api_key."&xpub=".$xpub."&callback=".urlencode($callback_url);
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $receive_url);
$ccc = curl_exec($ch);
$json = json_decode($ccc, true);
$payTo = $json['address'];

//calculate the payment amount
$url = "https://btc-e.com/api/2/btc_usd/ticker";
$json = json_decode(file_get_contents($url), true);
$price = $json["ticker"]["last"];
$usdPrice = $_SESSION['cost'];
$calc = $usdPrice / $price;
$itemPrice = round($calc, 4);


//send email to user
$host = $_SERVER['SERVER_NAME'];
$headers = "From: noreply@".$host."\r\n";
$headers .= "Content-type: text/html\r\n";
//customer email
$email = $_POST['email'];
$emailTitle_Customer = "Order Confirmation #".$orderID;
$customerEmail = <<<EOD
    <h3>Please send payment to finalize your purchase</h3>
    Payment Address: $payTo <br>
    Payment Amount: $itemPrice <br>       
EOD;
    $customerCopy = mail($email, $emailTitle_Customer, $customerEmail, $headers);

//merchant email
$emailTitle = "New Order";
$bodyEmail = <<<EOD
    <h1>New Purchase</h1>
    Order: $orderID <br>
    Email: $email <br>
    Name: $name <br>
    Address: $address <br>
    Payment Address: $payTo <br>
	Payment Amount: $itemPrice <br>
EOD;
    $success = mail("$yourEmail", "$emailTitle", "$bodyEmail", "$headers");



?>

Order Details:<br>
Item: <?php echo $_SESSION['product']; ?><br>
Cost: <?php echo $_SESSION['cost']; ?><br>
Name: <?php echo $_POST['name']; ?><br>
Address: <?php echo $_POST['street']; ?><br>
Email: <?php echo $_POST['email']; ?><br>

<img src="http://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $_SESSION['payTo']; ?>">