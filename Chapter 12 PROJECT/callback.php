<?php

$yourEmail = "your@email.com"; //change this to your email address

$secret = "your_secret"; //make sure this matches the secret on the pay.php page
$getSecret = $_GET["secret"];

if($secret != $getSecret){
die();
}

$order = $_GET["invoice"];
$amount = $_GET["value"];
$amount = $amount / 100000000;
$amount = number_format($amount, 8);
$txid = $_GET["transaction_hash"];

//send email that user paid
$host = $_SERVER['SERVER_NAME'];
$headers = "From: noreply@".$host."\r\n";
$headers .= "Content-type: text/html\r\n";
$emailTitle = "Order #".$order." Paid";
$bodyEmail = <<<EOD
    <h1>Order Paid</h1>
    This order has now been paid. <br>
	User Paid: $amount BTC <br>
	You can view the transaction here <a href="https://blockchain.info/tx/$txid"> $txid </a>
EOD;

$success = mail("$yourEmail", "$emailTitle", "$bodyEmail", "$headers");


?>