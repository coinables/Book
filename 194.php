$host = $_SERVER['SERVER_NAME'];
$headers = "From: noreply@".$host."\r\n";
$headers .= "Content-type: text/html\r\n";
//customer email
$email = $_POST['customer_email'];
$emailTitle_Customer = "Order Confirmation #".$orderID;
$customerEmail = <<<EOD
    <h3>Please send payment to finalize your purchase</h3>
    Payment Address: $payTo <br>
    Payment Amount: $itemPrice <br>       
EOD;
    $customerCopy = mail($email, $emailTitle_Customer, $customerEmail, $headers);
//merchant email
$yourEmail = "your@email.com";
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
    $ourCopy = mail("$yourEmail", "$emailTitle", "$bodyEmail", "$headers");